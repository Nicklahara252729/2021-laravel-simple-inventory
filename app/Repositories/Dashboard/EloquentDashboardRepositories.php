<?php

namespace App\Repositories\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// models
use App\Models\TakeOut\TakeOut;
use App\Models\Barang\Barang;
use App\Models\Restock\Restock;

use App\Repositories\Dashboard\DashboardRepositories;

class EloquentDashboardRepositories implements DashboardRepositories
{
    private $takeOut;
    private $restock;
    private $tanggal;
    private $barang;

    public function __construct(TakeOut $takeOut,Barang $barang,Restock $restock)
    {
        $this->barang  = $barang;
        $this->restock = $restock;
        $this->takeOut = $takeOut;
        $this->tanggal = date('Y-m-d H:i:s');
    }

    public function viewDataBarang($key)
    {
        return $this->barang->where('jenis_gudang',$key)->count();
    }

    public function viewDataHistory($key)
    {
        return $this->takeOut->where('id', $key)
            ->first();
    }
}
