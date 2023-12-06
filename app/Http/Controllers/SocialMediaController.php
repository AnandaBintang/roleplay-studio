<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SocialMediaController extends Controller
{
    public function edit(): View
    {
        $socialMedia = SocialMedia::find(1);

        return view('social-media.index', [
            'socialMedia' => $socialMedia
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'youtube' => 'required|string',
            'instagram' => 'required|string',
            'whatsapp' => 'required|string',
            'email' => 'required|string',
            'internship' => 'required|string',
        ]);

        $socialMedia = SocialMedia::find(1);

        if ($socialMedia) {
            $socialMedia->youtube_url = $request->input('youtube');
            $socialMedia->instagram_url = $request->input('instagram');
            $socialMedia->whatsapp_url = $request->input('whatsapp');
            $socialMedia->email_url = $request->input('email');
            $socialMedia->internship_url = $request->input('internship');

            $socialMedia->save();

            return Redirect::route('social-media')->with('status', 'social-media-updated');
        }
    }
}
