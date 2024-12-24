<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class invitation extends Controller
{
    public function store(Request $request, $projetId)
    {
        $request->validate([
            'etudiant_id' => 'required',
        ]);

        Invitation::create([
            'etudiant_id' => $request->etudiant_id,
            'projet_id' => $projetId,
            'statut' => 'en attente',
        ]);

        return redirect()->route('projets.show', ['projet' => $projetId]);
    }
}
