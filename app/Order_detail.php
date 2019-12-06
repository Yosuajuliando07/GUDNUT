<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    // public $timestamps = false;

    protected $table = "order_details";

    protected $fillable = [
                            'order_id',
                            'produk_id',
                            'qty',
                            'status_bayar',
                            'status_brg_dikirim',
                            'created_at',
                            'updated_at'
                        ];

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }
    public function produk()
    {
        return $this->belongsTo('App\Produk');
    }
    public function buktipembayaran()
    {
    	return $this->hasOne('App\Buktipembayaran');
    }
}
