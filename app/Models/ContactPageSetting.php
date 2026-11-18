<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPageSetting extends Model
{
    protected $fillable = [
        'eyebrow',
        'heading',
        'description',
        'badge_text',
        'form_heading',
        'form_description',
        'name_label',
        'name_placeholder',
        'phone_label',
        'phone_placeholder',
        'email_label',
        'email_placeholder',
        'status_label',
        'status_options',
        'website_label',
        'website_placeholder',
        'business_type_label',
        'business_type_placeholder',
        'business_type_options',
        'details_label',
        'details_placeholder',
        'consent_text',
        'submit_button_text',
        'success_message',
        'privacy_note',
        'inactive_message',
        'is_active',
    ];

    protected $casts = [
        'status_options' => 'array',
        'business_type_options' => 'array',
        'is_active' => 'boolean',
    ];

    public static function defaultStatusOptions(): array
    {
        return [
            'নতুন ব্যবসা শুরু করতে চাই',
            'ইতোমধ্যে ব্যবসা করছি',
            'ব্যবসার আইডিয়া খুঁজছি',
        ];
    }

    public static function defaultBusinessTypeOptions(): array
    {
        return [
            'পণ্যভিত্তিক ব্যবসা',
            'সেবাভিত্তিক ব্যবসা',
            'অনলাইন / ই-কমার্স',
            'রিটেইল / দোকান',
            'ফুড / রেস্টুরেন্ট',
            'পার্সোনাল ব্র্যান্ড / ক্রিয়েটর',
            'অন্যান্য',
        ];
    }

    public static function defaults(): array
    {
        return [
            'eyebrow' => 'উদ্যোক্তাদের জন্য বিশেষ কোর্স',
            'heading' => 'আপনার ব্যবসার গ্রোথ শুরু হোক সঠিক মার্কেটিং জ্ঞান দিয়ে!',
            'description' => 'নতুন ব্যবসা শুরু করতে চান, নাকি চলমান ব্যবসায় বিক্রি বাড়াতে চান? কনটেন্ট, কাস্টমার বিহেভিয়ার, মার্কেটিং ফানেল ও ডিজিটাল মার্কেটিং শিখুন বাস্তব উদাহরণের মাধ্যমে।',
            'badge_text' => '২০টি ক্লাস | নতুন ও চলমান উদ্যোক্তাদের জন্য',
            'form_heading' => 'কোর্সে আগ্রহ জানাতে ফর্ম পূরণ করুন',
            'form_description' => 'আপনার সম্পর্কে কয়েকটি তথ্য দিন। কোর্সের বিস্তারিত জানাতে আমরা যোগাযোগ করব।',
            'name_label' => 'আপনার নাম',
            'name_placeholder' => 'পূর্ণ নাম',
            'phone_label' => 'মোবাইল নম্বর',
            'phone_placeholder' => '01XXXXXXXXXX',
            'email_label' => 'ইমেইল ঠিকানা',
            'email_placeholder' => 'example@email.com',
            'status_label' => 'আপনার বর্তমান অবস্থা',
            'status_options' => self::defaultStatusOptions(),
            'website_label' => 'ব্যবসার ফেসবুক পেজ / ওয়েবসাইট লিংক (যদি থাকে)',
            'website_placeholder' => 'https://facebook.com/yourpage',
            'business_type_label' => 'আপনি কী ধরনের ব্যবসা করেন বা শুরু করতে চান?',
            'business_type_placeholder' => 'একটি অপশন নির্বাচন করুন',
            'business_type_options' => self::defaultBusinessTypeOptions(),
            'details_label' => 'আপনার পণ্য/সেবা, ব্যবসার আইডিয়া ও মার্কেটিংয়ের প্রধান চ্যালেঞ্জ ২-৩ লাইনে লিখুন...',
            'details_placeholder' => 'আপনার পণ্য/সেবা, ব্যবসার আইডিয়া ও মার্কেটিংয়ের প্রধান চ্যালেঞ্জ ২-৩ লাইনে লিখুন...',
            'consent_text' => 'কোর্সের বিস্তারিত জানাতে আমার ফোন নম্বর বা ইমেইলে যোগাযোগ করার অনুমতি দিচ্ছি।',
            'submit_button_text' => 'Submit Form',
            'success_message' => 'ধন্যবাদ! আপনার আগ্রহের তথ্য আমরা পেয়েছি। কোর্সের বিস্তারিত জানাতে আমাদের টিম আপনার সাথে যোগাযোগ করবে।',
            'privacy_note' => 'এই ফর্মে দেওয়া তথ্য শুধু আপনার সাথে যোগাযোগ ও কোর্সের বিস্তারিত জানানোর জন্য ব্যবহার করা হবে।',
            'inactive_message' => 'বর্তমানে আগ্রহ জানানোর ফর্মটি সাময়িকভাবে বন্ধ আছে। সরাসরি যোগাযোগের তথ্য থেকে আমাদের সাথে কথা বলতে পারেন।',
            'is_active' => true,
        ];
    }
}
