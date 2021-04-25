<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiBDS;
use App\Khach;
use App\YeuCau;

class YeuCauKHController extends Controller
{
    public function getDanhSach(){
        $yc = YeuCau::all();
        return view('admin.yeucau.danhsach',['yeucau'=>$yc]);
    }

    public function getThem(){
        $lbds = LoaiBDS::all();
        $khach = Khach::all();
        return view('admin.yeucau.them',['lbds'=>$lbds],['khach'=>$khach]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'vitri'=>'required|max:255|min:3',
                'giat'=>'required|numeric|gte:3000000',
                'giaf'=>'required|numeric|gt:giat',
                'dait'=>'required|numeric|gte:1',
                'daif'=>'required|numeric|gt:dait',
                'rongt'=>'required|numeric|gte:1',
                'rongf'=>'required|numeric|gt:rongt',

            ],
            [
                'vitri.required'=>'Yêu cầu nhập vị trí',
                'vitri.min'=>'Yêu cầu vị trí có độ dài ít nhất là 3',

                'giat.required'=>'Yêu cầu nhập giá trị nhỏ nhất bạn muốn',
                'giat.numeric'=>'Vui lòng nhập số',
                'giat.gte'=>'Giá khởi điểm phải trên 3 triệu',

                'giaf.required'=>'Yêu cầu nhập giá trị lớn nhất bạn muốn',
                'giaf.numeric'=>'Vui lòng nhập số',
                'giaf.gt'=>'Giá phải lớn hơn giá khởi điểm',

                'dait.required'=>'Yêu cầu nhập chiều dài nhỏ nhất bạn muốn',
                'dait.numeric'=>'Vui lòng nhập số',
                'dait.gte'=>'Giá trị chiều dài không hợp lệ',

                'daif.required'=>'Yêu cầu nhập chiều dài lớn nhất bạn muốn',
                'daif.numeric'=>'Vui lòng nhập số',
                'daif.gt'=>'Giá trị chiều dài không hợp lệ',

                'rongt.required'=>'Yêu cầu nhập chiều rộng nhỏ nhất bạn muốn',
                'rongt.numeric'=>'Vui lòng nhập số',
                'rongt.gte'=>'Giá trị chiều rộng không hợp lệ',

                'rongf.required'=>'Yêu cầu nhập chiều rộng lớn nhất bạn muốn',
                'rongf.numeric'=>'Vui lòng nhập số',
                'rongf.gt'=>'Giá trị chiều rộng không hợp lệ',
            ]);
        $yc= new YeuCau();
        $yc->vitri=$request->vitri;
        $yc->mota=$request->mota;
        $yc->giat=$request->giat;
        $yc->giaf=$request->giaf;
        $yc->dait=$request->dait;
        $yc->daif=$request->daif;
        $yc->rongt=$request->rongt;
        $yc->rongf=$request->rongf;
        $yc->loaiid=$request->loaiid;
        $yc->khid=$request->khid;


        $yc->save();
        return redirect('admin/yeucau/danhsach')->with('thongbao','Thêm bất động sản thành công');
    }

    public function getSua($id){
        $lbds = LoaiBDS::find($id);
        $khach = Khach::find($id);
        $yeucau= YeuCau::find($id);
        return view('admin.yeucau.sua',['yeucau'=>$yeucau]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
        [
            'vitri'=>'required|max:255|min:3',
            'giat'=>'required|numeric|gte:3000000',
            'giaf'=>'required|numeric|gt:giat',
            'dait'=>'required|numeric|gte:1',
            'daif'=>'required|numeric|gt:dait',
            'rongt'=>'required|numeric|gte:1',
            'rongf'=>'required|numeric|gt:rongt',

        ],
        [
            'vitri.required'=>'Yêu cầu nhập vị trí',
            'vitri.min'=>'Yêu cầu vị trí có độ dài ít nhất là 3',

            'giat.required'=>'Yêu cầu nhập giá trị nhỏ nhất bạn muốn',
            'giat.numeric'=>'Vui lòng nhập số',
            'giat.gte'=>'Giá khởi điểm phải trên 3 triệu',

            'giaf.required'=>'Yêu cầu nhập giá trị lớn nhất bạn muốn',
            'giaf.numeric'=>'Vui lòng nhập số',
            'giaf.gt'=>'Giá phải lớn hơn giá khởi điểm',

            'dait.required'=>'Yêu cầu nhập chiều dài nhỏ nhất bạn muốn',
            'dait.numeric'=>'Vui lòng nhập số',
            'dait.gte'=>'Giá trị chiều dài không hợp lệ',

            'daif.required'=>'Yêu cầu nhập chiều dài lớn nhất bạn muốn',
            'daif.numeric'=>'Vui lòng nhập số',
            'daif.gt'=>'Giá trị chiều dài không hợp lệ',

            'rongt.required'=>'Yêu cầu nhập chiều rộng nhỏ nhất bạn muốn',
            'rongt.numeric'=>'Vui lòng nhập số',
            'rongt.gte'=>'Giá trị chiều rộng không hợp lệ',

            'rongf.required'=>'Yêu cầu nhập chiều rộng lớn nhất bạn muốn',
            'rongf.numeric'=>'Vui lòng nhập số',
            'rongf.gt'=>'Giá trị chiều rộng không hợp lệ',
        ]);
        $yc = YeuCau::find($id);
        $yc->vitri=$request->vitri;
        $yc->mota=$request->mota;
        $yc->giat=$request->giat;
        $yc->giaf=$request->giaf;
        $yc->dait=$request->dait;
        $yc->daif=$request->daif;
        $yc->rongt=$request->rongt;
        $yc->rongf=$request->rongf;
        $yc->loaiid=$request->loaiid;
        $yc->khid=$request->khid;


        $yc->save();
        return redirect('admin/yeucau/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $yc = YeuCau::find($id);
        $yc->delete();
        return redirect('admin/yeucau/danhsach')->with('thongbao','Xóa yêu cầu thành công');
    }

}
