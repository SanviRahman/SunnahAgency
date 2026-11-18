<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\ContactPageSetting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminContactController extends Controller
{
    private const LEAD_STATUSES = [
        'new',
        'contacted',
        'qualified',
        'closed',
        'spam',
    ];

    public function index()
    {
        $settings = ContactPageSetting::query()->first();

        if (!$settings) {
            $settings = new ContactPageSetting(ContactPageSetting::defaults());
        }

        return view('backend.contact.index', [
            'settings' => $settings,
        ]);
    }

    public function inquiries(Request $request)
    {
        $filter = (string) $request->query('lead_status', '');

        $leads = ContactInquiry::query()
            ->when(
                in_array($filter, self::LEAD_STATUSES, true),
                fn ($query) => $query->where('lead_status', $filter)
            )
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('backend.contact.inquiries', [
            'leads' => $leads,
            'leadStatuses' => self::LEAD_STATUSES,
            'filter' => $filter,
        ]);
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'eyebrow' => ['nullable', 'string', 'max:120'],
            'heading' => ['required', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:1600'],
            'badge_text' => ['nullable', 'string', 'max:200'],

            'form_heading' => ['required', 'string', 'max:200'],
            'form_description' => ['nullable', 'string', 'max:1000'],

            'name_label' => ['required', 'string', 'max:120'],
            'name_placeholder' => ['nullable', 'string', 'max:200'],
            'phone_label' => ['required', 'string', 'max:120'],
            'phone_placeholder' => ['nullable', 'string', 'max:200'],
            'email_label' => ['required', 'string', 'max:120'],
            'email_placeholder' => ['nullable', 'string', 'max:200'],

            'status_label' => ['required', 'string', 'max:160'],
            'status_options' => ['required', 'string', 'max:1200'],

            'website_label' => ['nullable', 'string', 'max:220'],
            'website_placeholder' => ['nullable', 'string', 'max:300'],

            'business_type_label' => ['required', 'string', 'max:220'],
            'business_type_placeholder' => ['nullable', 'string', 'max:200'],
            'business_type_options' => ['required', 'string', 'max:1500'],

            'details_label' => ['required', 'string', 'max:300'],
            'details_placeholder' => ['nullable', 'string', 'max:1000'],

            'consent_text' => ['required', 'string', 'max:1000'],
            'submit_button_text' => ['required', 'string', 'max:180'],
            'success_message' => ['required', 'string', 'max:500'],
            'privacy_note' => ['nullable', 'string', 'max:500'],
            'inactive_message' => ['nullable', 'string', 'max:300'],
            'is_active' => ['required', 'boolean'],
        ]);

        $statusOptions = $this->parseOptions($data['status_options']);
        $businessTypeOptions = $this->parseOptions($data['business_type_options']);

        if ($statusOptions === []) {
            return back()
                ->withErrors(['status_options' => 'কমপক্ষে একটি বর্তমান অবস্থার অপশন দিন।'])
                ->withInput();
        }

        if ($businessTypeOptions === []) {
            return back()
                ->withErrors(['business_type_options' => 'কমপক্ষে একটি ব্যবসার ধরনের অপশন দিন।'])
                ->withInput();
        }

        $settings = ContactPageSetting::query()->first() ?? new ContactPageSetting();

        $settings->fill([
            'eyebrow' => $data['eyebrow'] ?? null,
            'heading' => $data['heading'],
            'description' => $data['description'] ?? null,
            'badge_text' => $data['badge_text'] ?? null,

            'form_heading' => $data['form_heading'],
            'form_description' => $data['form_description'] ?? null,

            'name_label' => $data['name_label'],
            'name_placeholder' => $data['name_placeholder'] ?? null,
            'phone_label' => $data['phone_label'],
            'phone_placeholder' => $data['phone_placeholder'] ?? null,
            'email_label' => $data['email_label'],
            'email_placeholder' => $data['email_placeholder'] ?? null,

            'status_label' => $data['status_label'],
            'status_options' => $statusOptions,

            'website_label' => $data['website_label'] ?? null,
            'website_placeholder' => $data['website_placeholder'] ?? null,

            'business_type_label' => $data['business_type_label'],
            'business_type_placeholder' => $data['business_type_placeholder'] ?? null,
            'business_type_options' => $businessTypeOptions,

            'details_label' => $data['details_label'],
            'details_placeholder' => $data['details_placeholder'] ?? null,

            'consent_text' => $data['consent_text'],
            'submit_button_text' => $data['submit_button_text'],
            'success_message' => $data['success_message'],
            'privacy_note' => $data['privacy_note'] ?? null,
            'inactive_message' => $data['inactive_message'] ?? null,
            'is_active' => (bool) $data['is_active'],
        ]);

        $settings->save();

        return redirect()
            ->route('admin.contact.index')
            ->with('contact_admin_success', 'Contact page settings updated successfully.');
    }

    public function show(ContactInquiry $inquiry)
    {
        return view('backend.contact.detail', [
            'inquiry' => $inquiry,
        ]);
    }

    public function updateInquiry(Request $request, ContactInquiry $inquiry)
    {
        $data = $request->validate([
            'lead_status' => ['required', Rule::in(self::LEAD_STATUSES)],
            'internal_notes' => ['nullable', 'string', 'max:4000'],
        ]);

        $inquiry->fill($data)->save();

        return back()->with('contact_admin_success', 'Contact inquiry updated successfully.');
    }

    private function parseOptions(string $value): array
    {
        $options = preg_split('/\R/u', $value) ?: [];

        $options = array_map(
            static fn ($option) => trim($option),
            $options
        );

        $options = array_filter($options, static fn ($option) => $option !== '');
        $options = array_values(array_unique($options));

        return array_slice($options, 0, 12);
    }
}
