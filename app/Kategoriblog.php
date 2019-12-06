<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategoriblog extends Model
{
    // public $timestamps = false;

    protected $table = "kategoriblogs";

    protected $fillable = [
                            'nama',
                            'created_at',
                            'updated_at'
                          ];

    public function blog()
    {
        return $this->hasMany('App\Blog');
    }
}
