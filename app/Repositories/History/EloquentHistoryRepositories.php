<?php

namespace App\Repositories\History;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// models
use App\Models\TakeOut\TakeOut;
use App\Models\Barang\Barang;

use App\Repositories\History\HistoryRepositories;

class EloquentHistoryRepositories implements HistoryRepositories
{
    private $takeOut;
    private $tanggal;
    private $barang;

    public function __construct(TakeOut $takeOut,Barang $barang)
    {
        $this->barang  = $barang;
        $this->takeOut = $takeOut;
        $this->tanggal = date('Y-m-d H:i:s');
    }

    public function viewData()
    {
        return $this->takeOut->orderBy('id', 'desc')
            ->get();
    }

    public function getData($id)
    {
        return $this->takeOut->where('id', $id)
            ->first();
    }

    public function saveData($req)
    {
        DB::beginTransaction();
        $getDataBarang  = $this->barang->where(['id' => $req['id_barang']])->first();
        $getDataTakeOut = $this->takeOut->where(['id' => $req['id']])->first();
        $stok = ($getDataBarang->jumlah + $getDataTakeOut->jumlah_take_out) - $req['jumlah_take_out'];
        $data = [
            'nama'           => $req['nama'],
            'tgl_take_out'   => $req['tgl_take_out'],
            'jumlah_take_out'=> $req['jumlah_take_out'],
        ];
        
        
        $saveData       = $this->takeOut->where('id', $req['id'])
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
