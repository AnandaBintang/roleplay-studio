<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            '2d_animation' => json_encode([
                                'title' => '2D Animation',
                                'image' => '2d_animation.png',
                                'video_url' => 'https://www.youtube.com/embed/2d_animation',
                            ]),
            '3d_animation' => json_encode([
                                'title' => '3D Animation',
                                'image' => '3d_animation.png',
                                'video_url' => 'https://www.youtube.com/embed/3d_animation',
                            ]),
            'explainer_video' => json_encode([
                                'title' => 'Explainer Video',
                                'image' => 'explainer_video.png',
                                'video_url' => 'https://www.youtube.com/embed/explainer_video',
                            ]),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
