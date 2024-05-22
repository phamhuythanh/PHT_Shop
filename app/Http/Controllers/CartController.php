<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Product;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
session_start();

class CartController extends Controller
{
	public function select_delivery_home(Request $request){
        $data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="city"){
    			$select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    				$output.='<option>---Chọn quận huyện---</option>';
    			foreach($select_province as $key => $province){
    				$output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
    			}
				
    		}else{

    			$select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			$output.='<option>---Chọn xã phường---</option>';
    			foreach($select_wards as $key => $ward){
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
    			}
    		}
    		echo $output;
    	}
		
    }

    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            $city = City::where('matp',$data['matp'])->get();
			$province = Province::where('maqh',$data['maqh'])->get();
			$wards = Wards::where('xaid',$data['xaid'])->get();

			foreach($city as $key => $ti){
				Session::put('tinh',$ti->name_city);
			}
			foreach($province as $key => $hu){
				Session::put('huyen',$hu->name_quanhuyen);
			}
			foreach($wards as $key => $xa){
				Session::put('xa',$xa->name_xaphuong);
			}
			
			if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key => $fee){
						Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }
                }else{ 
                    Session::put('fee',25000);
                    Session::save();
                }
            }
           
        }
    }


	public function add_cart_ajax(Request $request){
		$data = $request->all();
		$session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id'] && $val['product_size']==$data['cart_product_size']){
                    $is_avaiable++;
					$cart[$key] = array(
						'session_id' => $val['session_id'],
						'product_name' => $val['product_name'],
						'product_id' => $val['product_id'],
						'product_image' => $val['product_image'],
						'product_qty' => $val['product_qty']+$data['cart_product_qty'] ,

						'product_qty_m' => $val['product_qty_m'],
						'product_qty_s' => $val['product_qty_s'],
						'product_qty_xl' => $val['product_qty_xl'],

						'product_price' => $val['product_price'],
						'product_size' => $val['product_size'],
						);
						Session::put('cart',$cart);
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
					'session_id' => $session_id,
					'product_name' => $data['cart_product_name'],
					'product_id' => $data['cart_product_id'],
					'product_image' => $data['cart_product_image'],
					'product_qty' => $data['cart_product_qty'],

					'product_qty_m' => $data['cart_product_m'],
					'product_qty_s' => $data['cart_product_s'],
					'product_qty_xl' => $data['cart_product_xl'],

					'product_price' => $data['cart_product_price'],
					'product_size' => $data['cart_product_size'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],

				'product_qty_m' => $data['cart_product_m'],
				'product_qty_s' => $data['cart_product_s'],
				'product_qty_xl' => $data['cart_product_xl'],

                'product_price' => $data['cart_product_price'],
				'product_size' => $data['cart_product_size'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
	}
	public function gio_hang_ajax(Request $request){
		$cate_product1= Category::where('category_status','0')->where('category_rank','1')->orderby('category_id','desc')->get();
        $cate_product2= Category::where('category_status','0')->where('category_rank','2')->orderby('category_id','desc')->get();
        
		$customer_id= Session::get('customer_id');
        $all_customer = Customers::where('customer_id',$customer_id)->get();
		$city = City::orderby('matp','ASC')->get();
		$cart = Session::get('cart');

		if($cart==true){
			return view('pages.cart.cart_ajax')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with(compact('city'))->with('all_customer', $all_customer);
		}
		else{
			return view('pages.cart.not_product')->with('cate_product1',$cate_product1)->with('cate_product2',$cate_product2)->with(compact('city'))->with('all_customer', $all_customer);
		}
	}
	public function delete_product($session_id){
        $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('message','Xóa sản phẩm thất bại');
        }

    }
	public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Cập nhật số lượng thành công');
        }else{
            return redirect()->back()->with('message','Cập nhật số lượng thất bại');
        }
    }
}
