<?php

namespace App\Http\Controllers\HistoryRestock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Authorization;
use Illuminate\Support\Facades\Session;
use App\Repositories\HistoryRestock\HistoryRestockRepositories;

class HistoryRestockController extends Controller
{
    public function __construct(Request $req,
    HistoryRestockRepositories $HistoryRestockRepositories){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->HistoryRestockRepositories = $HistoryRestockRepositories;
    }

    public function index(){
        if (Session::get('id_user') <= 0) :
            return redirect('/');
        endif;
        $active = "restock";
        $user   = Authorization::getUserInfo();
        $view   = $this->HistoryRestockRepositories->viewData();
        return view("history-restock.index",compact('user','view','active'));
    }

    public function saveData()
    {
        $req      = $this->request;
        $response = $this->HistoryRestockRepositories->saveData($req);
        return response($response);
    }

    public function getData()
    {
        $req      = $this->request;
        $response = $this->HistoryRestockRepositories->getData($req->id);
        return response($response);
    }
}
