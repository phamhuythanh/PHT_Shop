@extends('layout')
@Section('content')

<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li> <a href=""> Giỏ hàng</a></li>
          </ul>
       </div>
    </div>
</div>

{{-- @if(session()->has('message'))
    <div class="alert alert-success" id="animation">
        {{ session()->get('message') }}
        {{ session()->put('message',null) }}
    </div>
@elseif(session()->has('error'))
        <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif --}}
<?php
$message= Session::get('message');
if($message){
    echo '<br><span style="color:red; padding:15px" class="alert-success">'.$message.'</span>';
    Session::put('message',null);
}
?>
<div class="row" style="width:100%; margin:50px 0px">
    <div class="col-md-8">
        <div class="row">
            <div class="col-7">
                <div class="form-group">
                    <label>Sản phẩm</label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Số lượng</label>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label>Thành tiền</label>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    <label>Xóa</label>
                </div>
            </div>
        </div>
        @if(Session::get('cart')==true)
        @php
                $total = 0;
                $getcart = Session::get('cart');
        @endphp
        @foreach($getcart as $key => $cart)
            @php
                $subtotal = $cart['product_price']*$cart['product_qty'];
                $total+=$subtotal;
            @endphp

        <div class="row color_qty_{{$cart['session_id']}}" style="box-shadow: 5px 5px 5px gray; margin-bottom:50px">
            <div class="col-7">
                <div class="form-group" id="img-cart">
                    <img src="{{asset('Upload/product/'.$cart['product_image'])}}" width="120px" height="120px" alt="{{$cart['product_name']}}"/>
                    <div style="margin-left: 20px">
                        <p><b>{{$cart['product_name']}}</b></p>
                        <p>Đơn giá: {{number_format($cart['product_price'],0,',','.')}} ₫</p>
                        <p>Size: {{$cart['product_size']}} </p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group"><br><br>
                    <form action="{{ URL::to('/update-cart') }}" method="POST" id="table-cart-qty">
                        {{ csrf_field() }}

                    @if($cart['product_size']=='M')
                    <input class="cart_quantity" type="number" min="1" max="{{ $cart['product_qty_m'] }}" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                    @elseif($cart['product_size']=='S')
                    <input class="cart_quantity" type="number" min="1" max="{{ $cart['product_qty_s'] }}" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                    @else
                    <input class="cart_quantity" type="number" min="1" max="{{ $cart['product_qty_xl'] }}" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                    @endif


                    <input type="hidden" name="cart_product_id" class="cart_product_id" value="{{$cart['product_id']}}">
                    <input type="hidden" name="cart_session" class="cart_session" value="{{$cart['session_id']}}">
                    <input type="hidden" class="qty_{{$cart['session_id']}}" value="{{$cart['product_qty']}}" name="cart_product_quantity">

                    <input type="hidden" value="{{$cart['product_size']}}" class="cart_product_size" name="cart_product_size">
                    <input type="hidden" value="{{$cart['product_size']}}" class="cart_size_{{$cart['product_size']}}" name="cart_size">


                    <input type="hidden" name="qty_storage_m" class="qty_storage_m_{{$cart['product_id']}}" value="{{$cart['product_qty_m']}}">
                    <input type="hidden" name="qty_storage_s" class="qty_storage_s_{{$cart['product_id']}}" value="{{$cart['product_qty_s']}}">
                    <input type="hidden" name="qty_storage_xl" class="qty_storage_xl_{{$cart['product_id']}}" value="{{$cart['product_qty_xl']}}">

                </div>
            </div>
            <div class="col-2">
                <div class="form-group" style="line-height: 130px;">
                    <span style="font-weight:bold">{{number_format($subtotal,0,',','.')}} ₫</span>
                </div>
            </div>
            <div class="col-1">
                <div class="form-group" style="padding-left: 10px;line-height: 130px;">
                    <a href="{{url('/del-product/'.$cart['session_id'])}}" id="button-delete"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row row-demo-grid">
            <div class="col-md-2">
                <a href="{{URL::to('/tat-ca-san-pham')}}">
                    <button type="button" class="btn btn-outline-primary" style="font-size: 14px"><i class="fas fa-arrow-circle-left"></i> Tiếp tục mua sắm</button>
                </a>
            </div>
            <div class="col-md-4 ml-auto">
                <button type="submit" class="btn btn-outline-primary" style="font-size: 14px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                    </svg>
                    Cập nhật giỏ hàng
                </button>
            </div>
        </div>
        </form>
    </div>

    <?php
    $fee=Session::get('fee');
    ?>

    <div class="col-md-4">
        <div class="table table-responsive" style="background:#eee;">
            <table class="table" style="background:#eee;">
                <form>
                    @csrf
                <thead>
                    <tr style="text-align: center; font-size:20px; color:rgb(0, 0, 0)">
                        <th scope="col" colspan="3">Tính phí vận chuyển</th>
                    </tr>
                    <tr style="text-align: center">
                        <th style="padding:  0.75rem 0">Chọn tỉnh</th>
                        <th style="padding:  0.75rem 0">Chọn quận huyện</th>
                        <th>Chọn xã phường</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td>
                            <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                <option value="">--Chọn tỉnh thành phố--</option>
                                @foreach($city as $key => $ci)
                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                <option value="">--Chọn quận huyện--</option>
                            </select>
                        </td>
                        <td>
                            <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                <option value="">--Chọn xã phường--</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
                </form>
            </table>

            <div id="btn-xemthem" style="padding: 0px;font-size:18px; margin-left:20%;margin-bottom:20px">
                <button type="button" name="calculate_order" class="calculate_delivery" style="width:250px; ">Tính phí vận chuyển</button>
            </div>
            <table class="table" style="background:#eee;">
                <thead>
                    <tr style="text-align: center; font-size:20px; color:rgb(0, 0, 0)">
                        <th scope="col" colspan="3">Thanh toán</th>
                    </tr>
                    <tr style="text-align: center">
                        <th>Tổng</th>
                        <th>Phí ship</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="text-align: center">
                        <td>{{number_format($total,0,',','.')}} ₫</td>
                        <td>{{ number_format(Session::get('fee')).' '.'₫' }}</td>
                        <td>{{number_format($total+$fee,0,',','.')}} ₫</td>
                    </tr>
                </tbody>
            </table>
            <?php
            $customer_id= Session::get('customer_id');
            ?>
            @if( $customer_id==Null)
                <a href="{{URL::to('/login-checkout') }}" id="button-pay">
                    <div id="btn-xemthem" style="padding: 0px;width:100px; font-size:18px; margin-left:-30px">
                        <button>Thanh toán</button>
                    </div>
                </a>
            @else
                @if($fee==0)
                    <a href="{{URL::to('/gio-hang-ajax') }}" id="button-pay">
                        <div id="btn-xemthem" style="padding: 0px;width:100px; font-size:18px; margin-left:-30px">
                            <button>Thanh toán</button>
                        </div>
                    </a>
                    @php
                        Session::put('message', 'Bạn chưa tính phí vận chuyển!');
                    @endphp
                @else
                    @php
                        Session::put('message', null);
                    @endphp
                    <div id="btn-xemthem" style="padding: 0px;width:100px; font-size:18px; margin-left:32%;">
                        <button class="btn-checkout" >Thanh toán</button>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>




@endif
@endsection


