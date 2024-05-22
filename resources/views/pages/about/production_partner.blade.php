@extends('layout')
@Section('content')

<div class="breadcrumb-back">
  <div class="container breadcrumb-container">
     <div class="breadcrumb-row clearfix">
        <ul class="breadcrumb">
           <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
           <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
           <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
           <li> <a href="">Đối tác sản xuất</a></li>
        </ul>
     </div>
  </div>
</div>

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
            <h2><strong><center>PHTStore TÌM KIẾM ĐỐI TÁC SẢN XUẤT</center></strong></h2>
            <h2 style="margin-bottom: 12px;"><span style="font-size:18px">Trong hành trình sáng tạo thời trang của mình, <strong><span style="color:#3498db">PHTStore</span></strong> luôn mong muốn tìm kiếm và hợp tác các&nbsp;đối tác sản xuất để đồng hành và phát triển sản phẩm.</span></h2>
            <h2 style="margin-bottom: 12px;"><span style="font-size:18px"><strong>Yêu cầu:</strong></span></h2>
            <h2 style="margin-bottom: 12px;"><span style="font-size:18px">-Cung cấp sản phẩm theo tiêu chuẩn xuất khẩu, chất lượng tốt.</span></h2>
            <h2 style="margin-bottom: 12px;"><span style="font-size:18px">-Cách thức làm việc nhanh chóng và chuyên nghiệp.</span></h2>
            <h2 style="margin-bottom: 12px;"><span style="font-size:18px"><strong>Quyền lợi:</strong></span></h2>
            <h2 style="margin-bottom: 12px;"><span style="font-size:18px">-Thanh toán công nợ nhanh chóng và linh hoạt.</span></h2>
            <h2 style="margin-bottom: 12px;"><span style="font-size:18px">-Số lượng sản xuất đều đặn.</span></h2>
            <h2><span style="font-size:18px"><em><strong>Nhà cung cấp có nhu cầu, vui lòng gửi thông tin liên hệ, hình mẫu sản phẩm tại:</strong></em><br><strong>PHTStore.VN</strong><br><a style="color:#0563c1; text-decoration:underline" href="mailto:PHTStore1208@gmail.com">PHTStore1208@gmail.com</a><br>168 Nguyễn Trọng Tuyển, P8, Phú Nhuận, HCM<br>Liên hệ:&nbsp;(028) 7300 6200<br>Zalo: 0908483900&nbsp;</span></h2>
          </div>
      </div>
  </div>
</section>

@endsection
