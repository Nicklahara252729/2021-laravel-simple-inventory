<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function __construct(Request $req){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $idUser = Session::get('id_user');
        if ($idUser == null || $idUser == 0 || empty($idUser)) :
            return redirect('login');
        endif;
    }

    public function index(){
        //return view("dashboard.index");
        // echo Session::get('id_user');
        echo "ok";
    }
}
