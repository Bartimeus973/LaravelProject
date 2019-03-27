<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Avatar;


class ImgController extends Controller {

    public function index()
    {
        return view('uploadImg');
    }


    public function imgUpload(Request $request){

    // on vérifie les champs saisis par l'utilisateur
    $this->validate( $request, 
        [ 
        'img' => 'required|mimes:jpeg,jpg,png',
        'email' => 'required|email'
        ],
        [
        'img.required' => 'Vous devez sélectionner une image',
        'img.mimes' => 'Formats d\'image autorisés : JPEG, JPG ou PNG',
        'email.required' => 'Vous devez saisir un e-mail'
        ]);

    // on renomme l'image uploadée et on l'enregistre dans public/images
    $imageName = time().'.'.request()->img->getClientOriginalExtension();
    request()->img->move(public_path('images'), $imageName);

    $mail = request()->email;
    $userId = \Auth::user()->id;

    $data = [
        'email' => $mail,
        'picture' => 'images/' . $imageName,
        'users_id' => $userId
    ];

    // On ajoute les données saisies ainsi que l'url de l'image dans la table Avatar
    Avatar::insert($data);

    // On retourne sur la page précédente avec un message de confirmation
    return back()->with('success','Image envoyée avec succès !');

    }
}