<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function edit(): View
    {
        $services = Service::orderBy('id', 'asc')->get()->map(function ($service) {
            return [
                'id' => $service->id,
                '2d_animation' => json_decode($service->getAttributes()['2d_animation'], true),
                '3d_animation' => json_decode($service->getAttributes()['3d_animation'], true),
                'explainer_video' => json_decode($service->getAttributes()['explainer_video'], true),
            ];
        })->toArray();

        return view('service.index', compact('services'));
    }

    public function updateAnimation2D(Request $request): RedirectResponse
    {
        $request->validate([
            '2d_animation_title' => 'required|string',
            '2d_animation_image' => 'image|mimes:jpeg,png,jpg,gif',
            '2d_animation_video_url' => 'required|url',
        ]);

        $serviceId = $request->input('service_id');
        $service = Service::find($serviceId);
        $serviceDecode = json_decode($service->getAttributes()['2d_animation'], true);

        if ($request->hasFile('2d_animation_image')) {
            $uploadPath = 'upload/services/';
            $oldThumbnail = $serviceDecode['image'];

            if ($oldThumbnail) {
                Storage::disk('public')->delete($oldThumbnail);
            }

            $thumbnail = $request->file('2d_animation_image');
            $thumbnailName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs($uploadPath, $thumbnailName, 'public');

            $service->{'2d_animation'} = json_encode([
                'title' => $request->input('2d_animation_title'),
                'image' => $uploadPath . $thumbnailName,
                'video_url' => $request->input('2d_animation_video_url'),
            ]);
        } else {
            $service->{'2d_animation'} = json_encode([
                'title' => $request->input('2d_animation_title'),
                'image' => $serviceDecode['image'],
                'video_url' => $request->input('2d_animation_video_url'),
            ]);
        }

        $service->save();

        return Redirect::route('service')->with('status', '2d-animation-updated');
    }

    public function updateAnimation3D(Request $request): RedirectResponse
    {
        $request->validate([
            '3d_animation_title' => 'required|string',
            '3d_animation_image' => 'image|mimes:jpeg,png,jpg,gif',
            '3d_animation_video_url' => 'required|url',
        ]);

        $serviceId = $request->input('service_id');
        $service = Service::find($serviceId);
        $serviceDecode = json_decode($service->getAttributes()['3d_animation'], true);

        if ($request->hasFile('3d_animation_image')) {
            $uploadPath = 'upload/services/';
            $oldThumbnail = $serviceDecode['image'];

            if ($oldThumbnail) {
                Storage::disk('public')->delete($oldThumbnail);
            }

            $thumbnail = $request->file('3d_animation_image');
            $thumbnailName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs($uploadPath, $thumbnailName, 'public');

            $service->{'3d_animation'} = json_encode([
                'title' => $request->input('3d_animation_title'),
                'image' => $uploadPath . $thumbnailName,
                'video_url' => $request->input('3d_animation_video_url'),
            ]);
        } else {
            $service->{'3d_animation'} = json_encode([
                'title' => $request->input('3d_animation_title'),
                'image' => $serviceDecode['image'],
                'video_url' => $request->input('3d_animation_video_url'),
            ]);
        }

        $service->save();

        return Redirect::route('service')->with('status', '3d-animation-updated');
    }

    public function updateExplainerVideo(Request $request): RedirectResponse
    {
        $request->validate([
            'explainer_video_title' => 'required|string',
            'explainer_video_image' => 'image|mimes:jpeg,png,jpg,gif',
            'explainer_video_video_url' => 'required|url',
        ]);

        $serviceId = $request->input('service_id');
        $service = Service::find($serviceId);
        $serviceDecode = json_decode($service->getAttributes()['explainer_video'], true);

        if ($request->hasFile('explainer_video_image')) {
            $uploadPath = 'upload/services/';
            $oldThumbnail = $serviceDecode['image'];

            if ($oldThumbnail) {
                Storage::disk('public')->delete($oldThumbnail);
            }

            $thumbnail = $request->file('explainer_video_image');
            $thumbnailName = uniqid() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs($uploadPath, $thumbnailName, 'public');

            $service->{'explainer_video'} = json_encode([
                'title' => $request->input('explainer_video_title'),
                'image' => $uploadPath . $thumbnailName,
                'video_url' => $request->input('explainer_video_video_url'),
            ]);
        } else {
            $service->{'explainer_video'} = json_encode([
                'title' => $request->input('explainer_video_title'),
                'image' => $serviceDecode['image'],
                'video_url' => $request->input('explainer_video_video_url'),
            ]);
        }

        $service->save();

        return Redirect::route('service')->with('status', 'explainer-video-updated');
    }
}

