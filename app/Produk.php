<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // public $timestamps = false;

    protected $table = "produks";

    protected $fillable = [
                            'stok',
                            'harga',
                            'berat',
                            'user_id',
                            'kota_id',
                            'nama_produk',
                            'gambar_produk',
                            'deskripsi_produk',
                            'kategoriproduk_id',
                            'alamat_lngkp_produk',
                            'created_at',
                            'updated_at'
                          ];
    public function kategoriproduk()
    {
        return $this->belongsTo('App\Kategoriproduk');
    }
    public function kota()
    {
        return $this->belongsTo('App\Kota');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function order_detail()
    {
        return $this->hasMany('App\Order_detail');
    }
}
