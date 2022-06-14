<?php

namespace App\Http\Controllers\GudangDokumen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Authorization;
use Illuminate\Support\Facades\Session;
use App\Repositories\GudangDokumen\GudangDokumenRepositories;

class GudangDokumenController extends Controller
{
    public function __construct(Request $req,
    GudangDokumenRepositories $GudangDokumenRepositories){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->GudangDokumenRepositories = $GudangDokumenRepositories;
    }

    public function index(){
        if (Session::get('id_user') <= 0) :
            return redirect('/');
        endif;
        $active = "gudang dokumen";
        $user   = Authorization::getUserInfo();
        $view   = $this->GudangDokumenRepositories->viewData();
        return view("gudang-dokumen.index",compact('user','active','view'));
    }

    public function saveData()
    {
        $req      = $this->request;
        $response = $this->GudangDokumenRepositories->saveData($req);
        return response($response);
    }
    
    public function saveTakeOutData()
    {
        $req      = $this->request;
        $response = $this->GudangDokumenRepositories->saveTakeOutData($req);
        return response($response);
    }

    public function saveRestock()
    {
        $req      = $this->request;
        $response = $this->GudangDokumenRepositories->saveRestock($req);
        return response($response);
    }

    public function deleteData()
    {
        $req      = $this->request;
        $response = $this->GudangDokumenRepositories->deleteData($req->id);
        return response($response);
    }

    public function getData()
    {
        $req      = $this->request;
        $response = $this->GudangDokumenRepositories->getData($req->id);
        return response($response);
    }

}
