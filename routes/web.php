<?php

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salon/{code}', function (Request $request, $code) {

    $salon = Salon::where('code', $code)->firstOrFail();

    if (!$salon->actif) {
        return 'Ce salon est fermé.';
    }

    if ($salon->visibilite === 'PRIVE') {

        if ($request->mot_de_passe != $salon->mot_de_passe) {
            return 'Mot de passe incorrect ou manquant.';
        }
    }

    return $salon;
});

Route::post('/salon', function (Request $request) {

    $request->validate([
        'nom' => 'required',
        'visibilite' => 'required|in:PUBLIC,PRIVE',
    ]);

    $salon = Salon::create([
        'nom' => $request->nom,
        'visibilite' => $request->visibilite,
        'mot_de_passe' => $request->mot_de_passe,
        'actif' => true,
    ]);

    return $salon;
});
