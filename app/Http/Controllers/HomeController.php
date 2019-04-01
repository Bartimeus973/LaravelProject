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
    public function index()
    {
        try{
        $url = URL::to('/');
        $idUser = \Auth::user()->id;
        //$avatars = DB::table('avatars')->select('picture')->where('users_id', '=', $userId)->get();
        $avatars = Avatar::where( 'users_id', $idUser )->get();

        }
        catch( \Exception $e ){
            dd($e);
        }
        return view('home', ['avatars' => $avatars, 'url' => $url ]);
    }

}
