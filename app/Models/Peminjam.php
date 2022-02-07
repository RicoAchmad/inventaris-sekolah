<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $visible = ['id','nama_barang','tgl_pinjam','jumlah_pinjam' , 'nama_peminjam'];

    protected $fillable = ['id','nama_barang','tgl_pinjam','jumlah_pinjam' , 'nama_peminjam'];

    public $timestamps = true;

    public function barang()
    {
        // Data model "Model" bisa memiliki oleh model "Author"
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Barang','id_barang');
    }

    public function pengembalian()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Pengembalian','id_peminjam');
    }
}
