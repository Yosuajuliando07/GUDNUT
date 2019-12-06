<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buktipembayaran extends Model
{
     // public $timestamps = false;

    protected $table = "buktipembayarans";

    protected $fillable = [
                            'gambar',
                            'order_detail_id',
                            'created_at',
                            'updated_at'
                          ];

    public function order_detail()
    {
    	return $this->belongsTo('App\Order_detail');
    }
}
