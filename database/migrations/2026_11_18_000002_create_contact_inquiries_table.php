<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_id')->unique();
            $table->string('name', 140);
            $table->string('phone', 32);
            $table->string('email', 254);
            $table->string('current_status', 120);
            $table->string('website_link', 512)->nullable();
            $table->string('business_type', 120);
            $table->text('business_details');
            $table->timestamp('consented_at');
            $table->string('source_page', 255)->default('contact');
            $table->string('lead_status', 24)->default('new');
            $table->text('internal_notes')->nullable();
            $table->timestamps();

            $table->index(['lead_status', 'created_at']);
            $table->index('email');
            $table->index('phone');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_inquiries');
    }
};
