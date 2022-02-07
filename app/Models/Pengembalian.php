<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $visible = ['id','nama_peminjam','nama_barang' , 'jumlah_kembali', 'tgl_kembali'];

    protected $fillable = ['id','nama_peminjam','nama_barang' , 'jumlah_kembali', 'tgl_kembali'];

    public $timestamps = true;

    public function barang()
    {
        // Data model "Model" bisa memiliki oleh model "Author"
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Barang','id_barang');
    }

    public function pinjam()
    {
        // Data model "Model" bisa memiliki oleh model "Author"
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Peminjam','id_peminjam');
    }
}
