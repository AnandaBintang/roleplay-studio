<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('social_media')->insert([
            'youtube_url' => 'https://youtube.com',
            'instagram_url' => 'https://instagram.com',
            'whatsapp_url' => 'https://whatsapp.com',
            'email_url' => 'https://gmail.com',
            'internship_url' => '#',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
