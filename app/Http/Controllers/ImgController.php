<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Avatar;
use Image;


class ImgController extends Controller {

    public function index()
    {
        return view('uploadImg');
    }


    public function imgUpload(Request $request){

    // on vérifie les champs saisis par l'utilisateur
    $this->validate( $request, 
        [ 
        'img' => 'required|mimes:jpeg,jpg,png|max:1000',
        'email' => 'required|email'
        ],
        [
        'img.required' => 'Vous devez sélectionner une image',
        'img.mimes' => 'Formats d\'image autorisés : JPEG, JPG ou PNG',
        'img.max' => 'taille maximum 1 Mb',
        'email.required' => 'Vous devez saisir un e-mail'
        ]);

        $image = $request->img;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');

        // on resize l'image à l'aide du package Image Intervention
        $img = Image::make($image->getRealPath());
        $img->resize(150, 150, function ($constraint) {

		    $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
        

        // On prépare l'envoie en base de données
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