<?php
namespace App\http\Controllers;
use App\User;
use Illuminate\Http\Request;
class Navigation extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function accueil()
    {
        return view('accueil');
    }
    public function inscription()
    {
        return view('gestion');
    }
    public function gestion()
    {
        return view('inscription');
    }
}