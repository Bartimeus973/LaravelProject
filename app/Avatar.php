<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User'); //Connect one avatars data to one users data
    }
}
