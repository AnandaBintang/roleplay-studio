<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Detail;
use App\Models\Gallery;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Detail::find(1);
        $client = Client::orderBy('id', 'asc')->get();
        $socialMedia = SocialMedia::find(1);
        $gallery['art'] = Gallery::orderBy('id', 'asc')->get();
        $gallery['margin'] = [
            ['marginClass' => ['mt-4']],
            ['marginClass' => ['mt-[-6rem]', 'md:mt-[-3rem]', 'xl:mt-[-6rem]']],
            ['marginClass' => ['mt-4', 'xl:mb-[-3rem]']],
            ['marginClass' => ['mt-[-6rem]', 'md:mt-[-3rem]']],
            ['marginClass' => ['mt-4', 'xl:mb-[-3rem]']],
            ['marginClass' => ['mt-[-6rem]', 'md:mt-[-3rem]', 'xl:mt-[-6rem]']],
            ['marginClass' => ['mt-4']],
            ['marginClass' => ['mt-[-6rem]', 'md:mt-[-3rem]', 'xl:mt-[-6rem]']],
            ['marginClass' => ['mt-4', 'xl:mb-[-3rem]']],
            ['marginClass' => ['mt-[-6rem]', 'md:mt-[-3rem]']],
            ['marginClass' => ['mt-4', 'xl:mb-[-3rem]']],
            ['marginClass' => ['mt-[-6rem]', 'md:mt-[-3rem]', 'xl:mt-[-6rem]']],
        ];

        $data = [
            'about' => $detail['about'],
            'visionMission' => [
                ['title' => 'Vision', 'content' => $detail['vision']],
                ['title' => 'Mission', 'content' => $detail['mission']],
            ],
            'client' => $client,
            'gallery' => $gallery,
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
