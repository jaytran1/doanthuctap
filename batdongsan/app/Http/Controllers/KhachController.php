<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Khach;
use App\BDS;

class KhachController extends Controller
{
    public function getDanhSach(){
        $khach = Khach::all();
        return view('admin.khach.danhsach',['khach'=>$khach]);
    }

    public function getThem(){
        $user = User::all();
        return view('admin.khach.them',['user'=>$user]);
    }

    public function postThem(Request $request){  
        $this->validate($request,
            [
                'hoten'=>'required|min:2',
                'diachi'=>'required|min:2',
                'diachitt'=>'required|min:2',
                'cmnd'=>'required|regex:/^\d+(\.\d{1,2})?$/|digits_between:9,12|unique:khach_hang,cmnd',
                'sodienthoai'=>'required|min:9|max:20|unique:khach_hang,sodienthoai',
                'ngaysinh'=>'required',
                'email'=>'required|email|unique:khach_hang,email'
            ],
            [
                'hoten.required'=>'Bạn chưa nhập tên',
                'hoten.min'=>'Yêu cầu tên khách hàng có độ dài ít nhất là 2 ký tự',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
                'diachi.min'=>'Yêu cầu địa chỉ có độ dài ít nhất là 2 ký tự',
                'diachitt.required'=>'Bạn chưa nhập địa chỉ thường trú',
                'diachitt.min'=>'Yêu cầu địa chỉ thường trú có độ dài ít nhất là 2 ký tự',
                'cmnd.required'=>'Bạn chưa nhập cmnd',
                'cmnd.regex'=>'Cmnd nhập vào phải dạng số',
                'cmnd.digits_between'=>'Yêu cầu cmnd có độ dài là 9 hoặc 12 số',
                'cmnd.unique'=>'Số cmnd này đã tồn tại',
                'ngaysinh.required'=>'Bạn chưa chọn ngày sinh',
                'sodienthoai.required'=>'Bạn chưa nhập số điện thoại',
                'sodienthoai.min'=>'Yêu cầu số điện thoại có độ dài ít nhất là 9 số',
                'sodienthoai.max'=>'Độ dài tối đa của số điện thoại là 20 số',
                'sodienthoai.unique'=>'Số điện thoại này đã tồn tại',
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email này đã tồn tại'
            ]);  
        $khach= new Khach;
        $khach->hoten=$request->hoten;
        $khach->diachi=$request->diachi;
        $khach->diachitt=$request->diachitt;
        $khach->cmnd=$request->cmnd;
        $khach->ngaysinh=$request->ngaysinh;
        $khach->sodienthoai=$request->sodienthoai;
        $khach->gioitinh=$request->gioitinh;
        $khach->email=$request->email;
        $khach->loaikh=$request->loaikh;
        $khach->mota=$request->mota;
        $khach->trangthai=$request->trangthai;
        $khach->id=$request->idadmin;
        $khach->save();

        return redirect('admin/khach/them')->with('thongbao','Thêm khách hàng thành công');
    }

    public function getSua($id){
        $khach = Khach::find($id);
        $user = User::find($id);
        return view('admin.khach.sua',['user'=>$user],['khach'=>$khach]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'hoten'=>'required|min:2',
                'diachi'=>'required|min:2',
                'diachitt'=>'required|min:2',
                'sodienthoai'=>'required|min:9|max:20|unique:khach_hang,sodienthoai',
                'ngaysinh'=>'required'
            ],
            [
                'hoten.required'=>'Bạn chưa nhập tên',
                'hoten.min'=>'Yêu cầu tên khách hàng có độ dài ít nhất là 2 ký tự',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
                'diachi.min'=>'Yêu cầu địa chỉ có độ dài ít nhất là 2 ký tự',
                'diachitt.required'=>'Bạn chưa nhập địa chỉ thường trú',
                'diachitt.min'=>'Yêu cầu địa chỉ thường trú có độ dài ít nhất là 2 ký tự',
                'ngaysinh.required'=>'Bạn chưa chọn ngày sinh',
                'sodienthoai.required'=>'Bạn chưa nhập số điện thoại',
                'sodienthoai.min'=>'Yêu cầu số điện thoại có độ dài ít nhất là 9 số',
                'sodienthoai.max'=>'Độ dài tối đa của số điện thoại là 20 số',
                'sodienthoai.unique'=>'Số điện thoại này đã tồn tại'
            ]);  
        $khach = Khach::find($id);
        $khach->hoten=$request->hoten;
        $khach->diachi=$request->diachi;
        $khach->diachitt=$request->diachitt;
        $khach->cmnd=$request->cmnd;
        $khach->ngaysinh=$request->ngaysinh;
        $khach->sodienthoai=$request->sodienthoai;
        $khach->gioitinh=$request->gioitinh;
        $khach->email=$request->email;
        $khach->loaikh=$request->loaikh;
        $khach->mota=$request->mota;
        $khach->trangthai=$request->trangthai;
        $khach->id=$request->idadmin;
        $khach->save();

        return redirect('admin/khach/sua/'.$id)->with('thongbao','Sửa khách hàng thành công');
    }

    public function getXoa($id)
    {
        $khach = Khach::find($id);
        $bds = BDS::where('khid',$id);
        if(count($khach->bds)>0){
            $dem=count($khach->bds);
            return redirect('admin/khach/danhsach/')->with('thongbao','Khách này đang có  '.$dem.' bds, không thể xóa!');
        }
        $bds->delete();

        $khach->delete();
        return redirect('admin/khach/danhsach')->with('thongbao','Xóa user thành công');
    }
    
    public function getInfo($id){
        $khach = Khach::find($id);
        $user = User::find($id);
        return view('admin.khach.info',['user'=>$user],['khach'=>$khach]);
    }
}
