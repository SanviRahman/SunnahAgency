<?php

namespace App\Http\Requests;

use App\Models\ContactPageSetting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactInquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $merge = [];

        foreach (['name', 'phone', 'email', 'current_status', 'business_type', 'business_details'] as $field) {
            if ($this->has($field) && is_string($this->input($field))) {
                $merge[$field] = trim($this->input($field));
            }
        }

        if ($this->has('email') && is_string($this->input('email'))) {
            $merge['email'] = strtolower(trim($this->input('email')));
        }

        if ($this->filled('website_link')) {
            $websiteLink = trim((string) $this->input('website_link'));

            if ($websiteLink !== '' && !preg_match('/^https?:\/\//i', $websiteLink)) {
                $websiteLink = 'https://' . $websiteLink;
            }

            $merge['website_link'] = $websiteLink;
        }

        $this->merge($merge);
    }

    public function rules(): array
    {
        $settings = ContactPageSetting::query()->first();
        $statusOptions = $settings?->status_options ?: ContactPageSetting::defaultStatusOptions();
        $businessTypeOptions = $settings?->business_type_options ?: ContactPageSetting::defaultBusinessTypeOptions();

        return [
            'name' => ['required', 'string', 'min:2', 'max:140'],
            'phone' => [
                'required',
                'string',
                'max:32',
                'regex:/^\+?[0-9()\-\s]{7,32}$/D',
            ],
            'email' => ['required', 'email:rfc', 'max:254'],
            'current_status' => ['required', 'string', 'max:120', Rule::in($statusOptions)],
            'website_link' => ['nullable', 'string', 'max:512', 'url'],
            'business_type' => ['required', 'string', 'max:120', Rule::in($businessTypeOptions)],
            'business_details' => ['required', 'string', 'min:20', 'max:4000'],
            'consent' => ['required', 'accepted'],
            'contact_honeypot' => ['nullable', 'string', 'max:200'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'আপনার নাম লিখুন।',
            'name.min' => 'নামটি কমপক্ষে ২ অক্ষরের হতে হবে।',
            'phone.required' => 'আপনার মোবাইল নম্বর দিন।',
            'phone.regex' => 'সঠিক মোবাইল নম্বর দিন।',
            'email.required' => 'আপনার ইমেইল ঠিকানা দিন।',
            'email.email' => 'একটি সঠিক ইমেইল ঠিকানা দিন।',
            'current_status.required' => 'আপনার বর্তমান অবস্থা নির্বাচন করুন।',
            'current_status.in' => 'বর্তমান অবস্থার একটি বৈধ অপশন নির্বাচন করুন।',
            'business_type.required' => 'আপনার ব্যবসার ধরন নির্বাচন করুন।',
            'business_type.in' => 'ব্যবসার ধরনের একটি বৈধ অপশন নির্বাচন করুন।',
            'business_details.required' => 'আপনার ব্যবসা বা আইডিয়ার বিস্তারিত লিখুন।',
            'business_details.min' => 'কমপক্ষে ২০টি অক্ষরে আপনার চ্যালেঞ্জ বা আইডিয়াটি লিখুন।',
            'consent.accepted' => 'যোগাযোগের অনুমতিটি দিতে হবে।',
        ];
    }
}
