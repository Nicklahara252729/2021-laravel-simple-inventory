<?php

namespace App\Http\Controllers\GudangAtk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Authorization;
use Illuminate\Support\Facades\Session;
use App\Repositories\GudangAtk\GudangAtkRepositories;

class GudangAtkController extends Controller
{
    public function __construct(Request $req,
    GudangAtkRepositories $GudangAtkRepositories){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->GudangAtkRepositories = $GudangAtkRepositories;
    }

    public function index(){
        if (Session::get('id_user') <= 0) :
            return redirect('/');
        endif;
        $active = "gudang atk";
        $user   = Authorization::getUserInfo();
        $view   = $this->GudangAtkRepositories->viewData();
        return view("gudang-atk.index",compact('user','active','view'));
    }

    public function saveData()
    {
        $req      = $this->request;
        $response = $this->GudangAtkRepositories->saveData($req);
        return response($response);
    }
    
    public function saveTakeOutData()
    {
        $req      = $this->request;
        $response = $this->GudangAtkRepositories->saveTakeOutData($req);
        return response($response);
    }

    public function saveRestock()
    {
        $req      = $this->request;
        $response = $this->GudangAtkRepositories->saveRestock($req);
        return response($response);
    }

    public function deleteData()
    {
        $req      = $this->request;
        $response = $this->GudangAtkRepositories->deleteData($req->id);
        return response($response);
    }

    public function getData()
    {
        $req      = $this->request;
        $response = $this->GudangAtkRepositories->getData($req->id);
        return response($response);
    }

}
