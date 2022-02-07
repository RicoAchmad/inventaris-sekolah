<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $visible = ['id','nama_barang','id_supplier'];

    protected $fillable = ['id','nama_barang','id_supplier'];

    public $timestamps = true;
    
    public function supplier()
    {
        // Data model "Model" bisa memiliki oleh model "Author"
        //melalui fk "author_id"
        return $this->belongsTo('App\Models\Supplier','id_supplier');
    }

    public function barangmasuk()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Barangmasuk','id_barang');
    }

    public function barangkeluar()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Barangkeluar','id_barang');
    }
    public function peminjam()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Peminjam','id_barang');
    }

    public function pengembalian()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Pengembalian','id_barang');
    }
}
