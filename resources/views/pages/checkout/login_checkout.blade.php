@extends('layout')
@Section('content')

  <div class="section-1">
    <div class="container">
      <div class="row full-height justify-content-center">
        <div class="col-12 text-center align-self-center py-5">
          <div class="section pb-5 pt-5 pt-sm-2 text-center">
            <h6 class="mb-0 pb-3"><span>Đăng nhập </span><span>Đăng ký</span></h6>
            @foreach ($errors ->all() as $error)
            <center style="color: red">{{ $error }}</center>
            @endforeach
            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"  />
            <label for="reg-log"></label>
            <div class="card-3d-wrap mx-auto">
              <div class="card-3d-wrapper">
                <div class="card-front-1">
                  @if(session()->has('message'))
                      <div class="alert alert-success" id="animation">
                          {{ session()->get('message') }}
                          {{ session()->put('message',null) }}
                      </div>
                  @elseif(session()->has('error'))
                          <div class="alert alert-danger">
                          {{ session()->get('error') }}
                      </div>
                  @endif
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3 text-white" style="padding-top: 50px;">Đăng nhập</h4>
                      <form action="{{ URL::to('/login-customer') }}" id="form-login-customer" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <input type="email" name="email_account" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
                      </div>
                      <div class="form-group mt-2">
                        <input type="password" name="password_account" class="form-style" placeholder="Mật khẩu" id="logpass" autocomplete="off">
                      </div>
                      <button type="submit" class="btn btn-secondary" style="width:150px">Đăng nhập</button>
                      <p class="mb-0 mt-4 text-center p"><a href="{{ url('/forget-password') }}" class="link">Quên mật khẩu?</a></p>
                    </form>
                    </div>
                  </div>
                </div>
                <div class="card-back-1">
                  <div class="center-wrap">
                    <div class="section text-center">
                      <h4 class="mb-4 pb-3 text-white">Đăng ký</h4>
                      <form action="{{ URL::to('/add-customer') }}" id="form-register-customer" method="POST">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <input type="text" name="customer_name" class="form-style" placeholder="Họ và tên" id="logname" autocomplete="off">
                      </div>
                      <div class="form-group mt-2">
                        <input type="email" name="customer_email" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
                      </div>
                      <div class="form-group">
                        <input type="text" name="customer_phone" class="form-style" placeholder="Số điện thoại" id="logname" autocomplete="off">
                      </div>
                      <div class="form-group mt-2">
                        <input type="password" name="customer_password" class="form-style" placeholder="Mật khẩu" id="logpass" autocomplete="off">
                      </div>
                      <button type="submit" class="btn btn-secondary" style="width:150px">Đăng ký</button>
                      </form>
                    </div>
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