<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DetailController extends Controller
{
    public function edit(): View
    {
        $detail = Detail::find(1);

        return view('detail.index', [
            'detail' => $detail
        ]);
    }

    public function aboutUpdate(Request $request): RedirectResponse
    {
        $detail = Detail::find(1);

        $request->validate([
            'about' => 'required|string',
        ]);

        $content = $request->input('about');
        $content = str_replace(['<p>', '</p>'], '<br>', $content);
        $content = substr($content, 4);
        $content = substr($content, 0, -4);


        $detail->update([
            'about' => str_replace(['<p>', '</p>'], '<br>', $content)
        ]);

        return Redirect::route('detail')->with('status', 'about-updated');
    }

    public function visionUpdate(Request $request): RedirectResponse
    {
        $detail = Detail::find(1);

        $request->validate([
            'vision' => 'required|string',
        ]);

        $content = $request->input('vision');
        $content = str_replace(['<p>', '</p>'], '<br>', $content);
        $content = substr($content, 4);
        $content = substr($content, 0, -4);


        $detail->update([
            'vision' => str_replace(['<p>', '</p>'], '<br>', $content)
        ]);

        return Redirect::route('detail')->with('status', 'vision-updated');
    }

    public function missionUpdate(Request $request): RedirectResponse
    {
        $detail = Detail::find(1);

        $request->validate([
            'mission' => 'required|string',
        ]);

        $content = $request->input('mission');
        $content = str_replace(['<p>', '</p>'], '<br>', $content);
        $content = substr($content, 4);
        $content = substr($content, 0, -4);


        $detail->update([
            'mission' => str_replace(['<p>', '</p>'], '<br>', $content)
        ]);

        return Redirect::route('detail')->with('status', 'mission-updated');
    }
}
