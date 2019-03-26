<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Avatar;
use App\User;

class ApiController extends Controller
{
    public function displayAvatars($userName = ''){

        if($userName){

            $idUser = User::whereName($userName)->get();

            if( $idUser->isEmpty() ){

                return 'Aucun avatar ne correspond à ce nom de compte ...';
            }
            else{

                $avatars = Avatar::where( 'users_id', $idUser[0]->id )->get();

                foreach($avatars as $avatar){
        
                    echo $avatar->picture . '<br>';
                }
            }
        }
        else{

            return 'API v1.0';
        }
    }
}
