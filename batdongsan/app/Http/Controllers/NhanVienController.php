<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhanVien;
use App\User;
use Auth;

class NhanVienController extends Controller
{
    public function getDangnhapAdmin(){
        return view('admin.login');
    }

    public function postDangnhapAdmin(Request $request){
        $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3|max:32'
            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Yêu cầu mật khẩu có độ dài ít nhất là 3 ký tự',
                'password.max'=>'Độ dài tối đa của mật khẩu là 32 ký tự'
            ]); 
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return view('admin.nhanvien.danhsach')->with('thongbao','Đăng nhập ok !');
        }
        else{
            return redirect('admin/login')->with('thongbao','Đăng nhập thất bại !');
        }
    }

    public function getDangxuatAdmin(){
        Auth::logout();
        //return back();
        return redirect('admin/login');
        //return redirect('admin/');
    }

    
}
