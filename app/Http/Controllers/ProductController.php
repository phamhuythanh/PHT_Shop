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

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('admin.home.dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product= Category::orderby('category_id','desc')->get();

        return view('admin.product.add_product')->with('cate_product',$cate_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = Product::join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->paginate(10);
        return view('admin.product.all_product')->with('all_product', $all_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_import_price'] = $request->product_import_price;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['M']=$request->M;
        $data['S']=$request->S;
        $data['XL']=$request->XL;
        $data['product_sold']='0';

        $path = 'public/Upload/product/';
        $path_gallery = 'public/Upload/gallery/';

        $get_image =$request-> file('product_image');
        if($get_image){
            //lấy đuôi ảnh
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            File::copy($path.$new_image,$path_gallery.$new_image);
            $data['product_image'] = $new_image;
        }

        $get_image2 =$request-> file('product_image2');
        if($get_image2){
            //lấy đuôi ảnh
            $get_name_image2 = $get_image2->getClientOriginalName();
            $name_image2 = current(explode('.',$get_name_image2));
            $new_image2 = $name_image2.rand(0,99).'.'.$get_image2->getClientOriginalExtension();
            $get_image2->move($path,$new_image2);
            File::copy($path.$new_image2,$path_gallery.$new_image2);
            $data['product_image2'] = $new_image2;
        }

        $pro_id = Product::insertGetId($data);
        $gallery = new Gallery(); 
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $new_image;
        $gallery->product_id = $pro_id;
        
        $gallery->gallery_image = $new_image2;
        $gallery->gallery_name = $new_image2;
        $gallery->product_id = $pro_id;
        $gallery->save();


        //insert tbl_import_product
        $data1=array();
        $data1['product_id']=$pro_id;
        $data1['product_import_qty']=$request->M + $request->S + $request->XL;

        DB::table('tbl_import_product')->insertGetId($data1);

        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        Product::where('product_id',$product_id)->update(['product_status'=> 1]);

        Session::put('message','Hủy kích hoạt sản phẩm thành công!');
        return Redirect()->back();
    }
    public function active_product($product_id){
        $this->AuthLogin();
        Product::where('product_id',$product_id)->update(['product_status'=> 0]);

        Session::put('message','Kích hoạt sản phẩm thành công!');
        return Redirect()->back();
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product= Category::orderby('category_id','desc')->get();

        $edit_product = Product::where('product_id',$product_id)->get(); 
        return view('admin.product.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data= array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_import_price'] = $request->product_import_price;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['product_status'] = $request->product_status;
        $data['M']=$request->M;
        $data['S']=$request->S;
        $data['XL']=$request->XL;

        $get_image =$request-> file('product_image');
        
        if($get_image){
            //lấy đuôi ảnh
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            Product::where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
    
            return Redirect::to('all-product');
        }

        $get_image2 =$request-> file('product_image2');
        
        if($get_image2){
            //lấy đuôi ảnh
            $get_name_image2 = $get_image2->getClientOriginalName();
            $name_image2 = current(explode('.',$get_name_image2));
            $new_image2 = $name_image2.rand(0,99).'.'.$get_image2->getClientOriginalExtension();
            
            $get_image2->move('public/upload/product',$new_image2);
            $data['product_image2'] = $new_image2;
            Product::where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
    
            return Redirect::to('all-product');
        }
        Product::where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');

        //update tbl_import_product
        $import = DB::table('tbl_import_product')->where('product_id',$product_id)->get();
        foreach($import as $key2 => $imp){
            $qty = $imp->product_import_qty;
            $id = $imp->import_product_id;
        }

        $data1=array();
        $data1['product_id']=$product_id;
        $data1['product_import_qty']=($request->M + $request->S + $request->XL) - ($request->qty_m + $request->qty_s + $request->qty_xl) + $qty;
        DB::table('tbl_import_product')->where('import_product_id',$id)->update($data1);

        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        Product::where('product_id',$product_id)->delete();
        DB::table('tbl_import_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công!');
        return Redirect()->back();
    }
    public function search_product(Request $request){
        $this->AuthLogin();
        $keywords = $request ->keywords_submit;
        $search_product = Product::join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('product_name','like','%'.$keywords.'%')->paginate(10);
        $search_count= $search_product->count();
        if($search_count>0){
            return view('admin.product.search_product')->with('search_product', $search_product);
        }else{
            $output='';
            $output.='<h3><center>Không có sản phẩm phù hợp</center></h3>';
            echo $output;
            return view('admin.product.search_product')->with('search_product', $search_product);
        }
    }

        // end function admin page

    public function detail_product($product_id , Request $request){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();
        
        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();

        $detail_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($detail_product as $key =>$value){
            $category_id = $value->category_id;
            $product_id = $value->product_id;
        }
        $gallery= Gallery::where('product_id',$product_id)->get();
        $url_canonical = $request->url();
        
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)->where('product_status','0')->whereNotIn('tbl_product.product_id',[$product_id])->limit(5)->get();

        $category_name= Category::where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        $product_name= Product::where('tbl_product.product_id',$product_id)->limit(1)->get();

        return view('pages.product.show_detail')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)
        ->with('product_detail',$detail_product)
        ->with('relate', $related_product)->with('category_name',$category_name)->with('product_name',$product_name)
        ->with('gallery',$gallery)->with('url_canonical',$url_canonical)->with('all_customer', $all_customer);

    }
}
