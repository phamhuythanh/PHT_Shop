@extends('layout')
@Section('content')

<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li> 
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li> <a href="">Đổi mật khẩu</a></li>
          </ul>
       </div>
    </div>
</div>
<?php
        $message= Session::get('message');
        if($message){
            echo '<span style="color:blue;">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>

<h3 style="text-align: center;margin-top:50px; font-weight:bold;">Đổi mật khẩu</h3>
    <div class="container" style="margin-bottom:50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach($all_customer as $key => $cus)
                    <form action="{{ URL::to('/update-customer-password/'.$cus->customer_id) }}" method="POST" id="form-reset-password">
                        {!! csrf_field() !!}
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Mật khẩu mới</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="Nhập mật khẩu mới">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3" >
                                <label for="confirmNewPasswordInput" class="form-label">Nhập lại mật khẩu</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Nhập lại mật khẩu">
                            </div>

                        </div>

                        <div class="card-footer" style="display: flex; justify-content:center;">
                            <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
                        </div>

                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection