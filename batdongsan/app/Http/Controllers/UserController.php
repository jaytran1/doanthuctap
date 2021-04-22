<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getDanhSach(){
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }
    
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
            $user= Auth::user();
            return redirect('admin');
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

    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(Request $request){  
        $this->validate($request,
            [
                'name'=>'required|min:3',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:3|max:32',
                'passwordLan2'=>'required|same:password',
                'sdt'=>'required|min:9|max:20'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'name.min'=>'Yêu cầu tên người dùng có độ dài ít nhất là 3 ký tự',
                'email.required'=>'Bạn chưa nhập email',
                'sdt.required'=>'Bạn chưa nhập sdt',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email này đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Yêu cầu mật khẩu có độ dài ít nhất là 3 ký tự',
                'password.max'=>'Độ dài tối đa của mật khẩu là 32 ký tự',
                'passwordLan2.required'=>'Không khớp với mật khẩu đã nhập',
                'sdt.min'=>'Yêu cầu số điện thoại có độ dài ít nhất là 9 số',
                'sdt.max'=>'Độ dài tối đa của số điện thoại là 20 số'
            ]);  
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->sdt=$request->sdt;
        $user->save();

        return redirect('admin/user/them')->with('thongbao','Thêm user thành công');
    }

    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required|min:3'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên',
                'name.min'=>'Yêu cầu tên người dùng có độ dài ít nhất là 3 ký tự'
            ]);  
        $user = User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->sdt=$request->sdt;

        if(isset($request->changePassword)){
            $this->validate($request,
            [
                'password'=>'required|min:3|max:32',
                'passwordLan2'=>'required|same:password'
            ],
            [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Yêu cầu mật khẩu có độ dài ít nhất là 3 ký tự',
                'password.max'=>'Độ dài tối đa của mật khẩu là 32 ký tự',
                'passwordLan2.required'=>'Không khớp với mật khẩu đã nhập'
            ]);  

            $user->password=bcrypt($request->password);
        }
        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao','Sửa user thành công');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        //$khachhang = Khachhang::where('idUser',$id);
        //$khachhang->delete();
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','Xóa user thành công');
    }

    
}
