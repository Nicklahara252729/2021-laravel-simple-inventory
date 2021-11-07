<?php

namespace App\Repositories\Auth\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// models
use App\Models\User\User;


use App\Repositories\Auth\Login\LoginRepositories;

class EloquentLoginRepositories implements LoginRepositories
{
    private $user;
    private $tanggal;

    
    public function __construct(User $user)
    {
        $this->user    = $user;
        $this->tanggal = date('Y-m-d H:i:s');
    }

    public function getUserByUsername($data) 
    {
        return $this->user->where('username',$data);
    }

    public function prosesLogin($req)
    {   
        $getUser    = $this->getUserByUsername($req['username'])->first();
        DB::beginTransaction();
        if(!is_null($getUser)):
            if(Hash::check($req['password'], $getUser->password)):
                $this->user->where('id',$getUser->id)
                            ->update(['updated_at'=>$this->tanggal]);
                DB::commit();
                Session::put('id_user', $getUser->id);
                $response = ['status'=> true,'message'=>'user founded','icon'=>'success'];
            else:
                if(is_null($getUser)):
                    $message = "user not found";
                    $icon    = "warning";
                else:
                    $message = "error while fetching data";
                    $icon    = "error";
                endif;
                DB::rollback();
                $response = ['status'=> false,'message'=>$message,'icon'=>$icon];
            endif;
        else:
            $response = ['status'=> false,'message'=>"user not found",'icon'=>"error"];
        endif;
        return $response;
    }
}