@extends('layout')
@Section('content')
<div class="breadcrumb-back">
   <div class="container breadcrumb-container">
      <div class="breadcrumb-row clearfix">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
            <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
            <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
            <li> <a href="">Hướng dẫn mua hàng</a></li>
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
               <p><span style="font-size:12pt"><span style="color:#000000">PHTStore nhận giao hàng&nbsp;hàng toàn quốc. Bạn có thể mua hàng trực tiếp tại shop hoặc đặt hàng trên Website chính thức </span><a href="http://www.PHTStore.vn"><span style="color:#000000">www.PHTStore.vn</span></a><span style="color:#000000"> theo các bước sau:</span></span></p>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">BƯỚC 1: TÌM SẢN PHẨM MONG MUỐN</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Bạn có thể tìm kiếm bằng 2 hình thức sau:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Tìm kiếm theo tên/ mã sản phẩm: nhấp vào biểu tượng kính lúp ở góc phải, nhập từ khoá tìm kiếm vào ô tìm kiếm và gõ ENTER hoặc Click vào biểu tượng kính lúp.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Tìm kiếm theo nhóm sản phẩm: Rê chuột vào các mục sản phẩm trên menu chính, các mục sản phẩm bao gồm: ÁO KHOÁC, ÁO THUN, SƠ MI, QUẦN DÀI, QUẦN SHORT&nbsp;xuất hiện. Click vào từng mục sẽ hiện ra chi tiết nhóm sản phẩm bạn muốn tìm.</span></span></li>
               </ul>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">BƯỚC 2: THÊM SẢN PHẨM CẦN MUA VÀO GIỎ HÀNG</span></strong></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Sau khi đã tìm được sản phẩm bạn mong muốn và tham khảo đầy đủ hình ảnh, mô tả kèm theo, hãy thực hiện thao tác chọn size, số lượng cần mua rồi Click&nbsp;THÊM VÀO GIỎ HÀNG để thêm sản phầm vào giỏ hàng hoặc&nbsp;MUA NGAY.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Góc trái màn hình sẽ hiện danh sách sản phẩm đang có trong giỏ hàng và tổng số tiền tạm tính. Click XEM GIỎ HÀNG nếu muốn kiểm tra đẩy đủ giỏ hàng, Click THANH TOÁN nếu đã chọn đủ món hàng mong muốn hoặc Click ký hiện X để tiếp tục mua hàng.</span></span></li>
               </ul>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">BƯỚC 3: KIỂM TRA GIỎ HÀNG VÀ TIẾN HÀNH ĐẶT HÀNG</span></strong></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Kiểm tra lại thông tin đầy đủ về sản phẩm muốn đặt mua.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Điền mã giảm giá (nếu có) của bạn vào khung MÃ GIẢM GIÁ và Click SỬ DỤNG.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Điền đầy đủ thông tin giao hàng của bạn bao gồm Họ và tên, Email, Số điện thoại, Địa chỉ. Nếu đã có đăng ký tài khoản từ trước hãy Click vào ĐĂNG NHẬP.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Kiểm tra lại tất cả thông tin đã nhập, sau khi đã chắc chắn thì Click TIẾP TỤC ĐẾN PHƯƠNG THỨC THANH TOÁN để chuyển sang bước tiếp theo.</span></span></li>
               </ul>
               <p><strong><span style="color:#3498db"><span style="font-size:12pt">BƯỚC 4: CHỌN PHƯƠNG THỨC VẬN CHUYỂN</span></span></strong></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Sau khi bạn nhập đầy đủ thông tin trong phần thông tin giao hàng, căn cứ vào địa chỉ nhận hàng và tổng giá trị đơn hàng, Website sẽ đưa ra các hình thức vận chuyển và chi phí tương ứng để bạn lựa chọn.</span></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Mức phí vận chuyển theo từng khu vực như sau:</span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">1. Khu vực TP. Hồ Chí Minh:</span></strong></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Phí Ship nội thành 17k, ngoại thành 22k.&nbsp;Free ship cho đơn hàng nội thành trên 500k&nbsp;</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thời gian nhận hàng từ 1-2 ngày làm việc không tính chủ nhật.</span></span></li>
               </ul>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">2. Khu vực tỉnh thành khác:</span></strong></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Phí ship là 30k cho các đơn hàng dưới 1kg, thêm 1kg cộng thêm 5k.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Free ship cho đơn hàng ngoại thành và tỉnh thành trên 900k ( Khách hàng chuyển khoản trước).</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thời gian nhận hàng từ 2- 5 ngày làm việc không tính chủ nhật.</span></span></li>
               </ul>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">BƯỚC 5: CHỌN PHƯƠNG THỨC THANH TOÁN</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Trong phần PHƯƠNG THỨC THANH TOÁN, bạn có thể thanh toán theo các hình thức sau:</span></span></p>
               <ol>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thanh toán khi nhận hàng (COD):</span></span></li>
               </ol>
               <p><span style="color:#000000"><span style="font-size:12pt">Bạn thanh toán cho nhân viên giao hàng tại thời điểm nhận hàng.</span></span></p>
               <ol>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thanh toán qua chuyển khoản ngân hàng:</span></span></li>
               </ol>
               <p><span style="color:#000000"><span style="font-size:12pt">Bạn chuyển khoản cho PHTStore&nbsp; ngay sau khi nhân viên gọi xác nhận đơn hàng thành công.&nbsp; Thông tin chuyển khoản nhân viên Online sẽ hướng dẫn cụ thể.</span></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Sau khi chuyển khoản, bạn vui lòng xác nhận lại với PHTStore&nbsp;bằng cách gọi tới hotline <strong>(028) 7300 6200</strong> hoặc để lại tin nhắn trên Fanpage của PHTStore và chờ nhân viên xác nhận thanh toán thành công.</span></span></p>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">BƯỚC 6: HOÀN TẤT ĐƠN HÀNG</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Bạn Click vào nút HOÀN TẤT ĐƠN HÀNG sau khi đã hoàn thành các bước trên và kiểm tra thật kỹ tất cả các thông tin đơn hàng, phương thức vận chuyển, phương thức thanh toán.</span></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Bạn có thể theo dõi trạng thái đơn hàng của bạn tại mục KIỂM TRA ĐƠN HÀNG ở góc dưới màn hình Website hoặc liên hệ trực tiếp tổng đài mua hàng&nbsp;<strong>(028) 7300 6200</strong> ( giờ hành chính ngày làm việc).</span></span></p>
               <p> </p>
            </div>
           </div>
       </div>
   </div>
</section>


@endsection
