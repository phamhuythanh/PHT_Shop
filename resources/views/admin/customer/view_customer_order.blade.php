@extends('layout_admin')
@Section('content_admin')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Quản trị</li>
        </ol>
    </div><!--/.row-->

    <?php
	$message= Session::get('message');
	if($message){
		echo '<span style="color:blue;">'.$message.'</span>';
		Session::put('message',null);
	}
	?>

    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading"">
                <div class="col-md-8">Quản lý đơn hàng</div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="info">										
                                <th>STT</th>										
                                <th>Tên người nhận</th>
                                <th>Ngày đặt hàng</th>
                                <th>Số điện thoại</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Thao tác</th>										
                            </tr>
                        </thead>
                        <?php
                            $i=1;
                            ?>
                        <tbody>
                            @foreach($all_order as $key => $order)
                            <tr>
                                <td><strong>{{ $i++}}</strong></td>
                                <td><strong >{{ $order->shipping_name }}</strong></td>
                                <td><strong >{{ $order->created_at }}</strong></td>
                                <td>{{ $order->shipping_phone }}</td>
                                <td><strong >
                                    @if($order->order_status == 1)
                                        <span style="color: rgb(255, 0, 217)">Đang chờ xử lý</span>
                                    @elseif($order->order_status == 2)
                                        <span style="color: orange ">Đã xử lý, chờ giao hàng</span>  
                                    @elseif($order->order_status == 3)
                                        <span style="color: blue">Đang giao hàng</span>                                     
                                    @elseif($order->order_status == 4)
                                        <span style="color: green">Giao hàng thành công</span>
                                    @elseif($order->order_status == 5)
                                        <span style="color: rgb(128, 0, 0)">Đơn hàng bị hủy</span>            
                                    @endif
                                </strong></td>
                                <td class="list_td aligncenter">
                                    <a href="{{URL::to ('/view-order/'.$order->order_id) }}" title="Xem"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
                                </td>    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection