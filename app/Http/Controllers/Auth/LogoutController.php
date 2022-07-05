<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function __construct(Request $req){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
    }

    public function index(){
        return view("auth.login");
    }

    public function prosesLogout(){
        session_unset();
        Session::flush();
        return redirect("/");
    }
}
