<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
use Auth;

class CategoryProduct extends Controller
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
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.category.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        
        $all_category_product = Category::orderBy('category_id','DESC')->get();  
        return view('admin.category.all_category_product')->with('all_category_product', $all_category_product);
    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = $request->all();

        $category = new Category();
        $category->category_name = $data['category_product_name'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_status = $data['category_product_status'];
        $category->category_rank = $data['category_product_rank'];
        $category->save();

        Session::put('message','Thêm danh mục thành công');

        return Redirect::to('all-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();

        Category::where('category_id',$category_product_id)->update(['category_status'=> 1]);
        Session::put('message','Hủy kích hoạt danh mục sản phẩm thành công!');
        return Redirect()->back();
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        
        Category::where('category_id',$category_product_id)->update(['category_status'=> 0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công!');
        return Redirect()->back();
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = Category::where('category_id',$category_product_id)->get();
        return view('admin.category.edit_category_product')->with('edit_category_product', $edit_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = $request->all();
        $category = Category::find($category_product_id);
        $category->category_name = $data['category_product_name'];
        $category->category_desc = $data['category_product_desc'];
        $category->category_rank = $data['category_product_rank'];
        $category->save();

        Session::put('message','Cập nhật danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();

        Category::where('category_id',$category_product_id)->delete();
        Product::where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');
    }

    // end function admin page

    public function show_category_home($category_id){

        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();
        
        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->orderby('tbl_product.product_id','desc')->where('tbl_product.category_id',$category_id)->where('product_status','0')->paginate(8)->appends(request()->query());
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if( $sort_by=='giam_dan'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->orderby('tbl_product.product_price','desc')->where('tbl_product.category_id',$category_id)->where('product_status','0')->paginate(8)->appends(request()->query());
            }
            elseif( $sort_by=='tang_dan'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->orderby('tbl_product.product_price','asc')->where('tbl_product.category_id',$category_id)->where('product_status','0')->paginate(8)->appends(request()->query());
            }
            elseif( $sort_by=='kitu_az'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->orderby('tbl_product.product_name','asc')->where('tbl_product.category_id',$category_id)->where('product_status','0')->paginate(8)->appends(request()->query());
            }
            elseif( $sort_by=='kitu_za'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->orderby('tbl_product.product_name','desc')->where('tbl_product.category_id',$category_id)->where('product_status','0')->paginate(8)->appends(request()->query());
            }
        }
        
        $category_name= Category::where('tbl_category_product.category_id',$category_id)->take(1)->get();
        return view('pages.category.show_category')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('category_by_id',$category_by_id)->with('category_name',$category_name)
        ->with('all_customer', $all_customer);
    }
    
    public function show_all_product(){

        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();
        
        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();
        
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('category_status','0')
        ->where('product_status','0')->orderByRaw("RAND()")->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if( $sort_by=='giam_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','desc')->paginate(12)->appends(request()->query());
            }
            elseif( $sort_by=='tang_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','asc')->paginate(12)->appends(request()->query());
            }
            elseif( $sort_by=='kitu_az'){
                $all_product = Product::where('product_status','0')->orderby('product_name','asc')->paginate(12)->appends(request()->query());
            }
            elseif( $sort_by=='kitu_za'){
                $all_product = Product::where('product_status','0')->orderby('product_name','desc')->paginate(12)->appends(request()->query());
            }
        }

        return view('pages.category.show_all_product')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_product',$all_product)
        ->with('all_customer', $all_customer);
    }

    public function new_product(){

        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();
        
        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();
        
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('category_status','0')->where('product_status','0')
        ->orderby('product_id','DESC')->paginate(12);

        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if( $sort_by=='giam_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','desc')->paginate(12)->appends(request()->query());
            }
            elseif( $sort_by=='tang_dan'){
                $all_product = Product::where('product_status','0')->orderby('product_price','asc')->paginate(12)->appends(request()->query());
            }
            elseif( $sort_by=='kitu_az'){
                $all_product = Product::where('product_status','0')->orderby('product_name','asc')->paginate(12)->appends(request()->query());
            }
            elseif( $sort_by=='kitu_za'){
                $all_product = Product::where('product_status','0')->orderby('product_name','desc')->paginate(12)->appends(request()->query());
            }
        }

        return view('pages.category.new_product')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_product',$all_product)
        ->with('all_customer', $all_customer);
    }
}
