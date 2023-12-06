<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function edit(): View
    {
        $clients = Client::orderBy('id', 'asc')->get();

        return view('client.index', compact('clients'));
    }

    public function update(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'client_name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $clientId = $request->input('client_id');
        $client = Client::find($clientId);
        $client->client_name = $request->client_name;

        if ($request->hasFile('logo')) {
            $logoPath = 'upload/clients/';
            $oldLogo = $client->logo;

            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }

            $logo = $request->file('logo');
            $logoName = uniqid() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs($logoPath, $logoName, 'public');

            $client->logo = $logoPath . $logoName;
        }

        $client->save();

        return Redirect::route('client')->with('status', 'client-updated');
    }
}
