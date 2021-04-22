<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiBDS;

class LoaiBDSController extends Controller
{
    public function getDanhSach(){
        $loaibds = LoaiBDS::all();
        return view('admin.loaibds.danhsach',['loaibds'=>$loaibds]);
    }

    public function getThem(){
        $lbds = LoaiBDS::all();
        return view('admin.loaibds.them',['loaibds'=>$lbds]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'tenloai'=>'required|min:3|unique:loai_bds,tenloai',

            ],
            [
                'tenloai.required'=>'Tên loai không hợp lệ',
                'tenloai.unique'=>'Loai bds đã có',
            ]);
        $loaibds= new LoaiBDS();
        $loaibds->tenloai=$request->tenloai;

        $loaibds->save();

        return redirect('admin/loaibds/danhsach')->with('thongbao','Thêm loại bds thành công');
    }

    public function getSua($id){
        $loaibds = LoaiBDS::find($id);

        return view('admin.loaibds.sua',['loaibds'=>$loaibds]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
        [
            'tenloai'=>'required|min:3|unique:loai_bds,tenloai',

        ],
        [
            'tenloai.required'=>'Tên loai không hợp lệ',
            'tenloai.unique'=>'Loai bds đã có',
        ]);
        $loaibds = LoaiBDS::find($id);
        $loaibds->tenloai=$request->tenloai;

        $loaibds->save();
        return redirect('admin/loaibds/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $loaibds = LoaiBDS::find($id);
        $loaibds->delete();
        return redirect('admin/loaibds/danhsach')->with('thongbao','Xóa loại bds thành công');
    }


}
