<?php
namespace App\http\Controllers;
use App\User;
use Illuminate\Http\Request;
class Inscription extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function entree()
    {
        return view('inscription');
    }
    public function sortie(Request $request)
    {
        $this->validate($request, ['nom' => 'required',
        //'prenom' => 'required',
        'mail' => 'required',
        'password' => 'required'
        ]);
        //if(mail/@)
        //erreur et retour inscription
        //else
        //return view('accueil', ['nom' => request('nom'), 'prenom' => request('prenom'), 'mail' => request('mail'), 'password' => request('password')]);  
        return view('accueil', ['nom' => request('nom'), 'mail' => request('mail'), 'password' => request('password')]);  
    }
}
