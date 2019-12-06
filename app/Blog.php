<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // public $timestamps = false;

    protected $table = "blogs";

    protected $fillable = [
                            'user_id',
                            'kategoriblog_id',
                            'judul',
                            'artikel',
                            'gambar',
                            'created_at',
                            'updated_at'
                          ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function kategoriblog()
    {
        return $this->belongsTo('App\Kategoriblog')->withDefault();
    }
    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }
}
