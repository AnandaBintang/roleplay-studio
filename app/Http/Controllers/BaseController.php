<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Detail;
use App\Models\SocialMedia;
use App\Models\Service;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Detail::find(1);
        $service = Service::orderBy('id', 'asc')->get(['2d_animation', '3d_animation', 'explainer_video'])->map(function ($service) {
            return [
                '2d_animation' => json_decode($service->getAttributes()['2d_animation'], true),
                '3d_animation' => json_decode($service->getAttributes()['3d_animation'], true),
                'explainer_video' => json_decode($service->getAttributes()['explainer_video'], true),
            ];
        })->toArray();
        $client = Client::orderBy('id', 'asc')->get();
        $socialMedia = SocialMedia::find(1);

        $data = [
            'about' => $detail['about'],
            'service' => $service,
            'visionMission' => [
                ['title' => 'Vision', 'content' => $detail['vision']],
                ['title' => 'Mission', 'content' => $detail['mission']],
            ],
            'client' => $client,
            'socialMedia' => $socialMedia
        ];

        return view('landing', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
