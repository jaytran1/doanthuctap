<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Khach;

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
                'cmnd'=>'required|min:9|max:9',
                'sodienthoai'=>'required|min:9|max:20',
                'ngaysinh'=>'required',
                'email'=>'required|email|unique:users,email'
            ],
            [
                'hoten.required'=>'Bạn chưa nhập tên',
                'hoten.min'=>'Yêu cầu tên khách hàng có độ dài ít nhất là 2 ký tự',
                'diachi.required'=>'Bạn chưa nhập địa chỉ',
                'diachi.min'=>'Yêu cầu địa chỉ có độ dài ít nhất là 2 ký tự',
                'diachitt.required'=>'Bạn chưa nhập địa chỉ thường trú',
                'diachitt.min'=>'Yêu cầu địa chỉ thường trú có độ dài ít nhất là 2 ký tự',
                'cmnd.required'=>'Bạn chưa nhập cmnd',
                'cmnd.min'=>'Yêu cầu cmnd có độ dài là 9 số',
                'cmnd.max'=>'Yêu cầu cmnd có độ dài là 9 số',
                'ngaysinh.required'=>'Bạn chưa chọn ngày sinh',
                'sodienthoai.required'=>'Bạn chưa nhập số điện thoại',
                'sodienthoai.min'=>'Yêu cầu số điện thoại có độ dài ít nhất là 9 số',
                'sodienthoai.max'=>'Độ dài tối đa của số điện thoại là 20 số',
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
        $user = User::all();
        return view('admin.khach.sua',['user'=>$user],['khach'=>$khach]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'hoten'=>'required|min:2',
                'diachi'=>'required|min:2',
                'diachitt'=>'required|min:2',
                'sodienthoai'=>'required|min:9|max:20',
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
                'sodienthoai.max'=>'Độ dài tối đa của số điện thoại là 20 số'
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
        $khach->delete();
        return redirect('admin/khach/danhsach')->with('thongbao','Xóa user thành công');
    }


}
