<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['comment','tel','e-mail','deadline'];

    public function service(){
        return $this->belongsTo('App\Service');
    }
}
