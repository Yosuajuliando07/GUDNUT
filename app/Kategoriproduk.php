<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriproduk extends Model
{
     // public $timestamps = false;

    protected $table = "kategoriproduks";

    protected $fillable = [
                            'nama',
                            'created_at',
                            'updated_at'
                          ];

    public function produk()
    {
        return $this->hasMany('App\Produk');
    }
}
