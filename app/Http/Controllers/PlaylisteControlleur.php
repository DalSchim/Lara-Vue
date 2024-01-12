<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use function Termwind\render;

class PlaylisteControlleur extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        $playlists = $user->playlists()->with('tracks')->get();

        return inertia::render( 'Playliste/index',[
            'playlists' => $playlists,]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tracks = Track::where('display', true)->orderBy('title')->get();

        return inertia::render( 'Playliste/Create',[
            'tracks' => $tracks,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => ['required', 'string', 'max:255'],
           'tracks' => ['required', 'array'],
           'tracks.*' => ['required','string', 'exists:tracks,uuid'],
        ]);

        $traks = Track::whereIn('uuid', $request->tracks)->where('display',true)->get();
        if($traks->count() !== count($request->tracks)){
            throw validationException::withMessages([
                'tracks' => ['One or more tracks were not found'],
            ]);
        }

        Playlist::create([
            'title' => $request->title,
            'user_id' => $request->user()->id,
            'uuid' => 'ply-'. Str::uuid(),
        ])->tracks()->attach($traks);

        return redirect()->route('playlists.index')->with('success', 'Playlist created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Playlist $playlist)
    {
        return Inertia::render( 'Playliste/Show',[
            'playlist' => $playlist->load('tracks'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Playlist $playliste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Playlist $playliste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playliste)
    {


    }
}
