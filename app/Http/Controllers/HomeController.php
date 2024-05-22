<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Customers;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Mail;
use Cart;
session_start();

class HomeController extends Controller
{
    public function index(Request $request){
        // SEO
        $meta_desc="Chuyên bán quần áo nam nữ";
        $meta_keywords="Quần áo nam nữ";
        $meta_title = "Quần áo dành cho nam nữ";
        $url_canonical = $request->url();
        //end SEO

        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(4)->get();

        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();


        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        $all_product_new = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('category_status','0')
        ->where('product_status','0')->orderby('tbl_product.product_id','desc')->take(8)->get();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('category_status','0')
        ->where('product_status','0')->orderby('tbl_product.product_sold','desc')->take(8)->get();

        return view('pages.home')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)
        ->with('all_product_new',$all_product_new)->with('all_product',$all_product)->with('slider',$slider)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('all_customer', $all_customer);
    }

    public function search(Request $request){
        $keywords = $request ->keywords_submit;
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();


        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        $search_product = Product::where('product_name','like','%'.$keywords.'%')->where('product_status','0')->get();
        $search_count= $search_product->count();

        if($search_count>0){
        return view('pages.product.search')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('search_product',$search_product)
        ->with('all_customer', $all_customer);
        }else{
            return view('pages.cart.not_product')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('search_product',$search_product)
            ->with('all_customer', $all_customer);
        }

    }

    public function send_mail(){
        $to_name= "Thanh Pham";
        $to_email= "Thanh01a7@gmail.com";

        $data = array("name"=>"Cửa hàng PHT", "body"=>'Lấy lại mật khẩu');

        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Quên mật khẩu');
            $message->to($to_email,$to_name);
        });
        // return Redirect('/')->with('message','');
    }

    public function size_notificate(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.size_notificate')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer)->with('customer_id', $customer_id);
    }

    public function contact(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.contact')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer)->with('customer_id', $customer_id);
    }
    public function about_us(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.about_us')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer)->with('customer_id', $customer_id);
    }
    public function question(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.question')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer)->with('customer_id', $customer_id);
    }
    public function shopping_guide(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.shopping_guide')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer)->with('customer_id', $customer_id);
    }
    public function privacy_policy(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.privacy_policy')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer)->with('customer_id', $customer_id);
    }
    public function production_partner(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.production_partner')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer)->with('customer_id', $customer_id);
    }

    public function test(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        return view('pages.about.test')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer);
    }

}
