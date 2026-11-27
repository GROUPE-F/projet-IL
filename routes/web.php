<?php

use App\Models\Salon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salon/{code}', function (Request $request, $code) {

    $salon = Salon::where('code', $code)->firstOrFail();

    if (!$salon->actif) {
        return 'Ce salon est fermé.';
    }

    if ($salon->visibilite === 'PRIVE') {

        if (!is_string($request->mot_de_passe)) {
            return 'Mot de passe manquant ou invalide.';
        }

        if (!Hash::check($request->mot_de_passe, $salon->mot_de_passe)) {
            return 'Mot de passe incorrect.';
        }
    }

    return $salon;
});

Route::post('/salon', function (Request $request) {

    $request->validate([
        'nom' => 'required|string|max:255',
        'visibilite' => 'required',
    ]);

    if ($request->visibilite !== 'PUBLIC' && $request->visibilite !== 'PRIVE') {
        return response('Visibilité incorrecte.', 422);
    }

    $motDePasse = null;

    if ($request->visibilite === 'PRIVE') {

        $request->validate([
            'mot_de_passe' => 'required|string|max:72',
        ]);

        $motDePasse = Hash::make($request->mot_de_passe);
    }

    $salon = Salon::create([
        'nom' => $request->nom,
        'visibilite' => $request->visibilite,
        'mot_de_passe' => $motDePasse,
        'actif' => true,
    ]);

    return $salon;
});
