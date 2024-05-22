<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Roles;
use App\Models\Admin;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Auth;

class AuthController extends Controller
{
    public function register_auth(){
        return view('admin.custom_auth.register');
    }
    public function register(Request $request){
        $this->validation($request);
        $data=$request->all();

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_address = $data['admin_address'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();

        return Redirect::to('/register-auth')->with('message','đăng kí thành công');
    }
    public function validation($request){
        return $this->validate($request,[
            'admin_name'=> 'required|max:255',
            'admin_email'=> 'required|email|max:255',
            'admin_address'=> 'required|max:255',
            'admin_phone'=> 'required|max:255',
            'admin_password'=> 'required|max:255',
        ]);
    }
    public function login_auth(){
        return view('admin.custom_auth.login_auth');
    }
    public function login(Request $request){
        $this->validate($request,[
            'admin_email'=> 'required|email|max:255',
            'admin_password'=> 'required|max:255',
        ]);
        if(Auth::attempt(['admin_email'=>$request->admin_email,'admin_password'=>$request->admin_password])){
            return Redirect::to('/dashboard');
        }else{
            return Redirect::to('/admin')->with('message','Tài khoản hoặc mật khẩu sai, vui lòng nhập lại!');
        }
    }
    public function logout_auth(){
        Auth::logout();
        return Redirect::to('/admin')->with('message','Đăng xuất admin thành công');
    }
}
