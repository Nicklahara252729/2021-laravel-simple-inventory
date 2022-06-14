<?php

namespace App\Helper;

use Illuminate\Support\Facades\Session;
use App\Models\User\User;

class Authorization
{
    static function getUserInfo()
    {
        $idUser = Session::get('id_user');        
        return User::where('id',$idUser)->first();
    }
}
