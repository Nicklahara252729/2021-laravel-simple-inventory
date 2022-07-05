<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// models
use App\Models\User\User;


use App\Repositories\User\UserRepositories;

class EloquentUserRepositories implements UserRepositories
{
    private $user;
    private $tanggal;


    public function __construct(User $user)
    {
        $this->user    = $user;
        $this->tanggal = date('Y-m-d H:i:s');
    }

    public function viewData()
    {
        return $this->user->orderBy('nama', 'desc')
            ->get();
    }

    public function getData($id)
    {
        return $this->user->where('id', $id)
            ->first();
    }

    public function deleteData($id)
    {
        DB::beginTransaction();

        $cekData = $this->user->where('id', $id);
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
        $cekData = $this->user->where('nama',$req['nama'])
                              ->orWhere('email',$req['email'])
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
                'nama'      => $req['nama'],
                'username'  => $req['username'],
                'password'  => Hash::make($req['password']),
                'email'     => $req['email'],
                'level'     => strtolower($req['Staff']),
            ];
            if(!is_null($req['id'])):
                if(is_null($req['password'])):
                    $dataFilter = array_diff_key($data, ["password" => ""]);
                else:
                    $dataFilter = $data;
                endif;
                $dataUpdate = array_merge(['updated_at'=>$this->tanggal],$dataFilter);
                $saveData = $this->user->where('id',$req['id'])
                                       ->update($dataUpdate);
            else:
                $saveData = $this->user->create($data);
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
