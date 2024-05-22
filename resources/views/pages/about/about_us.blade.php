@extends('layout')
@Section('content')
<div class="breadcrumb-back">
  <div class="container breadcrumb-container">
     <div class="breadcrumb-row clearfix">
        <ul class="breadcrumb">
           <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
           <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
           <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
           <li> <a href=""> Giới thiệu</a></li>
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
            <div class="heading-page"><h1><center>Giới thiệu</center></h1></div>
            <p><span style="color:#000000"><span style="font-size:12pt">Thành lập từ năm 2020, PHTStore được các bạn trẻ biết đến với các sản phẩm đa dạng về thời trang được cập nhật liên tục, sứ mệnh của PHTStore cho ra đời các sản phẩm đẹp, chất lượng, giá thành hợp lý. Dịch vụ chu đáo và phong cách chuyên nghiệp. PHTStore mong muốn mang lại cho các bạn những sản phẩm tốt nhất, để bạn có thể tự tin hơn trên con đường lựa chọn phong cách thời trang của riêng mình</span>.&nbsp;<span style="font-size:12pt">&nbsp;&nbsp;</span></span></p>
            <blockquote>
               <p style="text-align:center"><span style="font-size:12pt"><strong>PHTStore: Thụy An, Thái Thụy, Thái Bình&nbsp;</strong></span><br>*Đậu xe oto thoải mái<br>&nbsp;</p>
               <p style="text-align: center"><img src="//file.hstatic.net/1000096703/file/PHTStore_2ed9ee461db346229f43f3a835d391e8_master.jpg" style="max-width: 800px" width="100%"></p>
               <hr>
               <p style="text-align:center"><span style="font-size:12pt"><strong>PHTStore Từ Liêm: số 49,Nguyên Xá, Bắc Từ Liêm, Hà Nội </strong><br>(Ngay cạnh trạm bơm nước)</span></p>
               <p><img src="https://file.hstatic.net/1000096703/file/PHTStore_6f251075244145b68708c09d840ce6a2.jpg" style="max-width: 800px" width="100%"></p>
               <p style="text-align:center">&nbsp;</p>
               <p style="text-align:center">&nbsp;</p>
               <p style="text-align:center">&nbsp;</p>
               <p style="text-align:center">&nbsp;</p>
               <p>&nbsp;</p>
            </blockquote>
          </div>
      </div>
  </div>
</section>

@endsection
