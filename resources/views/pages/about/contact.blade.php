@extends('layout')
@Section('content')

<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li> <a href="">Thông tin liên hệ</a></li>
          </ul>
       </div>
    </div>
  </div>
<style>
    #map{
        display: flex;
    }
    .widthContent{
        margin-left: 20px;
    }
</style>



<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Tài khoản</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                              @if($customer_id)
                                                <li><a href="{{ URL::to('/edit-customer/'.$customer_id) }}">Xem tài khoản</a></li>
                                                <li><a href="{{URL::to('/view-customer-password/'.$customer_id)}}">Đổi mật khẩu</a></li>
                                                <li><a href="{{ URL::to('/order-customer/'.$customer_id) }}">Xem đơn hàng</a></li>
                                              @else
                                                <li><a href="{{ URL::to('/login-checkout') }}">Xem tài khoản</a></li>
                                                <li><a href="{{ URL::to('/login-checkout') }}">Đổi mật khẩu</a></li>
                                                <li><a href="{{ URL::to('/login-checkout') }}">Xem đơn hàng</a></li>
                                              @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Hỗ trợ</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                <li><a href="{{ URL::to('/about-us') }}">Giới thiệu</a></li>
                                                <li><a href="{{ URL::to('/question') }}">Câu hỏi thường gặp</a></li>
                                                <li><a href="{{ URL::to('/contact') }}">Thông tin liên hệ</a></li>
                                                <li><a href="{{ URL::to('/size-notificate') }}">Hướng dẫn chọn size</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseThree">Chính sách</a>
                                </div>
                                <div id="collapseThree" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__price">
                                            <ul>
                                                <li><a href="{{ URL::to('/shopping-guide') }}">Hướng dẫn mua hàng</a></li>
                                                <li><a href="{{ URL::to('/privacy-policy') }}">Chính sách bảo mật</a></li>
                                                <li><a href="{{ URL::to('/production-partner') }}">Đối tác sản xuất</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div id="map">
                    <iframe src="https://www.google.com/maps/place/Nh%C3%A0+v%C4%83n+ho%C3%A1+th%C3%B4n+An+C%E1%BB%91+T%C3%A2n/@20.5872976,106.594628,18.5z/data=!4m15!1m8!3m7!1s0x314a0bae0ad7a6c1:0x9a2d52ba0c785dd5!2zVGjhu6V5IEFuLCBUaMOhaSBUaOG7pXksIFRow6FpIELDrG5oLCBWaeG7h3QgTmFt!3b1!8m2!3d20.6032623!4d106.590819!16s%2Fg%2F11c535lyr3!3m5!1s0x314a0bf2c983b559:0xe525c14117cc863!8m2!3d20.5875774!4d106.5951279!16s%2Fg%2F11ns4y6717?entry=ttu" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    <div class="widthContent">
                                        <div class="header-page-contact clearfix"><h1><b>Liên hệ với chúng tôi</b></h1></div>
                                        <div style="border-bottom: 4px solid black; width:70px; margin-bottom:30px"></div>
                                        <div class="box-info-contact">
                                            <ul class="list-info">
                                                <li>
                                    <p>Địa chỉ chúng tôi</p>
                                    <p><strong>Thụy An, Thái Thụy, Thái Bình</strong></p>
                                </li>
                                <li>
                                    <p>Email chúng tôi</p>
                                    <p><strong>Thanh01a7@gmail.com</strong></p>
                                </li>
                                <li>
                                    <p>Điện thoại</p>
                                    <p><strong>0865421561</strong></p>
                                </li>
                                <li>
                                    <p>Thời gian làm việc</p>
                                    <p><strong>Mọi ngày trong tuần từ 8h30 sáng đến 22h tối</strong></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
