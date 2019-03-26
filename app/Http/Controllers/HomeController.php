<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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

    public function form(Request $request){

        $this->validate( $request, 
            [ 'img' => 'required|image|mimes:jpeg,png,jpg|max:2048' ],
            ['img.required' => 'le champ doit être saisi',]
        );

        $input = $request->input('img');

/*
        $updateName = Bozo::whereId(1)->first();
        $updateName->nom = $input;
        $updateName->save();
        
        return redirect()->route('bozoRoute', $input);*/

    }
}
