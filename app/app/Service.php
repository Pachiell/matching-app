<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title','amount','comment','image','del_flg'];

    public function request(){
        return $this->hasMany('App\Request');
    }

}