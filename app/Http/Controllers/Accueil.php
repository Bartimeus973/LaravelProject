<?php
namespace App\http\Controllers;
use App\User;
use Illuminate\Http\Request;
class Accueil extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function entree()
    {
        return view('Accueil');
    }
}
