<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Avatar;
use App\User;
use URL;


class ApiController extends Controller
{
    public function displayAvatars($userName = ''){

        // si le pseudo d'utilisateur est renseigné
        if($userName){

            // on récupère l'id du pseudo renseigné
            $idUser = User::whereName($userName)->get();

            // si il n'y a pas d'utilisateur, on renvoie 404
            if( $idUser->isEmpty() ){

                return response()->view('errors/404', [], 404);
            }
            else{

                // on récupère les avatars correspondants à l'id récupéré
                $avatars = Avatar::where( 'users_id', $idUser[0]->id )->get();
                $url = URL::to('/');

                // si il n'y a pas d'avatar, on renvoie un json vide
                if($avatars->isEmpty()){

                    return response()->json([
                        'avatar' => 'empty'
                    ]);
                }
                else{

                    $tab = array();

                    // on rempli un tableau avec les avatars liés au compte 
                    foreach($avatars as $avatar){
        
                        $data = [
                            'e-mail' => $avatar->email,
                            'avatar' => $url . '/' . $avatar->picture
                        ];
                        array_push($tab, $data);
                    }
                    // on retourne le tableau sous forme de JSON
                    return response()->json($tab);
                }
    
            }
        }
        // si il n'y a pas de pseudo renseigné, on renvoie un JSON d'information sur l'API
        else{

            return response()->json([
                'version' => '2.0',
                'avatar sizes' => '150*150',
                'default avatar size' => '150*150',
                'supported format' => ['JPEG','JPG','PNG']
            ]);
        }
    }
}
