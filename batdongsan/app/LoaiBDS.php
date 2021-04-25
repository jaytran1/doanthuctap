<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBDS extends Model
{
    //
    public $timestamps = false;
    protected $table = "loai_bds";
    protected $primaryKey = 'loaiid';

    public function bds(){
    	// return $this->('App\Loi','id');
    }
}