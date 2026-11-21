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
