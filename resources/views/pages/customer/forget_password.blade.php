@extends('layout')
@Section('content')

<div class="row row-demo-grid" style="margin: 50px 0">
    <div class="col-md-6 ml-auto mr-auto">
        <div class="section text-center">
            <h4 class="mb-4 pb-3 text-black">Phục hồi mật khẩu</h4>
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
        <form action="{{ URL::to('/recover-pass') }}" id="form-login-customer" method="POST">
              @csrf
            <div class="form-group">
              <input type="email" name="email_account" class="form-style" placeholder="Nhập email" id="logemail" autocomplete="off" >
            </div>
            <button type="submit" class="btn btn-secondary" style="width:150px">Gửi</button>
        </form>
        </div>
    </div>
</div>

@endsection