<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'order_id', 'product_id', 'product_name','product_image','product_price','product_sales_quantity','product_size'
    ];
    protected $primaryKey = 'order_detail_id';
 	protected $table = 'tbl_order_details';

 	public function product(){
 		return $this->belongsTo('App\Models\Product','product_id');
 	}
	
}
