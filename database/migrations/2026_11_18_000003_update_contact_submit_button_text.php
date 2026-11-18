<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('contact_page_settings')
            ->where('submit_button_text', 'কোর্সের বিস্তারিত জানতে আগ্রহ জানাই')
            ->update([
                'submit_button_text' => 'Submit Form',
                'updated_at' => now(),
            ]);
    }

    public function down(): void
    {
        DB::table('contact_page_settings')
            ->where('submit_button_text', 'Submit Form')
            ->update([
                'submit_button_text' => 'কোর্সের বিস্তারিত জানতে আগ্রহ জানাই',
                'updated_at' => now(),
            ]);
    }
};
