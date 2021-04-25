<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BDS;

class TrangchuController extends Controller
{
    public function getBds(){
        $lastbds = Bds::all()
        ->sortByDesc('bdsid');
        //$bds=BDS::all();
        return view('main.trangchu',['bds'=>$lastbds]);
    }


}