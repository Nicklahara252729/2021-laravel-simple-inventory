<?php

namespace App\Models\TakeOut;
use Illuminate\Database\Eloquent\Model;

class TakeOut extends Model
{
    protected $table = "take_out";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'id_barang',
        'nama',
        'tgl_take_out',
        'jumlah_take_out',  
        'created_at',
        'updated_at'        
    ];

}
