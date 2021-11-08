<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Authorization;
use Illuminate\Support\Facades\Session;
use App\Repositories\User\UserRepositories;

class UserController extends Controller
{
    public function __construct(Request $req,
    UserRepositories $UserRepositories){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->UserRepositories = $UserRepositories;
    }

    public function index(){
        if (Session::get('id_user') <= 0) :
            return redirect('/');
        endif;
        $active = "user";
        $view   = $this->UserRepositories->viewData();
        $user   = Authorization::getUserInfo();
        return view("user.index",compact('user','view','active'));
    }

    public function saveData()
    {
        $req      = $this->request;
        $response = $this->UserRepositories->saveData($req);
        return response($response);
    }    

    public function deleteData()
    {
        $req      = $this->request;
        $response = $this->UserRepositories->deleteData($req->id);
        return response($response);
    }

    public function getData()
    {
        $req      = $this->request;
        $response = $this->UserRepositories->getData($req->id);
        return response($response);
    }
}
