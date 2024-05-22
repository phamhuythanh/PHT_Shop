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
                <div class="col-md-8">Thông tin khách hàng</div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="info">										
                                <th>STT</th>										
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Số DT</th>
                                <th>Thao tác</th>									
                            </tr>
                        </thead>
                        <?php
                        $i=1;
                        ?>
                        <tbody>
                            @foreach($all_customers as $key => $cus)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $cus->customer_name }}</td>
                                <td>{{ $cus->customer_email }}</td>
                                <td>{{ $cus->customer_phone }}</td>
                                <td>
                                    <a href="{{URL::to ('/view-customer-order/'.$cus->customer_id) }}" title="Xem"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{URL::to ('/delete-customer/'.$cus->customer_id) }}" title="Xóa"> <span class="glyphicon glyphicon-remove" onclick=" return confirm('Bạn chắc chắn muốn xóa?')"></span> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 text-center" id="btn-xemthem">    {{ $all_customers->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection