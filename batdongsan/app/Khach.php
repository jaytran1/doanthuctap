<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khach extends Model
{
    //
    protected $table = "khach_hang";
    protected $primaryKey = 'khid';

    public function user(){
    	return $this->belongsTo('App\User','id');
    }

    public function bds(){
    	//return $this->hasMany('App\BDS','khid','khid');
    }
}
