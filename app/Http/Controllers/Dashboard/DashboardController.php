<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Authorization;
use Illuminate\Support\Facades\Session;

use App\Repositories\GudangAtk\GudangAtkRepositories;
use App\Repositories\GudangKimia\GudangKimiaRepositories;
use App\Repositories\GudangDokumen\GudangDokumenRepositories;

class DashboardController extends Controller
{
    public function __construct(
        Request $req,
        GudangAtkRepositories $GudangAtkRepositories,
        GudangKimiaRepositories $GudangKimiaRepositories,
        GudangDokumenRepositories $GudangDokumenRepositories
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $this->request = $req;
        $this->GudangAtkRepositories = $GudangAtkRepositories;
        $this->GudangKimiaRepositories = $GudangKimiaRepositories;
        $this->GudangDokumenRepositories = $GudangDokumenRepositories;
    }

    public function index()
    {
        if (Session::get('id_user') <= 0) :
            return redirect('/');
        endif;
        $active = "dashboard";
        $user   = Authorization::getUserInfo();
        $chartAtk = $this->GudangAtkRepositories->viewDataByGroup();
        $chartKimia = $this->GudangKimiaRepositories->viewDataByGroup();
        $chartDokumen = $this->GudangDokumenRepositories->viewDataByGroup();
        return view("dashboard.index", compact('user', 'active','chartAtk','chartKimia','chartDokumen'));
    }

    public function viewData()
    {
        $req    = $this->request;
        $jenis  = str_replace(" ","-",$req->jenis);
        if ($jenis == "gudang-atk") :
            $response = $this->GudangAtkRepositories->viewData();
        elseif ($jenis == "gudang-kimia") :
            $response = $this->GudangKimiaRepositories->viewData();
        else :
            $response = $this->GudangDokumenRepositories->viewData();
        endif;

        return response($response);
    }
}
