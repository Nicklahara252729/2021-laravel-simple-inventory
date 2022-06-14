<?php

namespace App\Http\Controllers\History;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Authorization;
use Illuminate\Support\Facades\Session;
use App\Repositories\History\HistoryRepositories;

class HistoryController extends Controller
{
    public function __construct(Request $req,
    HistoryRepositories $HistoryRepositories){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->HistoryRepositories = $HistoryRepositories;
    }

    public function index(){
        if (Session::get('id_user') <= 0) :
            return redirect('/');
        endif;
        $active = "history";
        $user   = Authorization::getUserInfo();
        $view   = $this->HistoryRepositories->viewData();
        return view("history.index",compact('user','view','active'));
    }

    public function saveData()
    {
        $req      = $this->request;
        $response = $this->HistoryRepositories->saveData($req);
        return response($response);
    }

    public function getData()
    {
        $req      = $this->request;
        $response = $this->HistoryRepositories->getData($req->id);
        return response($response);
    }
}
