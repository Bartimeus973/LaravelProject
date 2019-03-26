<?php
namespace App\http\Controllers;
use App\User;
use Illuminate\Http\Request;
class Identification extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function entree()
    {
        return view('identification');
    }
    public function sortie(Request $request)
    {
        $this->validate($request, ['mail' => 'required',
        'password' => 'required'
        ]);
        //if(mail/@)
        //erreur et retour inscription
        //else
        return view('accueil', ['mail' => request('mail'), 'password' => request('password')]);  
    }
}
