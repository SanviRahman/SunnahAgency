<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'public_id',
        'name',
        'phone',
        'email',
        'current_status',
        'website_link',
        'business_type',
        'business_details',
        'consented_at',
        'source_page',
        'lead_status',
        'internal_notes',
    ];

    protected $casts = [
        'consented_at' => 'datetime',
    ];
}
