<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Product;
use App\Models\Gallery;
use App\Models\Customers;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();
use Auth;

class NewsController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_news(){
        $this->AuthLogin();
        return view('admin.news.add_news');
    }
    public function save_news(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $data=array();
        $data['news_name']=$request->news_name;
        $data['news_content']=$request->news_content;
        $data['news_status']=$request->news_status;
        $data['created_at']=now();

        $get_image =$request-> file('news_image');
        if($get_image){
            //lấy đuôi ảnh
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move('public/Upload/news',$new_image);
            $data['news_image'] = $new_image;
            DB::table('tbl_news')->insert($data);
            Session::put('message','Thêm bài viết thành công');
    
            return Redirect::to('all-news');
        }
        $data['news_image'] = '';
        DB::table('tbl_news')->insert($data);
        Session::put('message','Thêm bài viết thành công');

        return Redirect::to('all-news');
    }
    public function all_news(){
        $this->AuthLogin();
        $all_news = DB::table('tbl_news')->orderBy('news_id','DESC')->get();  
        return view('admin.news.all_news')->with('all_news', $all_news);
    }
    public function edit_news($news_id){
        $this->AuthLogin();
        $edit_news = DB::table('tbl_news')->where('news_id',$news_id)->get(); 
        return view('admin.news.edit_news')->with('edit_news', $edit_news);
    }
    public function update_news($news_id, Request $request){
        $this->AuthLogin();
        $data= array();
        $data['news_name'] = $request->news_name;
        $data['news_content'] = $request->news_content;

        $get_image =$request-> file('news_image');
        
        if($get_image){
            //lấy đuôi ảnh
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move('public/Upload/news',$new_image);
            $data['news_image'] = $new_image;
            DB::table('tbl_news')->where('news_id',$news_id)->update($data);
            Session::put('message','Cập nhật bài viết thành công');
    
            return Redirect::to('all-news');
        }
        DB::table('tbl_news')->where('news_id',$news_id)->update($data);
        Session::put('message','Cập nhật bài viết thành công');

        return Redirect::to('all-news');
    }
    public function unactive_news($news_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('news_id',$news_id)->update(['news_status'=> 0]);

        Session::put('message','Hủy kích hoạt tin tức thành công!');
        return Redirect()->back();
    }
    public function active_news($news_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('news_id',$news_id)->update(['news_status'=> 1]);

        Session::put('message','Kích hoạt tin tức thành công!');
        return Redirect()->back();
    }
    public function delete_news($news_id){
        $this->AuthLogin();
        DB::table('tbl_news')->where('news_id',$news_id)->delete();
        Session::put('message','Xóa bài viết thành công!');
        return Redirect()->back();
    }
   
    public function home_news(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        $all_news = DB::table('tbl_news')->where('news_status','1')->get();
        return view('pages.news.home_news')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)
        ->with('all_customer', $all_customer)->with('all_news', $all_news);
    }
    public function news_detail($news_id){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        $all_news = DB::table('tbl_news')->where('news_id',$news_id)->get();

        $time = DB::table('tbl_news')->select(
            DB::raw('DATE_FORMAT(created_at, "%d.%m.%Y") as date')
        )
        ->where('news_id',$news_id)->groupBy('date')
        ->get();

        $related_news = DB::table('tbl_news')->orderby('news_id','desc')
        ->where('news_status','1')->whereNotIn('tbl_news.news_id',[$news_id])->limit(5)->get();

        return view('pages.news.news_detail')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)
        ->with('all_customer', $all_customer)->with('all_news', $all_news)->with('related_news', $related_news)->with('time', $time);
    }
}
