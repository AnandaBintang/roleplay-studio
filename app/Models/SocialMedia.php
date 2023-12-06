<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'youtube_url',
        'instagram_url',
        'whatsapp_url',
        'email_url',
        'internship_url',
    ];
}
