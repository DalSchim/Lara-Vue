<?php

namespace App\Http\Controllers;

use App\Models\Apikey;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApiControlleur extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $api = Apikey::where('user_id', $user->id)->get();
        return Inertia::render('Apifolder/index', [
            'api' => $api ,
        ] );
    }

    public function create()
    {
        return Inertia::render('Apifolder/create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        ApiKey:: create([
            'name' => $request->title,
            'key' => 'key-'.uniqid(),
            'uuid' => 'key-'.uniqid(),
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('apiKeys.index');

    }


    public function show($id)
    {
        //
    }


}
