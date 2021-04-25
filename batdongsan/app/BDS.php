<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BDS extends Model
{
    //
    public $timestamps = false;
    protected $table = "bat_dong_san";
    protected $primaryKey = 'bdsid';

    public function lbds(){
    	return $this->belongsTo('App\LoaiBDS','loaiid');
    }

    public function khach(){
    	return $this->belongsTo('App\Khach','khid');
    }
}