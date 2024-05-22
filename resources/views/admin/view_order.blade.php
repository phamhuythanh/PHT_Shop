@extends('layout_admin')
@Section('content_admin')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Quản trị</li>
        </ol>
    </div><!--/.row-->

    <div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-body">
				<h3>Thông tin khách hàng</h3>
				<div class="table-responsive">
					<table class="table table-bordered">
					  <tbody>
					  	<tr>
					  		<td style="width: 200px">Họ và tên</td>
					  		<td>{{ $customer->customer_name }}</td>
					  	</tr>
					  	<tr>
					  		<td>Email</td>
					  		<td>{{ $customer->customer_email }}</td>
					  	</tr>
					  	<tr>
					  		<td>Số điện thoại</td>
					  		<td>{{ $customer->customer_phone }}</td>
					  	</tr>
					  </tbody>
					</table>
				</div><br>
                <h3>Thông tin giao hàng</h3>
				<div class="table-responsive">
					<table class="table table-bordered">
					  <tbody>
                        <tr>
                            <td style="width: 200px">Người nhận</td>
                            <td>{{ $shipping->shipping_name }}</td>
                        </tr>
					  	<tr>
					  		<td>Địa chỉ</td>
                            <td>{{ $shipping->shipping_address }}</td>
					  	</tr>
					  	<tr>
					  		<td>Tin nhắn</td>
                            <td>{{ $shipping->shipping_notes }}</td>
					  	</tr>
                        <tr>
                            <td>Số điện thoại</td>
                          	<td>{{ $shipping->shipping_phone }}</td>
                        </tr>
					  	<tr>
					  		<td>Ngày đặt hàng</td>
                            <td>{{ $shipping->created_at }}</td>
					  	</tr>
					  </tbody>
					</table>
				</div><br>
				<h3>Chi tiết đơn đặt hàng</h3>

				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class="info">
								<th class="text-center">STT</th>
								<th>Sản phẩm</th>
								<th>Số lượng</th>
								<th>Số lượng tồn kho</th>
                                <th>Size</th>
								<th>Tổng Giá</th>
							</tr>
						</thead>
                        <?php
                        $i=1;
						$total = 0;
                        ?>
					<tbody>
						@foreach($order_details as $key => $details)
                        <tr class="color_qty_{{$details->order_detail_id}}">
                            <td style="vertical-align: middle;text-align: center;"><strong>{{ $i++ }}</strong></td>
                            <td style="text-align: left !important">
								<img src="{{ asset('Upload/product/'.$details->product_image) }}" alt="" style="width: 50px;float:left;margin-right: 10px; height:50px;">
								<strong >{{ $details->product_name }}</strong>
							</td>
                            {{-- <td style="vertical-align: middle"><strong >{{ $ord->product_sales_quantity }}</strong></td> --}}
							<td style="vertical-align: middle"><strong > {{$details->product_sales_quantity}}
								<input type="hidden" class="order_qty_{{$details->order_detail_id}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">
								<input type="hidden" name="order_qty_storage_m" class="order_qty_storage_m_{{$details->product_id}}" value="{{$details->product->M}}">
								<input type="hidden" name="order_qty_storage_s" class="order_qty_storage_s_{{$details->product_id}}" value="{{$details->product->S}}">
								<input type="hidden" name="order_qty_storage_xl" class="order_qty_storage_xl_{{$details->product_id}}" value="{{$details->product->XL}}">

								<input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
								<input type="hidden" name="order_detail_id" class="order_detail_id" value="{{$details->order_detail_id}}">
								<input type="hidden" name="order_product_size"  class="order_product_size_{{$details->order_detail_id}}" value="{{$details->product_size}}">

							</strong></td>

							@if($details->product_size == 'M')
							<td style="vertical-align: middle"><strong >{{ $details->product->M }}</strong></td>
							@elseif($details->product_size == 'S')
							<td style="vertical-align: middle"><strong >{{ $details->product->S }}</strong></td>
							@elseif($details->product_size == 'XL')
							<td style="vertical-align: middle"><strong >{{ $details->product->XL }}</strong></td>
							@endif

                            <td style="vertical-align: middle">
								<strong>{{ $details->product_size }}</strong>
							</td>
                            <td style="vertical-align: middle">
                                <?php
								$subtotal=$details->product_price * $details->product_sales_quantity;
								$total+=$subtotal;
								echo number_format($subtotal).' '.'VND';
								?>
                            </td>
                        </tr>
                        @endforeach
						@if($payment->payment_method == 1)
						<tr>
							<td colspan="7">Phí ship: {{ number_format($details->order_fee) }} VND</td>
						</tr>
						<tr>
							<td colspan="7" >
								Tổng tiền: {{ number_format($total+$details->order_fee) }} VND
							</td>
						</tr>
						@else
						<tr>
							<td><strong> Đã thanh toán</strong></td>
						</tr>
						@endif

						<tr>
							<td colspan="7">
							  @foreach($order as $key => $or)
								@if($or->order_status==1)
								<form>
								   @csrf
								  <select class="form-control order_details">
									<option value="">----Chọn hình thức đơn hàng-----</option>
									<option id="{{$or->order_id}}" selected value="1" >Chưa xử lý</option>
									<option id="{{$or->order_id}}" value="2">Đã xử lý, chờ giao hàng</option>
									<option id="{{$or->order_id}}" value="5">Hủy đơn hàng</option>
								  </select>
								</form>
								@elseif($or->order_status==2)
								<form>
								  @csrf
								  <select class="form-control order_details">
									<option value="">----Chọn hình thức đơn hàng-----</option>
									<option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
									<option id="{{$or->order_id}}" selected value="2">Đã xử lý, chờ giao hàng</option>
									<option id="{{$or->order_id}}" value="3">Đang giao</option>
									{{-- <option id="{{$or->order_id}}" value="4">Giao hàng thành công</option> --}}
								  </select>
								</form>
								@elseif($or->order_status==3)
								<form>
								  @csrf
								  <select class="form-control order_details">
									<option value="">----Chọn hình thức đơn hàng-----</option>
									{{-- <option id="{{$or->order_id}}" value="1">Chưa xử lý</option> --}}
									{{-- <option id="{{$or->order_id}}" value="2">Đã xử lý</option> --}}
									<option id="{{$or->order_id}}" selected value="3">Đang giao</option>
									<option id="{{$or->order_id}}" value="4">Giao hàng thành công</option>
									<option id="{{$or->order_id}}" value="5">Hủy đơn hàng</option>
								  </select>
								</form>
								@elseif($or->order_status==4)
								<form>
								  @csrf
								  <select class="form-control order_details">
									<option value="">----Chọn hình thức đơn hàng-----</option>
									{{-- <option id="{{$or->order_id}}" value="1">Chưa xử lý</option> --}}
									{{-- <option id="{{$or->order_id}}" value="2">Đã xử lý</option> --}}
									{{-- <option id="{{$or->order_id}}" selected value="3">Đang giao</option> --}}
									<option id="{{$or->order_id}}" value="4">Giao hàng thành công</option>
								  </select>
								</form>
								@else
								<form>
								   @csrf
								  <select class="form-control order_details">
									<option value="">----Chọn hình thức đơn hàng-----</option>
									{{-- <option id="{{$or->order_id}}" value="1">Chưa xử lý</option>
									<option id="{{$or->order_id}}"  value="2">Đã xử lý - Chờ giao hàng</option> --}}
									<option id="{{$or->order_id}}" value="5">Hủy đơn hàng</option>
								  </select>
								</form>

								@endif

								@endforeach
							</td>
						  </tr>
						</tbody>
					</table>
				</div>
				@if($or->order_status==2)
				<a target="_blank" href="{{url('/print-order/'.$details->order_id)}}"><button type="submit" class="btn btn-primary" name="add_category_product">In đơn hàng</button></a>
				@endif
			</div>
			<a href="{{ URL::to('/manage-order') }}">
				<button type="button" class="btn btn-primary">Quay lại</button>
			</a>
		</div>
	</div>
</div>


@endsection
