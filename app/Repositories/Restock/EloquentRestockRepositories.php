<?php

namespace App\Repositories\Barang;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// models
use App\Models\Barang\Barang;


use App\Repositories\Barang\BarangRepositories;

class EloquentBarangRepositories implements BarangRepositories
{
    private $barang;
    private $tanggal;


    public function __construct(Barang $barang)
    {
        $this->barang    = $barang;
        $this->tanggal = date('Y-m-d H:i:s');
    }

    public function viewData()
    {
        return $this->barang->orderBy('id', 'desc')
            ->get();
    }

    public function getData($id)
    {
        return $this->barang->where('id', $id)
            ->first();
    }

    public function deleteData($id)
    {
        DB::beginTransaction();

        $cekData = $this->barang->where('id', $id);
        if ($cekData->count() > 0) :
            DB::commit();
            $deleteData = $cekData->delete();
            if ($deleteData) :
                $msg = array(
                    'msg'    => 'Data Telah Dihapus',
                    'icon'   => 'success',
                    'status' => true
                );
            else :
                DB::rollback();
                $msg = array(
                    'msg'    => 'Data Gagal Dihapus',
                    'icon'   => 'error',
                    'status' => false
                );
            endif;
        else :
            $msg = array(
                'msg'    => 'Data Tidak Ditemukan',
                'icon'   => 'error',
                'status' => false
            );
        endif;

        return $msg;
    }

    public function saveData($req)
    {
        $cekData = $this->barang->where(['nama' => $req['nama'], 'jenis_gudang' => $req['jenis_gudang']])
                                ->count();
        if ($cekData > 0 && is_null($req['id'])) :
            $msg = array(
                'msg'    => 'Data sudah ada',
                'icon'   => 'error',
                'status' => false
            );
        else :
            DB::beginTransaction();
            $data = [
                'nama'          => $req['nama'],
                'kategori'      => $req['kategori'],
                'jumlah'        => $req['jumlah'],
                'jenis_gudang'  => $req['jenis_gudang'],
            ];
            if(!is_null($req['id'])):
                $dataUpdate = array_merge(['updated_at'=>$this->tanggal],$data);
                $saveData = $this->barang->where('id',$req['id'])
                                         ->update($dataUpdate);
            else:
                $saveData = $this->barang->create($data);
            endif;
            
            if ($saveData) :
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
        endif;
        return $msg;
    }
}
