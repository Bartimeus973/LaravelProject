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

        if($userName){

            $idUser = User::whereName($userName)->get();

            if( $idUser->isEmpty() ){

                return 'Aucun avatar ne correspond à ce nom de compte ...';
            }
            else{

                $avatars = Avatar::where( 'users_id', $idUser[0]->id )->get();
                $url = URL::to('/');

                if($avatars->isEmpty()){

                    return response()->json([
                        'avatar' => 'empty'
                    ]);
                }
                else{

                    $tab = array();
                    
                    foreach($avatars as $avatar){
        
                        $data = [
                            'e-mail' => $avatar->email,
                            'avatar' => $url . '/' . $avatar->picture
                        ];
                        array_push($tab, $data);
                    }
                    return response()->json($tab);
                }
    
            }
        }
        else{

            return response()->json([
                'version' => '1.0',
                'avatar size' => 'undefined',
                'default avatar size' => 'undefined',
                'supported format' => 'JPEG, JPG, PNG'
            ]);
        }
    }
}
