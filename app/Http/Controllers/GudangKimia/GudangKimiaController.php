<?php

namespace App\Http\Controllers\GudangKimia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Authorization;
use Illuminate\Support\Facades\Session;
use App\Repositories\GudangKimia\GudangKimiaRepositories;

class GudangKimiaController extends Controller
{
    public function __construct(Request $req,
    GudangKimiaRepositories $GudangKimiaRepositories){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->GudangKimiaRepositories = $GudangKimiaRepositories;
    }

    public function index(){
        if (Session::get('id_user') <= 0) :
            return redirect('/');
        endif;
        $active = "gudang kimia";
        $user   = Authorization::getUserInfo();
        $view   = $this->GudangKimiaRepositories->viewData();
        return view("gudang-kimia.index",compact('user','active','view'));
    }

    public function saveData()
    {
        $req      = $this->request;
        $response = $this->GudangKimiaRepositories->saveData($req);
        return response($response);
    }
    
    public function saveTakeOutData()
    {
        $req      = $this->request;
        $response = $this->GudangKimiaRepositories->saveTakeOutData($req);
        return response($response);
    }

    public function saveRestock()
    {
        $req      = $this->request;
        $response = $this->GudangKimiaRepositories->saveRestock($req);
        return response($response);
    }

    public function deleteData()
    {
        $req      = $this->request;
        $response = $this->GudangKimiaRepositories->deleteData($req->id);
        return response($response);
    }

    public function getData()
    {
        $req      = $this->request;
        $response = $this->GudangKimiaRepositories->getData($req->id);
        return response($response);
    }

}
