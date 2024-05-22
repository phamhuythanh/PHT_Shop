@extends('layout')
@Section('content')

<?php
$message= Session::get('message');
if($message){
    echo '<span style="color:blue;">'.$message.'</span>';
    Session::put('message',null);
}
?>

<h3 style="text-align: center;margin-top:50px; font-weight:bold;">Nhập mật khẩu mới</h3>
    <div class="container" style="margin-bottom:50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @php
                        $token= $_GET['token'];
                        $email= $_GET['email'];
                    @endphp

                    <form action="{{ URL::to('/reset-new-password') }}" method="POST" id="form-reset-password">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <input name="new_password" type="password" class="form-style" placeholder="Nhập mật khẩu mới" id="logemail" autocomplete="off">
                        </div>
                    
                        <div class="card-footer" style="display: flex; justify-content:center;">
                            <button type="submit" class="btn btn-success">Cập nhật mật khẩu</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection