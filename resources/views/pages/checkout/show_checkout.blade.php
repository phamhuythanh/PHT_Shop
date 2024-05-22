@extends('layout')
@Section('content')

<style>
    /* body{margin-top:20px;
    background:#eee;
} */
    label,h3{
        color: white;
    }
    .panel-title a{
        color: white;
    }
</style>

<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li> 
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li><a href="{{ URL::to('/gio-hang-ajax') }}">Giỏ hàng <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li> <a href="">Thanh toán</a></li>
          </ul>
       </div>
    </div>
</div>

<div class="container" style="max-width: 90%; ">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title" style="background: #eee">
                        Chọn hình thức thanh toán
                    </div>
                    <div class="ibox-content" style="background:#4D606E;">
                        <form method="POST" action="{{ URL::to('/order-place') }}" id="form-gui">
                            {{ csrf_field() }}
                        <div class="panel-group payments-method" id="accordion">
                            @if(!isset($_GET['vnp_Amount']))
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Thanh toán khi nhận hàng</a>
                                    </h5>
                                </div>
                                <?php
                                    $customer_name= session::get('customer_name');
                                    $customer_phone= session::get('customer_phone');
                                ?>
                                <div id="collapseTwo" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3><center>Nhập thông tin giao hàng</center></h3><br>
                                                <input type="hidden" name="payment_option" value="1" checked>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-7">
                                                        <div class="form-group">
                                                            <label>Họ và tên <span style="color: red">*</span></label>
                                                            <input name="shipping_name" class="form-control shipping-name" type="text" placeholder="Họ và tên*" value="{{ $customer_name }}" required >                                                   
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 pull-right">
                                                        <div class="form-group">
                                                            <label>Số điện thoại <span style="color: red">*</span></label>
                                                            <input name="shipping_phone" class="form-control shipping-phone" max="999999999999" type="number" placeholder="Điện thoại*" value="{{ $customer_phone }}" required ><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Địa chỉ <span style="color: red">*</span></label>
                                                            <div class="input-group">
                                                            <input name="shipping_address" value="{{ Session::get('xa') }}, {{ Session::get('huyen') }}, {{ Session::get('tinh') }}" class="form-control shipping-address" type="text" placeholder="Địa chỉ*" readonly ><br> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Ghi chú của bạn</label>
                                                            <div class="input-group">
                                                                <textarea name="shipping_notes" class="form-control shipping-notes" name="message"  placeholder="Ghi chú*" rows="7" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-md-4">
                                            <div class="table table-responsive" style="min-width:250px;width:100%; padding: 0 10px 10px; background:#eee;">
                                               <table class="table" style="background:#eee;">
                                                    <thead>
                                                        <tr style="text-align: center; font-size:20px; color:rgb(0, 0, 0)">
                                                            <th scope="col" colspan="3">Đơn hàng</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 60%;">Sản phẩm</th>
                                                            <th>SL</th>
                                                            <th style="text-align: end">Đơn giá</th>
                                                        </tr>
                                                    </thead>
                                                @if(Session::get('cart')==true)
                                                @php
                                                    $total = 0;
                                                    $getcart = Session::get('cart');
                                                    $fee=Session::get('fee');
                                                @endphp
                                                @foreach($getcart as $key => $cart)
                                                @php
                                                    $subtotal = $cart['product_price']*$cart['product_qty'];
                                                    $total+=$subtotal;
                                                @endphp
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$cart['product_name']}} </td>
                                                            <td><span style="color: red">{{$cart['product_qty']}}</span></td>
                                                            <td style="text-align: end">{{number_format($cart['product_price']).' '.'₫'}}</td>
                                                        </tr>
                                                @endforeach
                                                        <tr>
                                                            <td>Phí ship: </td>
                                                            <td></td>
                                                            <td style="text-align: end">{{ number_format(Session::get('fee')).' '.'₫' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tổng tiền: </td>
                                                            <td></td>
                                                            <td style="text-align: end"><span style="color: red">{{number_format($total+$fee).' '.'₫'}}</span></td>
                                                        </tr>
                                                    </tbody>                                                
                                                @endif
                                               </table>
                                               
                                               <div id="btn-xemthem" style="padding: 0px;width:100px; font-size:18px; margin-left:30%;">
                                                  <button name="send_order_place" type="button" id="gui">Đặt hàng</button>
                                               </div>
                                            </form>
                                            </div>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Thanh toán bằng VNPAY</a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    @if(!isset($_GET['vnp_Amount']))
                                    <div class="panel-body">
                                        <center><h3>Vui lòng nhập thông tin thẻ!!</h3></center>
                                        <div class="row" style="display: block">
                                            <center>
                                                <form action="{{ url('/vnpay-payment') }}" method="POST">
                                                    @csrf
                                                <div id="btn-xemthem" style="padding: 0px;width:100px; font-size:18px; margin-left:-50px;">
                                                    <a ><button name="redirect" type="submit" id="gui">Nhập</button></a>
                                                </div>
                                                </form>
                                            </center>
                                        </div>
                                    </div><hr>
                                    @endif
                                    @if(isset($_GET['vnp_Amount']))
                                    <form method="POST" action="{{ URL::to('/order-place') }}" id="form-gui">
                                        {{ csrf_field() }}
                                        <?php
                                            $customer_name= session::get('customer_name');
                                            $customer_phone= session::get('customer_phone');
                                        ?>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h3><center>Nhập thông tin giao hàng</center></h3><br>
                                                <input type="hidden" name="payment_option" value="2" checked>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-7">
                                                        <div class="form-group">
                                                            <label>Họ và tên <span style="color: red">*</span></label>
                                                            <input name="shipping_name" class="form-control shipping-name" type="text" placeholder="Họ và tên*" value="{{ $customer_name }}" required >                                                   
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 pull-right">
                                                        <div class="form-group">
                                                            <label>Số điện thoại <span style="color: red">*</span></label>
                                                            <input name="shipping_phone" class="form-control shipping-phone" max="999999999999" type="number" placeholder="Điện thoại*" value="{{ $customer_phone }}" required ><br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Địa chỉ <span style="color: red">*</span></label>
                                                            <div class="input-group">
                                                            <input name="shipping_address" value="{{ Session::get('xa') }}, {{ Session::get('huyen') }}, {{ Session::get('tinh') }}" class="form-control shipping-address" type="text" placeholder="Địa chỉ*" readonly ><br> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Ghi chú của bạn </label>
                                                            <div class="input-group">
                                                                <textarea name="shipping_notes" class="form-control shipping-notes" name="message"  placeholder="Ghi chú*" rows="7" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="table table-responsive" style="min-width:250px;width:100%; padding: 0 10px 10px; background:#eee;">
                                                <table class="table" style="background:#eee;">
                                                    <thead>
                                                        <tr style="text-align: center; font-size:20px; color:rgb(0, 0, 0)">
                                                            <th scope="col" colspan="3">Đơn hàng</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 60%;">Sản phẩm</th>
                                                            <th>SL</th>
                                                            <th style="text-align: end">Đơn giá</th>
                                                        </tr>
                                                    </thead>
                                                    @if(Session::get('cart')==true)
                                                    @php
                                                        $total = 0;
                                                        $getcart = Session::get('cart');
                                                        $fee=Session::get('fee');
                                                    @endphp
                                                    @foreach($getcart as $key => $cart)
                                                    @php
                                                        $subtotal = $cart['product_price']*$cart['product_qty'];
                                                        $total+=$subtotal;
                                                    @endphp
                                                    <tbody>
                                                        <tr>
                                                            <td>{{$cart['product_name']}}</td>
                                                            <td><span style="color: red">{{$cart['product_qty']}}</span></td>
                                                            <td style="text-align: end">{{number_format($cart['product_price']).' '.'₫'}}</td>
                                                        </tr>
                                                    @endforeach
                                                        <tr>
                                                            <td>Phí ship: </td>
                                                            <td></td>
                                                            <td style="text-align: end">{{ number_format(Session::get('fee')).' '.'₫' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tổng tiền: </td>
                                                            <td></td>
                                                            <td style="text-align: end"><span style="color: red">{{number_format($total+$fee).' '.'₫'}}</span></td>
                                                        </tr>
                                                    </tbody>                                                
                                                    @endif
                                                </table>
                                                
                                                <div id="btn-xemthem" style="padding: 0px;width:100px; font-size:18px; margin-left:30%;">
                                                    <button name="send_order_place" type="button" id="gui">Đặt hàng</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection