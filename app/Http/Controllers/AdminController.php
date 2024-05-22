<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use App\Models\Social; //sử dụng model Social
use Socialite; //sử dụng Socialite
use App\Models\Login; //sử dụng model Login
use App\Models\Order;
use App\Models\Customers;
use App\Models\Product;
use Auth;
session_start();

class AdminController extends Controller
{
    //login fackbook
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }




    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }

    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.home.dashboard');
    }
    public function sell_product(){
        $this->AuthLogin();
        $product = Product::where('product_sold','>',0)->orderBy('product_sold','DESC')->take(5)->get();
        return view('admin.home.sell_product')->with('product', $product);
    }
    public function product_inventory(){
        $this->AuthLogin();
        $product = Product::where('M','>',0)->orWhere('S','>',0)->orWhere('XL','>',0)->paginate(10);
        return view('admin.home.product_inventory')->with('product', $product);
    }
    public function statistical(){
        $this->AuthLogin();
        $product = Product::join('tbl_import_product','tbl_product.product_id','=','tbl_import_product.product_id')
        ->where('product_sold','>',0)->orderBy('product_sold','DESC')->paginate(10);
        return view('admin.home.statistical')->with('product', $product);
    }
    public function filter_by_date(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $startDate = $request->datepicker3;
        $endDate = $request->datepicker4;
    
        $data = DB::table('tbl_order')->where('order_status','!=','1')->where('order_status','!=','5')
                    ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(order_total) as total'))
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->groupBy('date')
                    ->orderBy('date')
                    ->get()
                    ->toArray();
    
        return view('admin.home.revenue',compact('data','startDate','endDate'));
    }
}
