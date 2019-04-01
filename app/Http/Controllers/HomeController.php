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
            $url = URL::to('/');
            $idUser = \Auth::user()->id;
            $avatars = Avatar::where( 'users_id', $idUser )->get();

            if($avatars->isEmpty()){

                $avatars = null;
            }   
            
            return view('home', ['avatars' => $avatars, 'url' => $url ]);
        }
        catch( \Exception $e ){
            dd($e);
        }
        
    }

    public function deleteRow(Request $request, $avatarId = ''){

        $row = Avatar::find($avatarId);
        $row->delete();

        return back()->with('success','Avatar supprimé avec succès !');
    }

}
