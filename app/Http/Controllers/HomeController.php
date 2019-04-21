<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Avatar;
use URL;


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
    public function index(){

        try{
            // on récupère la liste des avatars de l'utilisateur courant
            $url = URL::to('/');
            $idUser = \Auth::user()->id;
            $avatars = Avatar::where( 'users_id', $idUser )->get();

            if($avatars->isEmpty()){

                $avatars = null;
            }   
            
            // on renvoie la vue avec les avatars et l'url complète pour affichage
            return view('home', ['avatars' => $avatars, 'url' => $url ]);
        }
        catch( \Exception $e ){
            dd($e);
        }
        
    }

    // suppression d'un avatar
    public function deleteRow( $avatarId = '' ){

        try{
            $row = Avatar::find($avatarId);
            $row->delete();

            return back()->with('success','Avatar supprimé avec succès !');
        }
        catch( \Exception $e ){
            dd($e);
        }
    }

}
