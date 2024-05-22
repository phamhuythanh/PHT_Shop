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
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Redirect;
session_start();
use Cart;
use PDF;
use Auth;


class OrderController extends Controller
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

    public function manage_order(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_customers','tbl_customers.customer_id','=','tbl_order.customer_id')
		->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
		->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
		->orderby('order_id','desc')
		->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_payment.*')
        ->paginate(10);
        $manager_order= view('admin.manage_order')->with('all_order', $all_order);
        return view('layout_admin')->with('admin.manage_order', $manager_order);
    }
    public function view_order(Request $request, $orderId){
        $this->AuthLogin();
		$order_details = OrderDetails::with('product')->where('order_id',$orderId)->get();
		$order = Order::where('order_id',$orderId)->get();
		foreach($order as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$payment_id = $ord->payment_id;
			$order_status = $ord->order_status;
		}
		$customer = Customers::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();
		$payment = DB::table('tbl_payment')->where('payment_id',$payment_id)->first();
		return view('admin.view_order')->with(compact('order_details','customer','shipping','order','order_status','payment'));

    }

    public function print_order($checkout_code){
        $pdf= \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }
    public function print_order_convert($checkout_code){
        $order_details = DB::table('tbl_order_details')->where('order_id',$checkout_code)->get();
        $order = DB::table('tbl_order')->where('order_id',$checkout_code)->get();
        foreach($order as $key =>$ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
			$payment_id = $ord->payment_id;
        }
        $customer = Customers::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
		$payment = DB::table('tbl_payment')->where('payment_id',$payment_id)->first();
        $fee=Session::get('fee');
        $order_details_product = OrderDetails::with('product')->where('order_id',$checkout_code)->get();

        $output='';
        $output.='<style>
		body{
			font-family: DejaVu Sans;

		}
		.invoice {
			color: #333;
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 20px;
			margin: 0 auto;
			max-width: 800px;
		  }

		  .header {
			display: flex;
			justify-content: space-between;
			align-items: center;
		  }

		  .header img {
			max-height: 80px;
		  }

		  .header h1 {
			font-size: 24px;
			margin: 0;
		  }
		  .customer-info{
			border-bottom: 1px dashed black;
		  }
		  .customer-info h2,
		  .product-info h2 {
			font-size: 20px;
			margin-bottom: 10px;
		  }

		  .product-info table {
			width: 100%;
			border-collapse: collapse;
		  }

		  .product-info th,
		  .product-info td {
			padding: 10px;
			border: 1px solid #ccc;
		  }

		  .product-info th {
			text-align: left;
		  }

		  .total-info {
			margin-top: 10px;
		  }

		  .total-info p {
			font-size: 18px;
			margin-bottom: 10px;
		  }

		  .total-info p:last-of-type {
			margin-bottom: 0;
		  }
		</style>
		<h3><center>Cửa hàng PHT</center></h3>
		<center>Facebook: <a href="https://www.facebook.com/profile.php?id=100090235664602">https://www.facebook.com/profile.php?id=100090235664602</a></center>
		<center>Điện thoại: 0354835836</center>

		<h1><center>Hóa đơn bán hàng</center></h1>
		<div class="invoice">
			<div class="customer-info">
				<h2>Thông tin người nhận</h2>
				<p>Họ tên: '.$shipping->shipping_name.'</p>
				<p>Địa chỉ: '.$shipping->shipping_address.'</p>
				<p>Số điện thoại: 0'.$shipping->shipping_phone.'</p>
				<p>Ghi chú: '.$shipping->shipping_notes.'</p>
				<p>Thời gian mua hàng: '.$shipping->created_at.'</p>
			</div>
			<div class="product-info">
				<h2>Thông tin sản phẩm</h2>
				<table>
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Đơn giá</th>
							<th>Size</th>
							<th>Số lượng</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>';
			$subtotal = 0;
			$total = 0;

			foreach($order_details_product as $key => $product){
				$total= $product->product_price*$product->product_sales_quantity;
				$subtotal += $total;
					$output.='
						<tr>
							<td>'.$product->product_name.'</td>
							<td>'.number_format($product->product_price,0,',','.').'đ'.'</td>
							<td>'.$product->product_size.'</td>
							<td>'.$product->product_sales_quantity.'</td>
							<td>'.number_format($total,0,',','.').'đ'.'</td>
						</tr>
							';
					}
			if($payment->payment_method == 1){
				$output.='
						<tr>
							<td colspan="5">Phí ship: '.number_format($product->order_fee,0,',','.').'đ'.'</td>
						</tr>
						<tr>
							<td colspan="5">Tổng tiền: '.number_format($subtotal+$product->order_fee,0,',','.').'đ'.'</td>
						</tr>
					</tbody>
			</table>';
			}else{
				$output.='
						<tr>
							<td colspan="5">Đã thanh toán</td>
						</tr
					</tbody>
			</table>';
			}
		$output.='
			<table style="margin-bottom:50px;">
				<thead>
					<tr>
						<th style="border:0px; padding-left:45px">Ký tên</th>
						<th style="border:0px; padding-left:20px">Ký tên</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="border:0px">Người lập phiếu</td>
						<td style="border:0px">Người nhận</td>
					</tr>
				</tbody>
			</table>
			</div>
			</div>';

        return $output;
    }

	public function update_order_qty(Request $request){
		//update order
		$data = $request->all();
		$order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();
		if($order->order_status==2){
			foreach($data['order_product_id'] as $key => $product_id){
				$product = Product::find($product_id);
				$product_sold = $product->product_sold;

				$product_size = OrderDetails::find($data['order_detail_id']);

				foreach($product_size as $key5 => $size){
					$o_size = $size->product_size;

					if($key==$key5){
						switch ($o_size) {
							case 'M':
								$product_quantity = $product->M;
								foreach($data['quantity'] as $key2 => $qty){
									if($key==$key2){
										$pro_remain = $product_quantity - $qty;
										$product->M = $pro_remain;
										$product->product_sold = $product_sold + $qty;
										$product->save();
									}
								}
								break;
							case 'S':
								$product_quantity = $product->S;
								foreach($data['quantity'] as $key2 => $qty){
									if($key==$key2){
										$pro_remain = $product_quantity - $qty;
										$product->S = $pro_remain;
										$product->product_sold = $product_sold + $qty;
										$product->save();
									}
								}
							 	break;
							default:
								$product_quantity = $product->XL;
								foreach($data['quantity'] as $key2 => $qty){
									if($key==$key2){
										$pro_remain = $product_quantity - $qty;
										$product->XL = $pro_remain;
										$product->product_sold = $product_sold + $qty;
										$product->save();
									}
								}
						}
					}
				}
			}
		}
		elseif($order->order_status == 1){
			foreach($data['order_product_id'] as $key => $product_id){
				$product = Product::find($product_id);
				$product_sold = $product->product_sold;

				$product_size = OrderDetails::find($data['order_detail_id']);

				foreach($product_size as $key5 => $size){
					$o_size = $size->product_size;

					if($key==$key5){
						switch ($o_size) {
							case 'M':
								$product_quantity = $product->M;
								foreach($data['quantity'] as $key2 => $qty){
									if($key==$key2){
										$pro_remain = $product_quantity + $qty;
										$product->M = $pro_remain;
										$product->product_sold = $product_sold - $qty;
										$product->save();
									}
								}
								break;
							case 'S':
								$product_quantity = $product->S;
								foreach($data['quantity'] as $key2 => $qty){
									if($key==$key2){
										$pro_remain = $product_quantity + $qty;
										$product->S = $pro_remain;
										$product->product_sold = $product_sold - $qty;
										$product->save();
									}
								}
							 	break;
							default:
								$product_quantity = $product->XL;
								foreach($data['quantity'] as $key2 => $qty){
									if($key==$key2){
										$pro_remain = $product_quantity + $qty;
										$product->XL = $pro_remain;
										$product->product_sold = $product_sold - $qty;
										$product->save();
									}
								}
						}
					}
				}
			}
		}
	}
}
