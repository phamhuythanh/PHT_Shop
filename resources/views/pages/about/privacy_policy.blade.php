@extends('layout')
@Section('content')

<div class="breadcrumb-back">
   <div class="container breadcrumb-container">
      <div class="breadcrumb-row clearfix">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
            <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
            <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
            <li> <a href="">Chính sách bảo mật</a></li>
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
               <div class="content-page" style="margin-left: 30px;">
                  <p> </p>
                  <h2><strong><center>NỘI DUNG CHI TIẾT CHÍNH SÁCH BẢO MẬT</center></strong></h2>
                  <h2><span style="font-size:14px"><strong>I.&nbsp;Chính sách bảo mật và chia sẻ thông tin</strong></span></h2>
                  <h2><span style="font-size:14px"><strong>1. Mục đích</strong></span></h2>
                  <h2><span style="font-size:14px"><em>PHTStore.VN tôn trọng sự riêng tư, muốn bảo vệ thông tin cá nhân và thông tin thanh toán của bạn. "Chính sách bảo mật" dưới đây là những cam kết mà chúng tôi thực hiện, nhằm tôn trọng và bảo vệ quyền lợi của người truy cập.</em></span></h2>
                  <h2><span style="font-size:14px"><strong>2.&nbsp;Quy định cụ thể</strong></span></h2>
                  <h2><span style="font-size:14px"><strong>2.1/&nbsp;Thu thập thông tin</strong></span></h2>
                  <h2><span style="font-size:14px">- Khi khách hàng thực hiện giao dịch/ đăng ký mở tài khoản tại PHTStore.vn khách hàng phải cung cấp một số thông tin cần thiết.</span></h2>
                  <h2><span style="font-size:14px">- Khách hàng có trách nhiệm bảo đảm thông tin đúng và luôn cập nhật đầy đủ và chính xác nhất.</span></h2>
                  <h2><span style="font-size:14px"><strong>2.2/&nbsp;Lưu trữ và bảo mật thông tin riêng</strong></span></h2>
                  <h2><span style="font-size:14px">- Thông tin khách hàng, cũng như các trao đổi giữa khách hàng và PHTStore, đều được lưu trữ và bảo mật bởi hệ thống của PHTStore.</span></h2>
                  <h2><span style="font-size:14px">- PHTStore có các biện pháp thích hợp về kỹ thuật và an ninh để ngăn chặn việc truy cập , sử dụng trái phép thông tin khách hàng.</span></h2>
                  <h2><span style="font-size:14px"><strong>2.3/&nbsp;Sử dụng thông tin khách hàng</strong></span></h2>
                  <h2><span style="font-size:14px">* PHTStore có quyền sử dụng thông tin khách hàng cung cấp để:</span></h2>
                  <h2><span style="font-size:14px">- Giao hàng theo địa chỉ mà quý khách cung cấp.</span></h2>
                  <h2><span style="font-size:14px">- Cung cấp thông tin liên quan đến sản phẩm, lợi ích, ưu đãi hay các thư từ khác.</span></h2>
                  <h2><span style="font-size:14px">- Xử lý đơn đặt hàng và cung cấp dịch vụ, thông tin qua trang web PHTStore.vn theo yêu cầu của quý khách.</span></h2>
                  <h2><span style="font-size:14px">- Sử dụng thông tin đã thu thập được từ các cookies nhằm cải thiện trải nghiệm người dùng và chất lượng các dịch vụ của PHTStore.vn.</span></h2>
                  <h2><span style="font-size:14px"><strong>3.&nbsp;Liên kết với website khác</strong></span></h2>
                  <h2><span style="font-size:14px">&nbsp;-&nbsp;Khách hàng có trách nhiệm bảo vệ thông tin tài khoản của mình và không cung cấp bất kỳ thông tin nào liên quan đến tài khoản và mật khẩu truy cập trên PHTStore.vn trên các website khác.</span></h2>
                  <h2><span style="font-size:14px"><strong>4.&nbsp;Chia sẻ thông tin khách hàng</strong></span></h2>
                  <h2><span style="font-size:14px">PHTStore&nbsp;cam kết sẽ không chia sẻ thông tin của khách hàng cho bất kỳ một công ty nào khác ngoại trừ những công ty và các bên thứ ba có liên quan trực tiếp đến việc giao hàng. Chúng tôi có thể tiết lộ hoặc cung cấp thông tin cá nhân của quý khách trong các trường hợp thật sự cần thiết như sau:</span></h2>
                  <h2><span style="font-size:14px">- Khi có yêu cầu của các cơ quan pháp luật.</span></h2>
                  <h2><span style="font-size:14px">- Chia sẻ thông tin khách hàng với đối tác chạy quảng cáo như Google ví dụ như tiếp thị lại khách hàng dựa theo hành vi của khách hàng.</span></h2>
                  <h2><span style="font-size:14px">- Nghiên cứu thị trường và các báo cáo phân tích và tuyệt đối không chuyển cho bên thứ ba.</span></h2>
                  <h2><span style="font-size:14px"><strong>5.&nbsp;Sử dụng Cookie</strong></span></h2>
                  <h2><span style="font-size:14px">Khi khách hàng sử dụng dịch vụ hoặc xem nội dung do PHTStore cung cấp, chúng tôi tự động thu thập và lưu trữ một số thông tin trong nhật ký máy chủ. Những thông tin này bao gồm:</span></h2>
                  <h2><span style="font-size:14px">- Các chi tiết về cách khách hàng sử dụng dịch vụ của PHTStore chẳng hạn như truy vấn tìm kiếm.</span></h2>
                  <h2><span style="font-size:14px">- Địa chỉ giao thức Internet.</span></h2>
                  <h2><span style="font-size:14px">- Thông tin sự cố thiết bị như lỗi, hoạt động của hệ thống, cài đặt phần cứng, loại trình duyệt, ngôn ngữ trình duyệt, ngày và thời gian bạn yêu cầu và URL giới thiệu.</span></h2>
                  <h2><span style="font-size:14px">- Cookie có thể nhận dạng duy nhất trình duyệt hoặc Tài khoản của khách hàng</span></h2>
                  <h2><span style="font-size:14px"><strong>6. Liên hệ, giải đáp, thắc mắc.</strong></span></h2>
                  <h2><span style="font-size:14px">Bất kỳ khi nào khách hàng cần hỗ trợ, xin vui lòng liên hệ với PHTStore tại Emai: PHTStoresale@gmail.com - ĐT: 0908.483.900</span></h2>
                  <h2><span style="font-size:14px"><strong>II.&nbsp;Chính sách bảo mật thanh toán</strong></span></h2>
                  <h2><span style="font-size:14px">- Hệ thống thanh toán thẻ trên PHTStore.vn được cung cấp bởi các đối tác cổng thanh toán đã được cấp phép hoạt động hợp pháp tại Việt Nam. Do đó, các tiêu chuẩn bảo mật thanh toán thẻ của PHTStore đảm bảo tuân thủ theo các tiêu chuẩn bảo mật của Đối tác cộng thanh toán.</span></h2>
                  <h2><span style="font-size:14px">- Ngoài ra, PHTStore còn có các tiêu chuẩn bảo mật giao dịch thanh toán riêng để đảm bảo an toàn các thông tin thanh toán của khách hàng.</span></h2>
                  <ul>
                     <li>
                        <h2><span style="font-size:14px"><strong><em>Mọi thắc mắc về chương trình, vui lòng liên hệ:</em></strong></span></h2>
                     </li>
                     <li>
                        <h2><span style="font-size:14px">Tổng đài&nbsp;chăm sóc khách hàng: (028) 7300 6200</span></h2>
                     </li>
                     <li>
                        <h2><span style="font-size:14px">Website: PHTStore.vn</span></h2>
                     </li>
                     <li>
                        <h2><span style="font-size:14px">Email:&nbsp;PHTStoresale@gmail.com</span></h2>
                     </li>
                     <li>
                        <h2><span style="font-size:14px"><strong><em>Địa chỉ cửa hàng PHTStore: </em></strong><em>20 Cửu Long, P15, Q10, TP.HCM</em></span></h2>
                     </li>
                  </ul>
               </div>
           </div>
       </div>
   </div>
 </section>


@endsection
