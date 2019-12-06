<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
     // public $timestamps = false;

     protected $table = "komentars";

     protected $fillable = [
                             'user_id',
                             'blog_id',
                             'komentar',
                             'created_at',
                             'updated_at'
                           ];
    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
