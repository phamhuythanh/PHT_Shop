<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use File;
use Illuminate\Support\Facades\Redirect;
session_start();
use Auth;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city = City::orderby('matp','ASC')->get();
		$feeship = Feeship::join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','=','tbl_feeship.fee_matp')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','=','tbl_feeship.fee_maqh')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.xaid','=','tbl_feeship.fee_xaid')
        ->orderby('fee_id','DESC')->get();
        return view('admin.delivery.add_delivery')->with(compact('city'))->with('feeship', $feeship);
    }

    public function select_delivery(Request $request){
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

    // public function select_feeship(){
	// 	$feeship = Feeship::join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','=','tbl_feeship.fee_matp')
    //     ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','=','tbl_feeship.fee_maqh')
    //     ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.xaid','=','tbl_feeship.fee_xaid')
    //     ->orderby('fee_id','DESC')->get();
	// 	return Redirect::to('add-delivery');
    // }
        
    public function insert_delivery(Request $request){
		$data = $request->all();
		$fee_ship = new Feeship();
		$fee_ship->fee_matp = $data['city'];
		$fee_ship->fee_maqh = $data['province'];
		$fee_ship->fee_xaid = $data['wards'];
		$fee_ship->fee_feeship = $data['fee_ship'];
		$fee_ship->save();
	}
    public function update_delivery(Request $request){
		$data = $request->all();
		$fee_ship = Feeship::find($data['feeship_id']);
		$fee_value = rtrim($data['fee_value'],'.');
		$fee_ship->fee_feeship = $fee_value;
		$fee_ship->save();
	}

	public function delete_delivery($fee_id){
        Feeship::where('fee_id',$fee_id)->delete();
        Session::put('message','Xóa tiền ship thành công!');
        return Redirect()->back();
    }
}
