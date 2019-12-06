<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    // public $timestamps = false;

    protected $table = "sliders";

    protected $fillable = [
                           'gambar',
                           'keterangan',
                           'status',
                           'created_at',
                           'updated_at'
                        ];
}
