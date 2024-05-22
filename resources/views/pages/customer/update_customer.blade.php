@extends('layout')
@Section('content')
<div id="snow"></div>

<div class="container bootstrap snippets bootdey" style="padding-top: 50px;">
    <h1 class="text-primary">THÔNG TIN KHÁCH HÀNG</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
        @foreach($all_customer as $key => $cus)
        <form class="form-horizontal" name="" method="post" action="{{ URL::to('/update-customer/'.$cus->customer_id) }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
          <img src="{{ asset('Upload/customer/'.$cus->customer_image) }}" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Thay đổi ảnh...</h6>

          <input class="form-control" name="customer_image" type="file" name="myfile">
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a>
          <i class="fa fa-coffee"></i>
          <?php
            $message= Session::get('message');
            if($message){
                echo '<span style="color:blue;">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
        </div>



          <div class="form-group">
            <label class="col-lg-3 control-label">Họ và Tên</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="{{ $cus->customer_name }}" name="customer_name">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email</label>
            <div class="col-lg-8">
              <input class="form-control" type="email" value="{{ $cus->customer_email }}" name="customer_email">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Số điện thoại</label>
            <div class="col-lg-8">
              <input class="form-control" type="number" value="{{ $cus->customer_phone }}" name="customer_phone">
            </div>
          </div>
            <?php
            $customer_id= Session::get('customer_id');

            ?>
            <button type="submit" style="width:120px;" class="btn btn-info">Cập nhật</button>

            <a href="{{URL::to('/view-customer-password/'.$customer_id)}}">
                <button type="button" style="width:150px;" class="btn btn-success">Đổi mật khẩu</button>
            </a>
        </form>
        @endforeach
      </div>
  </div>
</div>
<hr>
@endsection
