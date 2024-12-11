<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \App\Models\User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            \App\Models\User::create([
            'name' => $request->name ,
            'firstname'=> $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'domaine'=> $request->domaine,
            'photo' => $request->photo,
            'type'=> $request->type,
        ]);
        return 'Good' ;
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
