<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Auth\Login\LoginRepositories;

class LoginController extends Controller
{
    public function __construct(Request $req,
    LoginRepositories $LoginRepositories){
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->LoginRepositories = $LoginRepositories;
    }

    public function index(){
        return view("auth.login");
    }

    public function prosesLogin()
    {
        $req    = $this->request;
        $proses = $this->LoginRepositories->prosesLogin($req);
        if($proses['status'] == true):
            return redirect('dashboard');
        else:
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        endif;
    }
}
