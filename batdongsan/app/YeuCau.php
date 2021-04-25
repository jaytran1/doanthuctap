<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YeuCau extends Model
{
    //
    public $timestamps = false;
    protected $table = "yeu_cau_kh";
    protected $primaryKey = 'ycid';


    public function lbds(){
    	return $this->belongsTo('App\LoaiBDS','loaiid');
    }

    public function khach(){
    	return $this->belongsTo('App\Khach','khid');
    }


}
