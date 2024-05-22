<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
session_start();
use Auth;
use Hash;
use Mail;

class CustomerController extends Controller
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
    public function CustomerLogin(){
        $customer_id = Session::get('customer_id');
        if($customer_id){
            return Redirect::to('page.customer.update_customer');
        }
        else{
            return Redirect::to('/')->send();
        }
    }

    public function login_checkout(){

        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        return view('pages.checkout.login_checkout')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2);
    }

    public function add_customer(Request $request){
        $customers = Customers::where('customer_email', '=', $request->customer_email)->get();
        $count_customer = $customers->count();
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_password' => 'required|min:6|numeric'
        ],[
            'customer_name.required' => 'Tên người dùng không được để trống',
            'customer_email.required' => 'Email dùng không được để trống',
            'customer_phone.required' => 'Số điện thoại người dùng không được để trống',
            'customer_password.required' => 'Mật khẩu không được để trống',
            'customer_password.min:6' => 'Độ dài nhỏ nhất là 6 kí tự',
            'customer_password.numeric' => 'Mật khẩu phải là dạng số',
        ]);
        if($count_customer != 0) {
            return redirect()->back()->with('error', 'Email đã được đăng ký');
        }else{
            $data=array();
            $data['customer_name']=$request->customer_name;
            $data['customer_email']=$request->customer_email;
            $data['customer_image']='img-default.jpg';
            $data['customer_phone']=$request->customer_phone;
            $data['customer_password']=md5($request->customer_password);

            $customer_id=Customers::insertGetId($data);

            Session::put('customer_id',$customer_id);
            Session::put('customer_name',$request->customer_name);
            Session::put('customer_phone',$request->customer_phone);
            return Redirect('/');
        }
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }

    public function login_customer(Request $request){
        $email= $request->email_account;
        $password= md5($request->password_account);
        $result = Customers::where('customer_email',$email)->where('customer_password',$password)->first();
        //$result_count=$result->count();

        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            Session::put('customer_phone',$result->customer_phone);
            return Redirect::to('/');
        }else if($request->email_account == '' || $request->password_account == ''){
            return Redirect::to('/login-checkout')->with('message','Tên đăng nhập hoặc mật khẩu không được để trống!');
        }else{
            return Redirect::to('/login-checkout')->with('message','Sai mật khẩu hoặc tài khoản!');
        }

    }

    public function forget_password(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        return view('pages.customer.forget_password')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2);
    }
    public function recover_pass(Request $request){
        $data = $request->all();

        $title_mail = "Lấy lại mật khẩu PHT";
        $customers = Customers::where('customer_email', '=', $data['email_account'])->get();
        foreach($customers as $key => $value){
            $customer_id= $value->customer_id;
        }
        if($customers){
            $count_customer = $customers->count();
            if($count_customer == 0) {
                return redirect()->back()->with('error', 'Email chưa được đăng ký để khôi phục mật khẩu');
            }else{
                $token_random = Str::random();
                $data1=array();
                $data1['customer_token']=$token_random;
                $customers->customer_token = $token_random;
                Customers::where('customer_id',$customer_id)->update($data1);
                //send mail

                $to_email = $data['email_account']; //send to this email
                $link_reset_pass = url('/update-new-password?email='.$to_email.'&token='.$token_random);
                $data = array("name"=>$title_mail, "body"=>$link_reset_pass, 'email' => $data['email_account']); //body of mail.blade.php

                Mail::send('pages.customer.forget_pass_notify', ['data'=>$data], function($message) use ($title_mail,$data)
                {
                    $message->to($data['email'])->subject($title_mail);//send this mail with subject
                    $message->from($data['email'],$title_mail);//send from this mail
                });
                //--send mail
                return redirect()->back() ->with('message', 'Vui lòng truy cập email để reset password');
            }
        }
    }

    public function update_new_password(){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();
        return view('pages.customer.update_new_password')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer);
    }

    public function reset_new_password(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customers = Customers::where('customer_email', '=', $data['email'])->where('customer_token', '=', $data['token'])->get();
        $count_customer = $customers->count();
        if($count_customer>0){
            foreach($customers as $key => $value){
                $customer_id= $value->customer_id;
            }
            $request->validate([
                'new_password' => 'required|min:6|integer'
            ]);
            $data1= array();
            $data1['customer_password'] = md5($request->new_password);
            $data1['customer_token'] = $token_random;
            Customers::where('customer_id',$customer_id)->update($data1);
            return Redirect::to('/login-checkout')->with('message','Cập nhật mật khẩu thành công!');
        }else{
            return Redirect::to('/forget-password')->with('message','Vui lòng nhập lại email vì link đã quá hạn!');
        }
    }
    public function view_customer(){
        $this->AuthLogin();

        $all_customers = Customers::paginate(10);
        return view('admin.customer.view_customer')->with('all_customers', $all_customers);

    }
    public function delete_customer($customer_id){
        $this->AuthLogin();

        Customers::where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa khách hàng thành công!');
        return Redirect::to('view-customer');
    }
    public function view_customer_order($customer_id){
        $this->AuthLogin();

        $all_order = Order::join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->where('tbl_order.customer_id',$customer_id)->get();
        return view('admin.customer.view_customer_order')->with('all_order', $all_order);

    }

    public function edit_customer($customer_id){
        $this->CustomerLogin();
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $all_customer = Customers::where('customer_id',$customer_id)->select('tbl_customers.*')->get();

        return view('pages.customer.update_customer')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer);
    }

    public function update_customer(Request $request,$customer_id){
        $data= array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;

        $get_image =$request-> file('customer_image');
        if($get_image){
            //lấy đuôi ảnh
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();

            $get_image->move('public/Upload/customer',$new_image);
            $data['customer_image'] = $new_image;

            Customers::where('customer_id',$customer_id)->update($data);
            return Redirect()->back();
        }
        Customers::where('customer_id',$customer_id)->update($data);
        Session::put('message','Cập nhật thông tin thành công!');
        return Redirect()->back();
    }
    public function view_customer_password($customer_id){
        $this->CustomerLogin();
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $all_customer = Customers::where('customer_id',$customer_id)->select('tbl_customers.*')->get();

        return view('pages.customer.customer_password')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer);
    }
    public function update_customer_password(Request $request,$customer_id){
        $all_customer = Customers::where('customer_id',$customer_id)->select('tbl_customers.*')->limit(1)->get();
        $request->validate([
            'new_password' => 'required|confirmed|min:6',
            'new_password_confirmation' => 'required|min:6'
        ]);

        $data= array();
        $data['customer_password'] = md5($request->new_password);
        Customers::where('customer_id',$customer_id)->update($data);
        return back()->with("status", "Đổi mật khẩu thành công!");
    }

    public function order_customer($customer_id){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();


        $all_customer = Customers::where('customer_id',$customer_id)->select('tbl_customers.*')->get();

        $order0 = Order::join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('customer_id',$customer_id)
        ->get();

        $order1 = Order::join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('customer_id',$customer_id)->where('order_status','1')
        ->get();

        $order2 = Order::join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('customer_id',$customer_id)->where('order_status','2')
        ->get();

        $order3 = DB::table('tbl_order')->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('customer_id',$customer_id)->where('order_status','3')
        ->get();

        $order4 = Order::join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('customer_id',$customer_id)->where('order_status','4')
        ->get();

        $order5 = DB::table('tbl_order')->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->where('customer_id',$customer_id)->where('order_status','5')
        ->get();

        $dem=count($order0);
        $dem1=count($order1);
        $dem2=count($order2);
        $dem3=count($order3);
        $dem4=count($order4);
        $dem5=count($order5);

        return view('pages.customer.order_customer')->with(compact('cate_product1','cate_product2','all_customer','order0',
        'order1','order2','order3','order4','order5',
        'dem','dem1','dem2','dem3','dem4','dem5'));
    }
}
