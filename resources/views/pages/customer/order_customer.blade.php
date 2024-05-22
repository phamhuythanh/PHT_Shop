@extends('layout')
@Section('content')
<div id="snow"></div>
<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li> <a href="">Đơn mua</a></li>
          </ul>
       </div>
    </div>
</div>
<div id="bg-customer">
    <div class="container-fluid padding">
        <div class="row welcome text-center">
            <div class="col-12">
                <h5><b style="font-size: 25px; color:white;">ĐƠN HÀNG ĐÃ ĐẶT</b></h5>
            </div>
        </div>
    </div>
    <style>
        .table{
            margin-bottom: 0px !important;
        }
        .table td{
            padding-bottom: 0px;
        }
        #myTab li a{
            padding: 15px;
        }
    </style>
    <div class="product-info-tabs" style="padding:0 5% 0">
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="border: 0px;background: antiquewhite;margin: 0 1.5%;">
            <li class="nav-item">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Tất cả</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#xuly" role="tab" aria-controls="review" aria-selected="false">Đang chờ xử lý</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Đã xác nhận/Chờ giao hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#danggiao" role="tab" aria-controls="review" aria-selected="false">Đang giao hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#hoanthanh" role="tab" aria-controls="review" aria-selected="false">Hoàn thành</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#bihuy" role="tab" aria-controls="review" aria-selected="false">Trả hàng/Hoàn tiền</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent" style="margin-top: -30px">

            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                @if($dem>0)
                <div class="table table-responsive table-bordered">
                    <table class="table">
                      <thead>
                        <tr style="text-align: center; font-size:25px; background-image: linear-gradient(#9FA5D5, #E8F5C8); color:rgb(96, 92, 92)">
                          <th colspan="2" style="width:500px;" scope="col">Sản phẩm</th>
                          <th style="width:150px;" scope="col">Số lượng</th>
                          <th scope="col">Thành tiền</th>
                          <th scope="col">Ngày đặt</th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach($order0 as $key => $order)
                        <tbody>
                            <tr style="text-align: center; font-size:18px;">
                                <td  style="width:200px;" scope="row">
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$order->product_id)}}"><img src="{{asset('Upload/product/'.$order->product_image)}}" width="100px" height="100px" alt="" /></a>
                                </td>
                                <td style="text-align: left;width:400px;">
                                    <p><b>{{ $order->product_name}}</b></p>
                                    <p>Đơn giá: {{$order->product_price}}VND</p>
                                    <p>Size: {{$order->product_size}}</p>
                                </td>
                                <td  style="width:150px; line-height: 100px;">
                                    {{$order->product_sales_quantity}}
                                </td>
                                <td style="line-height: 100px;"> {{number_format(($order->product_price)*($order->product_sales_quantity) + ($order->order_fee),0,',','.')}}VND</td>
                                <td style="width:150px; line-height: 50px;">{{ $order->created_at }}</td>
                                <td colspan="6" style="padding-bottom: 10px"><br>
                                    <div><a href="{{URL::to('/chi-tiet-san-pham/'.$order->product_id)}}" id="button-delete" "><button style="height: 45px;">Mua lại</button></a></div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
                @else
                <center style="color: aliceblue; margin-top:100px;"><h3>Chưa có đơn hàng</h3></center>
                @endif
            </div>

            <div class="tab-pane fade" id="xuly" role="tabpanel" aria-labelledby="review-tab" style="position: relative;z-index: 1;">
                @if($dem1>0)
                <div class="table table-responsive table-bordered">
                    <table class="table">
                      <thead>
                        <tr style="text-align: center; font-size:25px; background-image: linear-gradient(#9FA5D5, #E8F5C8); color:rgb(96, 92, 92)">
                          <th colspan="2" style="width:500px;" scope="col">Sản phẩm</th>
                          <th style="width:150px;" scope="col">Số lượng</th>
                          <th scope="col">Thành tiền</th>
                          <th scope="col">Ngày đặt</th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach($order1 as $key1 => $order1)
                        <tbody>
                            <tr style="text-align: center; font-size:18px;">
                                <td  style="width:200px;" scope="row">
                                    <a href="{{URL::to('/chi-tiet-san-pham/'.$order1->product_id)}}"><img src="{{asset('Upload/product/'.$order->product_image)}}" width="100px" height="100px" alt="" /></a>

                                </td>
                                <td style="text-align: left;width:400px;">
                                    <p><b>{{ $order1->product_name}}</b></p>
                                    <p>Đơn giá: {{$order1->product_price}}VND</p>
                                    <p>Size: {{$order1->product_size}}</p>
                                </td>
                                <td  style="width:150px; line-height: 100px;">
                                    {{$order1->product_sales_quantity}}
                                </td>
                                <td style="line-height: 100px;"> {{number_format(($order1->product_price)*($order1->product_sales_quantity) + ($order1->order_fee),0,',','.')}}VND</td>
                                <td style="width:150px; line-height: 50px;">{{ $order1->created_at }}</td>
                                <td colspan="6" style="padding-bottom: 10px"><br>
                                    <div><a href="{{URL::to('/chi-tiet-san-pham/'.$order1->product_id)}}" id="button-delete""><button style="height: 45px;">Mua lại</button></a></div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
                @else
                <center style="color: aliceblue; margin-top:100px;"><h3>Chưa có đơn hàng</h3></center>
                @endif
            </div>

            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab" style="position: relative;z-index: 1;">
                @if($dem2>0)
                <div class="table table-responsive table-bordered">
                    <table class="table">
                      <thead>
                        <tr style="text-align: center; font-size:25px; background-image: linear-gradient(#9FA5D5, #E8F5C8); color:rgb(96, 92, 92)">
                          <th colspan="2" style="width:500px;" scope="col">Sản phẩm</th>
                          <th style="width:150px;" scope="col">Số lượng</th>
                          <th scope="col">Thành tiền</th>
                          <th scope="col">Ngày đặt</th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach($order2 as $key2 => $or2)
                        <tbody>
                            <tr style="text-align: center; font-size:18px;">
                                <td  style="width:200px;" scope="row">
                                    <img src="{{asset('Upload/product/'.$or2->product_image)}}" width="100px" height="100px" alt="" />
                                </td>
                                <td style="text-align: left;width:400px;">
                                    <p><b>{{ $or2->product_name}}</b></p>
                                    <p>Đơn giá: {{$or2->product_price}}VND</p>
                                    <p>Size: {{$or2->product_size}}</p>
                                </td>
                                <td  style="width:150px; line-height: 100px;">
                                    {{$or2->product_sales_quantity}}
                                </td>
                                <td style="line-height: 100px;"> {{number_format(($or2->product_price)*($or2->product_sales_quantity),0,',','.')}}VND</td>
                                <td style="width:150px; line-height: 50px;">{{ $or2->created_at }}</td>
                                <td colspan="6" style="padding-bottom: 10px"><br>
                                    <div><a href="{{URL::to('/chi-tiet-san-pham/'.$or2->product_id)}}" id="button-delete"><button style="height: 45px;">Mua lại</button></a></div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>

            @else
            <center style="color: aliceblue; margin-top:100px;"><h3>Chưa có đơn hàng</h3></center>
            @endif
            </div>

            <div class="tab-pane fade" id="danggiao" role="tabpanel" aria-labelledby="review-tab" style="position: relative;z-index: 1;">
            @if($dem3>0)
                <div class="table table-responsive table-bordered">
                    <table class="table">
                      <thead>
                        <tr style="text-align: center; font-size:25px; background-image: linear-gradient(#9FA5D5, #E8F5C8); color:rgb(96, 92, 92)">
                          <th colspan="2" style="width:500px;" scope="col">Sản phẩm</th>
                          <th style="width:150px;" scope="col">Số lượng</th>
                          <th scope="col">Thành tiền</th>
                          <th scope="col">Ngày đặt</th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach($order3 as $key3 => $or3)
                        <tbody>
                            <tr style="text-align: center; font-size:18px;">
                                <td  style="width:200px;" scope="row">
                                    <img src="{{asset('Upload/product/'.$or3->product_image)}}" width="100px" height="100px" alt="" />
                                </td>
                                <td style="text-align: left;width:400px;">
                                    <p><b>{{ $or3->product_name}}</b></p>
                                    <p>Đơn giá: {{$or3->product_price}}VND</p>
                                    <p>Size: {{$or3->product_size}}</p>
                                </td>
                                <td  style="width:150px; line-height: 100px;">
                                    {{$or3->product_sales_quantity}}
                                </td>
                                <td style="line-height: 100px;"> {{number_format(($or3->product_price)*($or3->product_sales_quantity),0,',','.')}}VND</td>
                                <td style="width:150px; line-height: 50px;">{{ $or3->created_at }}</td>
                                <td colspan="6" style="padding-bottom: 10px"><br>
                                    <div><a href="{{URL::to('/chi-tiet-san-pham/'.$or3->product_id)}}" id="button-delete"><button style="height: 45px;">Mua lại</button></a></div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>

            @else
            <center style="color: aliceblue; margin-top:100px;"><h3>Chưa có đơn hàng</h3></center>
            @endif
            </div>

            <div class="tab-pane fade" id="hoanthanh" role="tabpanel" aria-labelledby="review-tab" style="position: relative;z-index: 1;">
                @if($dem4>0)
                <div class="table table-responsive table-bordered">
                    <table class="table">
                      <thead>
                        <tr style="text-align: center; font-size:25px; background-image: linear-gradient(#9FA5D5, #E8F5C8); color:rgb(96, 92, 92)">
                          <th colspan="2" style="width:500px;" scope="col">Sản phẩm</th>
                          <th style="width:150px;" scope="col">Số lượng</th>
                          <th scope="col">Thành tiền</th>
                          <th scope="col">Ngày đặt</th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach($order4 as $key4 => $or4)
                        <tbody>
                            <tr style="text-align: center; font-size:18px;">
                                <td  style="width:200px;" scope="row">
                                    <img src="{{asset('Upload/product/'.$or4->product_image)}}" width="100px" height="100px" alt="" />
                                </td>
                                <td style="text-align: left;width:400px;">
                                    <p><b>{{ $or4->product_name}}</b></p>
                                    <p>Đơn giá: {{$or4->product_price}}VND</p>
                                    <p>Size: {{$or4->product_size}}</p>
                                </td>
                                <td  style="width:150px; line-height: 100px;">
                                    {{$or4->product_sales_quantity}}
                                </td>
                                <td style="line-height: 100px;"> {{number_format(($or4->product_price)*($or4->product_sales_quantity),0,',','.')}}VND</td>
                                <td style="width:150px; line-height: 50px;">{{ $or4->created_at }}</td>
                                <td colspan="6" style="padding-bottom: 10px"><br>
                                    <div><a href="{{URL::to('/chi-tiet-san-pham/'.$or4->product_id)}}" id="button-delete"><button style="height: 45px;">Mua lại</button></a></div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>

            @else
            <center style="color: aliceblue; margin-top:100px;"><h3>Chưa có đơn hàng</h3></center>
            @endif
            </div>

            <div class="tab-pane fade" id="bihuy" role="tabpanel" aria-labelledby="review-tab" style="position: relative;z-index: 1;">
                @if($dem5>0)
                <div class="table table-responsive table-bordered">
                    <table class="table">
                      <thead>
                        <tr style="text-align: center; font-size:25px; background-image: linear-gradient(#9FA5D5, #E8F5C8); color:rgb(96, 92, 92)">
                          <th colspan="2" style="width:500px;" scope="col">Sản phẩm</th>
                          <th style="width:150px;" scope="col">Số lượng</th>
                          <th scope="col">Thành tiền</th>
                          <th scope="col">Ngày đặt</th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach($order5 as $key5 => $or5)
                        <tbody>
                            <tr style="text-align: center; font-size:18px;">
                                <td  style="width:200px;" scope="row">
                                    <img src="{{asset('Upload/product/'.$or5->product_image)}}" width="100px" height="100px" alt="" />
                                </td>
                                <td style="text-align: left;width:400px;">
                                    <p><b>{{ $or5->product_name}}</b></p>
                                    <p>Đơn giá: {{$or5->product_price}}VND</p>
                                    <p>Size: {{$or5->product_size}}</p>
                                </td>
                                <td  style="width:150px; line-height: 100px;">
                                    {{$or5->product_sales_quantity}}
                                </td>
                                <td style="line-height: 100px;"> {{number_format(($or5->product_price)*($or5->product_sales_quantity),0,',','.')}}VND</td>
                                <td style="width:150px; line-height: 50px;">{{ $or5->created_at }}</td>
                                <td colspan="6" style="padding-bottom: 10px"><br>
                                    <div><a href="{{URL::to('/chi-tiet-san-pham/'.$or5->product_id)}}" id="button-delete"><button style="height: 45px;">Mua lại</button></a></div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>

            @else
            <center style="color: aliceblue; margin-top:100px;"><h3>Chưa có đơn hàng</h3></center>
            @endif
            </div>
        </div>
    </div>
</div>

@endsection
