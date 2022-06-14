<?php

namespace App\Repositories\HistoryRestock;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// models
use App\Models\Restock\Restock;
use App\Models\Barang\Barang;

use App\Repositories\HistoryRestock\HistoryRestockRepositories;

class EloquentHistoryRestockRepositories implements HistoryRestockRepositories
{
    private $restock;
    private $tanggal;
    private $barang;

    public function __construct(Restock $restock,Barang $barang)
    {
        $this->barang  = $barang;
        $this->restock = $restock;
        $this->tanggal = date('Y-m-d H:i:s');
    }

    public function viewData()
    {
        return $this->restock->select("restock.id","tgl_restock","jumlah_restock","nama")
                             ->join('barang', 'restock.id_barang', '=', 'barang.id')
                             ->orderBy('restock.id', 'desc')
                             ->get();
    }

    public function getData($id)
    {
        return $this->restock->where('id', $id)
            ->first();
    }

    public function saveData($req)
    {
        DB::beginTransaction();
        $getDataBarang  = $this->barang->where(['id' => $req['id_barang']])->first();
        $getDataTakeOut = $this->restock->where(['id' => $req['id']])->first();
        $stok = ($getDataBarang->jumlah + $getDataTakeOut->jumlah_take_out) + $req['jumlah_restock'];
        $data = [
            'tgl_restock'   => $req['tgl_restock'],
            'jumlah_restock'=> $req['jumlah_restock'],
        ];
        
        
        $saveData       = $this->restock->where('id', $req['id'])
                                        ->update($data);
        $barangUpdate   = $this->barang->where('id', $getDataTakeOut->id_barang)
                                       ->update(['jumlah'=>$stok]);
        if ($saveData && $barangUpdate) :
            DB::commit();
            $msg = array(
                'msg'    => 'Data berhasil disimpan',
                'icon'   => 'success',
                'status' => true
            );
        else :
            DB::rollback();
            $msg = array(
                'msg'    => 'Gagal menyimpan data pengguna',
                'icon'   => 'error',
                'status' => false
            );
        endif;
        return $msg;
    }
}
