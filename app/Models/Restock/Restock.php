<?php

namespace App\Models\Restock;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    protected $table = "restock";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'id_barang',
        'tgl_restock',
        'jumlah_restock',
        'created_at',
        'updated_at'        
    ];

}
