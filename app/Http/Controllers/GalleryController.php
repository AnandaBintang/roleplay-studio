<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    public function edit(): View
    {
        $gallery = Gallery::orderBy('id', 'asc')->get();

        return view('gallery.index', compact('gallery'));
    }

    public function update(Request $request, $gallery): RedirectResponse
    {
        $this->validate($request, [
            'art' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $gallery = Gallery::find($gallery);

        if ($request->hasFile('art')) {
            $artPath = 'upload/gallery/';
            $oldArt = $gallery->art;

            if ($oldArt) {
                Storage::disk('public')->delete($oldArt);
            }

            $art = $request->file('art');
            $artName = uniqid() . '.' . $art->getClientOriginalExtension();
            $art->storeAs($artPath, $artName, 'public');

            $gallery->art = $artPath . $artName;
        }

        $gallery->save();

        return Redirect::route('gallery')->with('status', 'gallery-updated');
    }
}
