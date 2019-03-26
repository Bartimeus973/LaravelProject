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
    public function display($userName = ''){

        if($userName){

            $dataUser = User::whereName($userName)->get();

            if( $dataUser->isEmpty() ){

                return 'aucune icône ne correspond à ce nom de compte ...';
            }
            else{

                return $dataUser;
            }
        }
        else{

            return 'API v1.0';
        }
    }
}
