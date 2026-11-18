<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactInquiryRequest;
use App\Models\ContactInquiry;
use App\Models\ContactPageSetting;
use App\Models\PersonalInfo;
use App\Models\WebsiteInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function frontend_Contact_Index()
    {
        $contactSettings = ContactPageSetting::query()->first();

        if (!$contactSettings) {
            $contactSettings = new ContactPageSetting(ContactPageSetting::defaults());
        }

        $websiteInfo = WebsiteInfo::query()->first();
        $personalInfo = PersonalInfo::query()->first();

        return view('frontend.contact.index', compact(
            'contactSettings',
            'websiteInfo',
            'personalInfo',
        ));
    }

    public function frontend_Contact_Store(StoreContactInquiryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $destination = route('frontend_Contact_Index') . '#contact-form';

        // Honeypot: silently accept bot submissions without storing them.
        if (filled($data['contact_honeypot'] ?? null)) {
            return redirect()->to($destination)->with(
                'contact_success',
                'আপনার আগ্রহের তথ্য পাওয়া গেছে।'
            );
        }

        $email = strtolower(trim($data['email']));
        $phone = trim($data['phone']);
        $details = trim($data['business_details']);

        // Prevent accidental double submissions within a short window.
        $duplicate = ContactInquiry::query()
            ->where('created_at', '>=', now()->subMinutes(3))
            ->where('email', $email)
            ->where('phone', $phone)
            ->where('business_details', $details)
            ->exists();

        if (!$duplicate) {
            ContactInquiry::query()->create([
                'public_id' => (string) Str::uuid(),
                'name' => trim($data['name']),
                'phone' => $phone,
                'email' => $email,
                'current_status' => $data['current_status'],
                'website_link' => $data['website_link'] ?? null,
                'business_type' => $data['business_type'],
                'business_details' => $details,
                'consented_at' => now(),
                'source_page' => 'contact',
                'lead_status' => 'new',
            ]);
        }

        $contactSettings = ContactPageSetting::query()->first();
        $successMessage = $contactSettings?->success_message
            ?: ContactPageSetting::defaults()['success_message'];

        return redirect()->to($destination)->with('contact_success', $successMessage);
    }
}
