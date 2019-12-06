<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    public $timestamps = false;

    protected $table = "kotas";

    protected $fillable = ['nama_kota'];

    public function produk()
    {
        return $this->hasMany('App\Produk');
    }
    public function order()
    {
        return $this->hasMany('App\Order');
    }
}
