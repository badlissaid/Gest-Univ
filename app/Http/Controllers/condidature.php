<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class condidature extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'students_id' => 'required',
            'projects_id' => 'required',
            'statut' => 'required',
        ]);

        \App\Models\condidature::create([
            'students_id' => $request->students_id,
            'projects_id' => $request->projects_id,
            'statut' => 'en attente',
        ]);

        return response()->json();
    }
}
