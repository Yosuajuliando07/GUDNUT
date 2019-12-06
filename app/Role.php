<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $table = "roles";

    protected $fillable = ['level'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
    // public static function isRole($check_role)
    // {
    //     $user_roles = self::where(['user_id'=> \Auth::user()->id,'roles'=>$check_role])->first();
    //     return $user_roles ? true : false;
    // }
}
