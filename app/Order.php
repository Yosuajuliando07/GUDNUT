<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // public $timestamps = false;

    protected $table = "orders";

    protected $fillable = [
                            'user_id',
                            'kota_id',
                            'nama_penerima',
                            'email_penerima',
                            'no_hp_penerima',
                            'catatan',
                            'alamat_lengkap',
                            'total_bayar',
                            'status_brg_sampai',
                            'created_at',
                            'updated_at'
                            ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function order_detail()
    {
    	return $this->hasOne('App\Order_detail');
    }
    public function kota()
    {
        return $this->belongsTo('App\Kota');
    }


}
