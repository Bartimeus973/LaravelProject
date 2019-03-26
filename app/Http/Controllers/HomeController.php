<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Avatar;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function imgUpload(Request $request){

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

        $imageName = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('images'), $imageName);

        $mail = request()->email;
        $userId = \Auth::user()->id;

        $data = [
            'email' => $mail,
            'picture' => 'images/' . $imageName,
            'users_id' => $userId
        ];

        Avatar::insert($data);

        return back()->with('success','Image envoyée avec succès !');

    }
}
