<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Shipping;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
session_start();
use Mail;
use Auth;

class CheckoutController extends Controller
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

    public function checkout(Request $request){
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();
        return view('pages.checkout.show_checkout')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer);
    }

    public function order_place(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        $data_s=array();
        $data_s['shipping_name']=$request->shipping_name;
        $data_s['shipping_phone']=$request->shipping_phone;
        $data_s['shipping_address']=$request->shipping_address;
        $data_s['shipping_notes']=$request->shipping_notes;
        $data_s['created_at']=now();

        $shipping_id=Shipping::insertGetId($data_s);

        Session::put('shipping_id',$shipping_id);

        //insert payment method
        $data=array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']='Đang chờ xử lý';
        $data['created_at']=now();

        $payment_id=DB::table('tbl_payment')->insertGetId($data);

        $fee=Session::get('fee');
        $total = 0;
        $total_import = 0;
        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $subtotal = $cart['product_price']*$cart['product_qty'];
                $total+=$subtotal;
            }
        }

        //insert order
        $order_data=array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=$total +$fee;
        $order_data['created_at']=now();
        $order_data['order_status']=1;

        $order_id=DB::table('tbl_order')->insertGetId($order_data);
        //insert order detail

        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails;
                $order_details->order_id = $order_id;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_size = $cart['product_size'];
                $order_details->product_image = $cart['product_image'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details['order_fee']=$fee;
                $order_details['created_at']=now();
                $order_details->save();
            }
        }

        Session::forget('cart');
        $cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();

        $customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();
        Session::forget('fee');
        return view('pages.checkout.handcash')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with('all_customer', $all_customer);
    }

    public function vnpay_payment(){
    if(Session::get('cart')==true){
        $fee=Session::get('fee');
        $total = 0;
        foreach(Session::get('cart') as $key => $cart){
            $subtotal = $cart['product_price']*$cart['product_qty'];
            $total+=$subtotal;
        }
    }

    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://PHTStore.com/website/checkout";
    $vnp_TmnCode = "UCBZ2V5W";//Mã website tại VNPAY
    $vnp_HashSecret = "CWINRJBCINWPAWOEALXHKCRYLMFGKENJ"; //Chuỗi bí mật

    $vnp_TxnRef = rand(00,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán đơn hàng';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = ($total + $fee) * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    //$vnp_ExpireDate = $_POST['txtexpire'];
    //Billing

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }
    // thẻ test
    // 9704198526191432198
    // NGUYEN VAN A
    // 07/15
    // 123456
}
