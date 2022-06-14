<?php

namespace App\Models\Barang;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'nama',
        'jumlah',
        'jenis_gudang',  
        'created_at',
        'updated_at'
    ];

}
