@extends('layout')
@Section('content')
<div class="breadcrumb-back">
   <div class="container breadcrumb-container">
      <div class="breadcrumb-row clearfix">
         <ul class="breadcrumb">
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
            <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
            <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
            <li> <a href="">Câu hỏi thường gặp</a></li>
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
            <div class="content-page">
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">MUA HÀNG</span></strong></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">1. Tôi có thể mua sản phẩm của PHTStore ở đâu?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Bạn có thể mua sản phẩm thông qua:<br>- Hệ thống cửa hàng bán lẻ của PHTStore </span></span></p>
               <p><span style="font-size:12pt"><span style="color:#000000">-Mua Online qua Facebook </span><a href="http://facebook.com/PHTStorevietnam"><span style="color:#000000">http://facebook.com/PHTStorevietnam</span></a></span></p>
               <p><span style="font-size:12pt"><span style="color:#000000">-Mua hàng trên web chính thức </span><a href="http://www.PHTStore.vn"><span style="color:#000000">www.PHTStore.vn</span></a></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">-Gọi trực tiếp đến Hotline:&nbsp;<strong>(028) 7300 6200</strong></span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">2. Thời gian hoạt động của PHTStore?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">PHTStore mở cửa đón khách từ 8h30 đến 22h hằng ngày kể cả thứ 7, chủ nhật và ngày lễ ( Trừ tết và lịch nghỉ theo quy định của Công Ty)</span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">3. Hình thức thanh toán:</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Mua trực tiếp tại cửa hàng:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thanh toán bằng tiền mặt</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thanh toán bằng thẻ ngân hàng </span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thanh toán qua Momo</span></span></li>
               </ul>
               <p><span style="color:#000000"><span style="font-size:12pt">Mua hàng Online:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Thanh toán bằng tiền mặt qua ship COD</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Chuyển khoản ngân hàng</span></span></li>
               </ul>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">CHÍNH SÁCH THÀNH VIÊN PHTStore</span></strong></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">4. PHTStore có những ưu đãi nào cho khách hàng?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">PHTStore có nhiều chương trình ưu đãi khác nhau dành cho khách hàng:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Ưu đãi thường xuyên: Chính sách khách hàng thân thiết ( Mua hàng tích luỹ điểm để giảm giá các mức 5% - 10%- 15%); Tặng quà khách hàng thân thiết ….</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Ưu đãi giảm giá chương trình Sale&nbsp; khác trong năm.</span></span></li>
               </ul>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">5. Làm sao để tôi nhận được các ưu đãi từ PHTStore?</span></strong></span></p>
               <p><span style="font-size:12pt"><span style="color:#000000">Vui lòng theo dõi thêm tại Fanpage Facebook </span><a href="http://facebook.com/PHTStorevietnam"><span style="color:#000000">http://facebook.com/PHTStorevietnam</span></a></span></p>
               <p><span style="font-size:12pt"><span style="color:#000000">&nbsp; hoặc Website </span><a href="http://www.PHTStore.vn"><span style="color:#000000">www.PHTStore.vn</span></a><span style="color:#000000"> để không bỏ lỡ các chương trình ưu đãi từ PHTStore.</span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">6. Tôi muốn tạo tài khoản thành viên PHTStore</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Để tạo tài khoản thành viên PHTStore, bạn cần phải phát sinh tối thiểu 01 giao dịch mua hàng tại PHTStore và yêu cầu nhân viên thu ngân tạo tài khoản thành viên cho mình ngay tại thời điểm giao dịch đó.</span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">7. Thành viên PHTStore có những ưu đãi nào?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Tuỳ theo hạng thành viên mà mỗi khách hàng thành viên sẽ có những ưu đãi khác nhau. Vui lòng tham khảo tại “ Chính sách khách hàng thân thiết” để biết thêm chi tiết.</span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">8. Làm sao để thăng hạng tài khoản thành viên?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Để thăng hạng tài khoản thành viên, bạn cần phải mua hàng và tích luỹ điểm để thăng hạng, với quy đổi 50.000 đồng = 1 điểm.</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Member từ 1 điểm đến 60 điểm</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">VIP 5% từ 61 điểm đến 150 điểm</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">VIP 10% từ 151 điểm đến 250 điểm </span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">VIP 15% từ 251 điểm trở lên.</span></span></li>
               </ul>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">CHÍNH SÁCH ĐỔI HÀNG/ BẢO HÀNH</span></strong></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">9. Chính sách đổi hàng như thế nào?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Mua trực tiếp tại cửa hàng:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Vui lòng mang sản phẩm đến chi nhánh mua để được hỗ trợ kiểm tra và đổi hàng.</span></span></li>
               </ul>
               <p><span style="color:#000000"><span style="font-size:12pt">Mua hàng qua kênh Online:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Khách hàng vui lòng inbox lại Fanpage hoặc alo trực tiếp đến hotline 0908483900 để nhân viên hướng dẫn cách đổi&nbsp; hàng.</span></span></li>
               </ul>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">QUY ĐỊNH VỚI SẢN PHẨM ĐỔI </span></strong></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">PHTStore không áp dụng hoàn trả tiền dưới mọi hình thức.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Sản phẩm mua tại PHTStore sẽ được đổi hàng trong vòng 07 ngày đầu tiên, kể từ ngày xuất hoá đơn bán hàng. Quá thời gian trên, PHTStore không áp dụng đổi hàng.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Không áp dụng đổi hàng với mặt hàng phụ kiện. Khách hàng vui lòng kiểm tra kỹ các sản phẩm phụ kiện trước khi thanh toán và rời khỏi cửa hàng.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Áp dụng chính sách 01 sản phẩm có thể đổi thành 01 hoặc nhiều sản phẩm với tổng giá trị bằng hoặc cao hơn sản phẩm đổi. Trường hợp khách hàng muốn đổi sản phẩm có giá trị thấp hơn, PHTStore sẽ không hoàn lại tiền thừa.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Mỗi sản phẩm trên hoá đơn mua hàng chỉ được đổi 01 lần ( sản phẩm sau khi đổi hàng sẽ được cắt tem, khách hàng nên kiểm tra kỹ sản phẩm đổi trước khi đồng ý cho nhân viên cắt tem đổi hàng).</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Sản phẩm đổi là sản phẩm chưa qua sử dụng; chưa qua giặt, tẩy, còn nguyên vẹn tem, tag gắn trên sản phẩm đó, không bị vấy bẩn hoặc ám mùi lạ…</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Khi đổi hàng khách hàng phải mang theo hóa đơn mua hàng để được hỗ&nbsp;trợ đổi sản phẩm. </span></span></li>
               </ul>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">10.&nbsp;</span></strong><span style="font-size:12pt"><strong>Chính sách bảo hành sản phẩm như thế nào?</strong><br>Tuỳ theo sản phẩm sẽ có các chính sách bảo hành khác nhau:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Quần áo: Được hổ trợ đổi sản phẩm mới trong vòng 07 ngày đầu tiên kể từ ngày xuất hoá đơn. ( Phải là các lỗi do sản xuất: đường kim, mũi chỉ, bị phai màu, lem màu..)</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Phụ kiện: Không áp dụng đổi, bảo hành sản phẩm phụ kiện. ( Khách hàng vui lòng kiểm tra sản phẩm kỹ trước khi thanh toán và rời khỏi cửa hàng).</span></span></li>
               </ul>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">SẢN PHẨM</span></strong></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">11. Hình ảnh sản phẩm trên mạng có giống thực tế không?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Hình ảnh sản phẩm trên Website và các kênh Online đều do PHTStore tự chụp, đảm bảo 100% như mẫu thực tế. Về màu sác có thể chênh lệch rất ít do điều kiện ánh sáng khi chụp.</span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">12. Sản phẩm báo tạm hết hàng khi nào về hàng lại?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Hiện tại sản phẩm vẫn chưa về hàng lại, bạn theo dõi Fanpage và Website để được cập nhật tình trạng sản phẩm nhé. Ngoài ra bạn có thể để lại thông tin trên Fanpage để nhân viên lưu lại khi hàng về báo ngay cho bạn.</span></span><br> </p>
               <p><span style="color:#3498db"><strong><span style="font-size:12pt">VẬN CHUYỂN</span></strong></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">13. Đơn hàng Online có thể giao tới những tỉnh thành nào?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">PHTStore nhận giao hàng toàn quốc.</span></span></p>
               <p><span style="color:#000000"><strong><span style="font-size:12pt">14. Thời gian và phí vận chuyển ra sao?</span></strong></span></p>
               <p><span style="color:#000000"><span style="font-size:12pt">Tuỳ khu vực mà thời gian giao hàng và phí sẽ khác nhau.</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">HCM: nội thành&nbsp;17k, ngoại thành 22k.&nbsp;Thời gian giao hàng từ 1-2 ngày làm việc.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Tỉnh thành: Phí giao hàng 35k cho các đơn hàng dưới 1kg, trên 1kg cộng thêm 5k. Thời gian giao hàng từ 2- 5 ngày làm việc ( ko tính chủ nhật).</span></span></li>
               </ul>
               <p><span style="color:#000000"><span style="font-size:12pt">Free Ship :</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Đơn hàng&nbsp;mua trên 500k được giao hàng miễn phí Toàn Quốc.</span></span></li>
                  <li><span style="color:#000000"><span style="font-size:12pt">Đơn hàng Free Ship&nbsp;khách hàng vui lòng chuyển khoản trước.</span></span></li>
               </ul>
               <p><span style="color:#000000"><span style="font-size:12pt"><strong>15.&nbsp;Tôi muốn góp ý, than phiền/ khiếu nại:</strong><br>Nếu khách hàng có bất cứ khiếu nại, thắc mắc hay góp ý, vui lòng liên hệ qua:</span></span></p>
               <ul>
                  <li><span style="color:#000000"><span style="font-size:12pt">Hotline: (028) 7300 6200 </span></span></li>
                  <li><span style="font-size:12pt"><span style="color:#000000">Thông qua Fanpage </span><a href="http://facebook.com/PHTStorevietnam"><span style="color:#000000">http://facebook.com/PHTStorevietnam</span></a></span></li>
                  <li><span style="font-size:12pt"><span style="color:#000000">Gửi mail tới </span><a href="mailto:PHTStoresale@gmail.com"><span style="color:#000000">PHTStoresale@gmail.com</span></a></span></li>
               </ul>
               <p> </p>
               <p><span style="color:#000000"><em><span style="font-size:12pt">CÁM ƠN BẠN ĐÃ TIN TƯỞNG VÀ SỬ DỤNG SẢN PHẨM CỦA PHTStore! </span></em></span></p>
            </div>
           </div>
       </div>
   </div>
</section>

@endsection
