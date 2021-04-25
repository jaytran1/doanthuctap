<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiBDS;
use App\Khach;
use App\BDS;
use Str;

class BDSController extends Controller
{
    public function getDanhSach(){
        $bds = BDS::all();
        return view('admin.bds.danhsach',['bds'=>$bds]);
    }

    public function getThem(){
        $lbds = LoaiBDS::all();
        $khach = Khach::all();
        return view('admin.bds.them',['lbds'=>$lbds],['khach'=>$khach]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'tenduong'=>'required|min:3',
                'sonha'=>'required|min:3',
                'phuong'=>'required',
                'quan'=>'required',
                'thanhpho'=>'required|min:3',
                'dientich'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'dongia'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'chieudai'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'chieurong'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'huehong'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            ],
            [
                'tenduong.required'=>'Yêu cầu nhập tên đường',
                'tenduong.min'=>'Yêu cầu tên đường có độ dài ít nhất là 3',
                'sonha.required'=>'Yêu cầu nhập số nhà',
                'sonha.min'=>'Yêu cầu số nhà có độ dài ít nhất là 3',
                'phuong.required'=>'Yêu cầu nhập phường',
                'quan.required'=>'Yêu cầu nhập quận',
                'thanhpho.required'=>'Yêu cầu nhập thành phố',
                'thanhpho.min'=>'Yêu cầu thành phố có độ dài ít nhất là 3',
                'dientich.required'=>'Yêu cầu nhập diện tích',
                'dientich.regex'=>'Yêu cầu diện tích đúng định dạng',
                'dongia.required'=>'Yêu cầu nhập đơn giá',
                'dongia.regex'=>'Yêu cầu đơn giá đúng định dạng',
                'chieudai.required'=>'Yêu cầu nhập chiều dài',
                'chieudai.regex'=>'Yêu cầu chiều dài đúng định dạng',
                'chieurong.required'=>'Yêu cầu nhập chiều rộng',
                'chieurong.regex'=>'Yêu cầu chiều rộng đúng định dạng',
                'huehong.required'=>'Yêu cầu nhập tiền hoa hồng',
                'huehong.regex'=>'Yêu cầu tiền hoa hồng đúng định dạng'
            ]);
        $bds= new BDS();
        $bds->tinhtrang=$request->tinhtrang;
        $bds->dientich=$request->dientich;
        $bds->dongia=$request->dongia;
        $bds->chieudai=$request->chieudai;
        $bds->chieurong=$request->chieurong;
        $bds->masoqsdd=$request->masoqsdd;
        $bds->hinhanh=$request->hinhanh;
        $bds->mota=$request->mota;
        $bds->huehong=$request->huehong;
        $bds->tenduong=$request->tenduong;
        $bds->sonha=$request->sonha;
        $bds->phuong=$request->phuong;
        $bds->quan=$request->quan;
        $bds->thanhpho= $request->thanhpho;
        $bds->loaiid=$request->loaiid;
        $bds->khid=$request->khid;

        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/bds/them')->with('thongbao','Định dạng hình ảnh không hợp lệ ! (only jpg,png,jpeg)');
            }
            $name=$file->getClientOriginalName();
            $Hinh =Str::random(3)."_".$name;
            while(file_exists("file/hinhanh/".$Hinh)){
                $Hinh =Str::random(3)."_".$name;
            }
            $file->move("file/hinhanh",$Hinh);
            $bds->hinhanh=$Hinh;
        }
        else{
            $bds->hinhanh = "";
        }

        $bds->save();
        return redirect('admin/bds/them')->with('thongbao','Thêm bất động sản thành công');
    }

    public function getSua($id){
        $lbds = LoaiBDS::find($id);
        $khach = Khach::find($id);
        $bds= BDS::find($id);
        return view('admin.bds.sua',['bds'=>$bds]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'tenduong'=>'required|min:3',
                'sonha'=>'required|min:3',
                'phuong'=>'required',
                'quan'=>'required',
                'thanhpho'=>'required|min:3',
                'dientich'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'dongia'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'chieudai'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'chieurong'=>'required|regex:/^\d+(\.\d{1,2})?$/',
                'huehong'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            ],
            [
                'tenduong.required'=>'Yêu cầu nhập tên đường',
                'tenduong.min'=>'Yêu cầu tên đường có độ dài ít nhất là 3',
                'sonha.required'=>'Yêu cầu nhập số nhà',
                'sonha.min'=>'Yêu cầu số nhà có độ dài ít nhất là 3',
                'phuong.required'=>'Yêu cầu nhập phường',
                'quan.required'=>'Yêu cầu nhập quận',
                'thanhpho.required'=>'Yêu cầu nhập thành phố',
                'thanhpho.min'=>'Yêu cầu thành phố có độ dài ít nhất là 3',
                'dientich.required'=>'Yêu cầu nhập diện tích',
                'dientich.regex'=>'Yêu cầu diện tích đúng định dạng',
                'dongia.required'=>'Yêu cầu nhập đơn giá',
                'dongia.regex'=>'Yêu cầu đơn giá đúng định dạng',
                'chieudai.required'=>'Yêu cầu nhập chiều dài',
                'chieudai.regex'=>'Yêu cầu chiều dài đúng định dạng',
                'chieurong.required'=>'Yêu cầu nhập chiều rộng',
                'chieurong.regex'=>'Yêu cầu chiều rộng đúng định dạng',
                'huehong.required'=>'Yêu cầu nhập tiền hoa hồng',
                'huehong.regex'=>'Yêu cầu tiền hoa hồng đúng định dạng'
            ]);
        $bds = BDS::find($id);
        $bds->tinhtrang=$request->tinhtrang;
        $bds->dientich=$request->dientich;
        $bds->dongia=$request->dongia;
        $bds->chieudai=$request->chieudai;
        $bds->chieurong=$request->chieurong;
        $bds->masoqsdd=$request->masoqsdd;
        $bds->hinhanh=$request->hinhanh;
        $bds->mota=$request->mota;
        $bds->huehong=$request->huehong;
        $bds->tenduong=$request->tenduong;
        $bds->sonha=$request->sonha;
        $bds->phuong=$request->phuong;
        $bds->quan=$request->quan;
        $bds->thanhpho= $request->thanhpho;
        $bds->loaiid=$request->loaiid;
        $bds->khid=$request->khid;

        if($request->hasFile('hinhanh')){
            $file=$request->file('hinhanh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                return redirect('admin/bds/them')->with('thongbao','Định dạng hình ảnh không hợp lệ ! (only jpg,png,jpeg)');
            }
            $name=$file->getClientOriginalName();
            $Hinh =Str::random(3)."_".$name;
            while(file_exists("file/hinhanh/".$Hinh)){
                $Hinh =Str::random(3)."_".$name;
            }
            $file->move("file/hinhanh",$Hinh);
            $bds->hinhanh=$Hinh;
        }
        else{
            $bds->hinhanh = "";
        }

        $bds->save();
        return redirect('admin/bds/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id)
    {
        $bds = BDS::find($id);
        $bds->delete();
        return redirect('admin/bds/danhsach')->with('thongbao','Xóa bất động sản thành công');
    }

    public function getHinh($id){
//        $lbds = LoaiBDS::all();
      //  $khach = Khach::all();
        $bds= BDS::find($id);
        return view('admin.bds.hinh',['bds'=>$bds]);
    }

}