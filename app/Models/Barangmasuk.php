<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    use HasFactory;
    protected $visible = ['id','nama_barang','tgl_msk','jumlah_msk'];

    protected $fillable = ['id','nama_barang','tgl_msk','jumlah_msk'];

    public $timestamps = true;

    public function barang()
    {
        // Data model "Model" bisa memiliki oleh model "Author"
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Barang','id_barang');
    }
}
