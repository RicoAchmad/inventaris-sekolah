<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $visible = ['id','nama_supplier','alamat','no_wa'];

    protected $fillable = ['id','nama_supplier','alamat','no_wa'];

    public $timestamps = true;

    //membuat relasi one to many

    public function barang()
    {
        // data model "Author" bisa memiliki banyak data
        //dari model "Book" melalui fk "author_id"
        $this->hasMany('App\Models\Barang','id_supplier');
    }

   
}
