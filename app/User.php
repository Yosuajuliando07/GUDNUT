<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "users";
    protected $fillable = [
                            'nama',
                            'email',
                            'password',
                            'username',
                            'no_hp',
                            'alamat',
                            'jenis_kelamin',
                            'gambar',
                            'role_id',
                            'tgl_lahir',
                          ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function produk(){
        return $this->hasMany('App\Produk');
    }
    public function blog()
    {
        return $this->hasMany('App\Blog');
    }
    public function komentar()
    {
        return $this->hasMany('App\Komentar');
    }
    public function order(){
        return $this->hasMany('App\Order');
    }

}
