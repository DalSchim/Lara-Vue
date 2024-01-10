<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::where('display', true)->orderBy('title')->get();
        return Inertia::render('Track/index', [
            'tracks' => $tracks,
        ]);
    }

    public function create()
    {
        return Inertia::render('Track/Create');
    }

    public function delete($uuid)
    {
        $track = Track::where('uuid', $uuid)->firstOrFail();
        $track->delete();
        return redirect()->route('tracks.index');
    }

    public function edit(track $track)
    {
        return Inertia::render('Track/Edit', [
            'track' => $track,
        ]);
    }


    public function destroy($uuid)
    {
        $track = Track::where('uuid', $uuid)->firstOrFail();
        $track->delete();
        return redirect()->route('tracks.index');
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'image' => 'required',
            'music' => 'required',
            'display' => 'required',
        ]);

        $uuid = Str::uuid();

        $imgextension = $request->image->extension();
        $imagePath = $request->image->storeAs('public/images', $uuid . '.' . $imgextension);

        $musicextension = $request->music->extension();
        $musicPath = $request->music->storeAs('public/music', $uuid . '.' . $musicextension);

        $uuid .'.'. $imgextension;


        Track::create([
            'uuid' => 'trk-' . $uuid,
            'title' => $request->title,
            'artist' => $request->artist,
            'image' => $imagePath,
            'music' => $musicPath,
            'display' => $request->display,
        ]);

        return redirect()->route('tracks.index');
    }

}
