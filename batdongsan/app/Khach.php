<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khach extends Model
{
    //
    protected $table = "khach_hang";

    public function user(){
    	return $this->belongsTo('App\User','id');
    }
}
