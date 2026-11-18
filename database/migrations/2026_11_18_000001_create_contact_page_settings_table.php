<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow', 120)->nullable();
            $table->string('heading', 200);
            $table->text('description')->nullable();
            $table->string('badge_text', 200)->nullable();

            $table->string('form_heading', 200);
            $table->text('form_description')->nullable();

            $table->string('name_label', 120);
            $table->string('name_placeholder', 200)->nullable();
            $table->string('phone_label', 120);
            $table->string('phone_placeholder', 200)->nullable();
            $table->string('email_label', 120);
            $table->string('email_placeholder', 200)->nullable();

            $table->string('status_label', 160);
            $table->text('status_options');

            $table->string('website_label', 220)->nullable();
            $table->string('website_placeholder', 300)->nullable();

            $table->string('business_type_label', 220);
            $table->string('business_type_placeholder', 200)->nullable();
            $table->text('business_type_options');

            $table->string('details_label', 300);
            $table->text('details_placeholder')->nullable();

            $table->text('consent_text');
            $table->string('submit_button_text', 180);
            $table->text('success_message');
            $table->text('privacy_note')->nullable();
            $table->string('inactive_message', 300)->nullable();

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        DB::table('contact_page_settings')->insert([
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
            'status_options' => json_encode([
                'নতুন ব্যবসা শুরু করতে চাই',
                'ইতোমধ্যে ব্যবসা করছি',
                'ব্যবসার আইডিয়া খুঁজছি',
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'website_label' => 'ব্যবসার ফেসবুক পেজ / ওয়েবসাইট লিংক (যদি থাকে)',
            'website_placeholder' => 'https://facebook.com/yourpage',
            'business_type_label' => 'আপনি কী ধরনের ব্যবসা করেন বা শুরু করতে চান?',
            'business_type_placeholder' => 'একটি অপশন নির্বাচন করুন',
            'business_type_options' => json_encode([
                'পণ্যভিত্তিক ব্যবসা',
                'সেবাভিত্তিক ব্যবসা',
                'অনলাইন / ই-কমার্স',
                'রিটেইল / দোকান',
                'ফুড / রেস্টুরেন্ট',
                'পার্সোনাল ব্র্যান্ড / ক্রিয়েটর',
                'অন্যান্য',
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'details_label' => 'আপনার পণ্য/সেবা, ব্যবসার আইডিয়া ও মার্কেটিংয়ের প্রধান চ্যালেঞ্জ ২-৩ লাইনে লিখুন...',
            'details_placeholder' => 'আপনার পণ্য/সেবা, ব্যবসার আইডিয়া ও মার্কেটিংয়ের প্রধান চ্যালেঞ্জ ২-৩ লাইনে লিখুন...',
            'consent_text' => 'কোর্সের বিস্তারিত জানাতে আমার ফোন নম্বর বা ইমেইলে যোগাযোগ করার অনুমতি দিচ্ছি।',
            'submit_button_text' => 'Submit Form',
            'success_message' => 'ধন্যবাদ! আপনার আগ্রহের তথ্য আমরা পেয়েছি। কোর্সের বিস্তারিত জানাতে আমাদের টিম আপনার সাথে যোগাযোগ করবে।',
            'privacy_note' => 'এই ফর্মে দেওয়া তথ্য শুধু আপনার সাথে যোগাযোগ ও কোর্সের বিস্তারিত জানানোর জন্য ব্যবহার করা হবে।',
            'inactive_message' => 'বর্তমানে আগ্রহ জানানোর ফর্মটি সাময়িকভাবে বন্ধ আছে। সরাসরি যোগাযোগের তথ্য থেকে আমাদের সাথে কথা বলতে পারেন।',
            'is_active' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_page_settings');
    }
};
