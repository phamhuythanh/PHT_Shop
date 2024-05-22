@extends('layout')
@Section('content')
<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li> <a href="{{ url()->previous() }}">Quay lại trang trước</a></li>
          </ul>
       </div>
    </div>
</div>

<div style="text-align: center; margin:50px;">
    <h4><b>Hướng dẫn chọn size chuẩn</b></h4>
    <div class="product-info-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom: 0px">
            <li class="nav-item" id="linav">
                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true"><div class="numberCircle">1</div></a>
            </li>
            <li class="nav-item" id="linav">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false"><div class="numberCircle">2</div></a>
            </li>
            <li class="nav-item" id="linav">
                <a class="nav-link" id="danhgiasp" data-toggle="tab" href="#danhgia" role="tab" aria-controls="review" aria-selected="false"><div class="numberCircle">3</div></a>
            </li>
            <li class="nav-item" id="linav">
                <a class="nav-link" id="danhgiasp" data-toggle="tab" href="#size" role="tab" aria-controls="review" aria-selected="false"><div class="numberCircle">4</div></a>
            </li>

        </ul><hr style="margin-top: -35px;position: absolute;z-index: -1;width: 93%;">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <h5><b>1. CÁCH CHỌN SIZE ÁO THEO CHIỀU CAO CÂN NẶNG</b></h5>
                <div id="noidung1">
                    <p>
                        - Cách hướng dẫn chọn size áo đầu tiên mà bất cứ ai cũng phải biết đó chính là dựa trên chiều cao và cân nặng. Như lời giải thích ở phía trên, kích thước cơ thể của người nam sẽ hoàn toàn khác so với nữ. Bởi họ sở hữu thân hình cao ráo cũng như vạm vỡ hơn nhưng thực chất đều dùng chung một ký hiệu.
                        <br><br>
                        - Bên cạnh đó, trên thế giới hiện nay đang tồn tại 2 bảng size áo, một cho Châu u, bảng còn lại cho Châu Á. Căn cứ vào đó sẽ có những sai số nhất định. Tuy nhiên, thứ tự các loại size áo của cả hai đều được sắp xếp lần lượt theo mức độ tăng dần là XXS, XS, S, M, XL, XXL. Trong đó, nhỏ nhất là XXS và lớn nhất là XXL. Cụ thể, chúng được lý giải như sau:
                    </p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size1.jpg') }}" alt="size1">
                        <p>Cách hướng dẫn chọn size đầu tiên mà bất cứ ai cũng phải biết đó chính là
                            <br>
                        dựa trên chiều cao và cân nặng được sắp xếp theo 6 mức độ tăng dần</p>
                    </center>
                    <p>
                        ► XXS (Double Extra Small): rất rất nhỏ, dành cho dáng người rất nhỏ và gầy.
                        <br>
                        ► XS (Extra Small): rất nhỏ, dành cho dáng người gầy.
                        <br>
                        ► S (Small): nhỏ, dành cho dáng người nhỏ nhắn.
                        <br>
                        ► M (Medium): trung bình, dành cho người có vóc dáng không quá nhỏ cũng không quá lớn, vừa vặn.
                        <br>
                        ► L (Large): lớn, dành cho người có vóc dáng lớn, có thể là vừa đạt chuẩn.
                        <br>
                        ► XL (Extra Large): rất lớn, dành cho dáng người có vóc dáng quá khổ, hơi mập.
                        <br>
                        ► XXL (Double Extra Large): rất rất lớn, dành cho dáng người sở hữu vóc dáng rất mập, khó lựa chọn quần áo.
                        <br>
                        Bên cạnh đó, đối với những người sở hữu thân hình lớn hơn, thậm chí là rất mập hay rất gầy thì nhà sản xuất vẫn có các size áo riêng được viết tóm gọn lại như 2XS (XXS), 3XL (XXXl), 4XL (XXXXL)…
                    </p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size2.png') }}" alt="size1">
                        <p>Kích thước cơ thể của người nam hoàn toàn khác so với nữ bởi họ sở hữu thân hình cao ráo
                            <br>
                        cũng như vạm vỡ hơn nhưng đều dùng chung một ký hiệu</p>
                    </center>
                    <b>► Đối với dáng người cao – gầy</b>
                    <p>Thực chất việc lựa chọn kích thước size áo theo chiều cao và cân nặng được xem là phổ biến nhất hiện nay. Đặc biệt là đối với những khách hàng hay mua sắm quần áo trên mạng internet. Tuy nhiên tùy thuộc vào vóc dáng cơ thể mà ta nên lựa chọn mẫu áo cho phù hợp nếu không khi mặc lên sẽ mất cảm giác thoải mái, tự tin.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size3.png') }}" alt="size1">
                        <p>Việc lựa chọn kích thước size theo chiều cao và cân nặng được xem là phổ biến nhất hiện nay
                            <br>
                        đặc biệt đối với những khách hàng hay mua sắm quần áo online</p>
                    </center><br>
                    <p>Trong đó, đối với dáng người cao và gầy thường cân nặng dao động từ 39 đến 50 kg cũng như chiều cao từ 1m6 cho đến 1m8 nên lựa chọn size áo M. Còn trên 1m8 thì nên chọn size L. Cần cân nhắc lựa chọn kiểu áo vừa vặn với cơ thể, không quá rộng và không quá bó sát để lộ thân hình gầy gò của bản thân.</p>

                    <b>► Đối với dáng người cao – mập</b>
                    <p>Tuy sở hữu dáng người hơi mập nhưng chiều cao là thành phần giúp kiểu người này dễ dàng lựa chọn quần áo bởi họ trông rất đầy đặn và ưa nhìn. Một lưu ý quan trọng trong việc chọn size áo cho người cao – mập chính là bạn nên quan tâm tới các item có form rộng, freesize và thoải mái giúp dễ vận động lẫn che đi khuyết điểm bụng to hay cánh tay to của mình.</p>
                    <p>Dáng người cao mập với chiều cao dao động từ 1m6 đến 1m8 và nặng từ 50 cho đến 60kg thì nên chọn size L, còn trên 1m8 thì chọn size XL.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size4.jpg') }}" alt="size1">
                        <p>Cân nặng và chiều cao là hai thành phần chính giúp lựa chọn cách tính size
                            <br>
                        sao cho phù hợp nhất tùy vào từng dáng người phổ biến hiện nay</p>
                    </center><br>
                    <p>Trong đó, đối với dáng người cao và gầy thường cân nặng dao động từ 39 đến 50 kg cũng như chiều cao từ 1m6 cho đến 1m8 nên lựa chọn size áo M. Còn trên 1m8 thì nên chọn size L. Cần cân nhắc lựa chọn kiểu áo vừa vặn với cơ thể, không quá rộng và không quá bó sát để lộ thân hình gầy gò của bản thân.</p>

                    <b>► Đối với dáng người lùn – gầy</b>
                    <p>Đối với những bạn sở hữu dáng người lùn – gầy tức nhỏ nhắn, thấp bé thì việc lựa chọn size áo hay quần đều khá dễ dàng. Tuy nhiên cũng cần lưu ý rằng không nên lựa chọn kích cỡ áo quá to hay quá chật sẽ khiến bạn dễ dàng bị lộ ra những khuyết điểm của bản thân.</p>
                    <p>Sự lựa chọn hợp lý nhất dành cho dáng người lùn – gầy tức cao dưới 1m6 và số ký dao động từ 30 đến 50 thì nên đặt mua size XS hoặc X là hoàn hảo nhất. Tùy theo tạng người mà bạn có thể linh động hơn trong việc tìm ta cho mình một kiểu áo trẻ trung, năng động.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size6.jpg') }}" alt="size1">
                        <p>Tùy thuộc vào dáng người của bản thân mà bạn có thể linh động nhiều cách
                            <br>
                        lựa chọn kích cỡ sao cho phù hợp nhất</p>
                    </center><br>
                    <b>► Đối với dáng người lùn – mập</b>
                    <p>Chắc hẳn, đây sẽ là dáng người mà nhiều bạn quan tâm nhất hiện nay. Không chỉ khó khăn trong việc lựa chọn quần áo mà người lùn – mập cũng rất kén chọn từ màu sắc, kiểu dáng hay chất liệu áo sao cho phù hợp nhất.</p>
                    <p>Bên cạnh đó, bạn cũng cần lưu ý khi đi mua sắm quần áo thì người mập – lùn nên cân nhắc các kiểu áo đơn giản, form rộng vừa phải đủ để che phần bụng hay bắp tay to. Không nên chọn mẫu áo quá rộng bởi chúng sẽ khiến chiều cao của bạn giảm đi đáng kể. Tốt nhất, nếu bạn có chiều cao dưới 1m6 và cân nặng từ 50 đến trên 60kg, nên linh hoạt tham khảo giữa hai size M hoặc L.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size5.jpg') }}" alt="size1">
                        <p>Vốn dĩ có rất nhiều dáng người trên thế giới, tùy thuộc vào chiều cao lẫn cân nặng
                            <br>
                        bạn biết được của cá nhân mình sẽ làm tiền đề lựa chọn size</p>
                    </center><br>
                </div>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <h5><b>2. SIZE ÁO THEO SỐ ĐO 3 VÒNG</b></h5>
                <div id="noidung2">
                    <p>Vốn dĩ, việc lựa chọn size quần áo theo chiều cao và cân nặng thường mang tính chất khá chủ quan và chỉ thích hợp để nhắm chừng khi khách hàng mua hàng online trên các trang mạng xã hội. Chính vì thế, các nhà thiết kế chuyên nghiệp trên thế giới đã đưa ra một phương pháp hữu ích hơn giúp bạn sở hữu một sản phẩm vừa vặn với thân hình của mình chính là dựa trên số đo 3 vòng.</p>
                    <p>Ngày nay, hình thức này đã được phổ biến rộng rãi trên nhiều quốc gia khác nhau khi người tiêu dùng đề nghị nhà may thiết kế riêng cho mình những mẫu quần áo phù hợp với số đo. Bạn cũng có thể thực hiện phương pháp này ngay tại nhà và gửi lại số đo lẫn yêu cầu của mình cho xưởng may để họ thực hiện quy trình hoàn tất sản phẩm.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size7.png') }}" alt="size1">
                        <p>Các nhà thiết kế đã đưa ra một phương pháp hữu ích hơn giúp bạn sở hữu một sản phẩm
                            <br>
                        vừa y với thân hình của mình chính là dựa trên số đo 3 vòng</p>
                    </center><br>
                    <b>► Chuẩn bị</b>
                    <p>Bước đầu tiên chính là bạn cần chuẩn bị một sợi thước dây chuyên dụng trong việc đo đạc quần áo, có thể mua ở nhà sách hoặc những tiệm bán kim chỉ, vải may trên toàn quốc. Khi thực hiện thao tác đo, thước dây phải ôm sát các vòng của cơ thể bao gồm ngực, eo và mông.</p>
                    <p>Xoay thước để tìm ra vị trí có số lớn nhất hoặc nhỏ để bắt đầu đo đạc, cần đứng thẳng làm sao cho 3 vòng song song với mặt đất.</p>
                    <b>► Bước 1</b>
                    <p>Dùng thước dây, lấy số nhỏ nhất hoặc lớn nhất làm mốc, thực hiện tạo thành một vòng tròn xung quanh vòng ngực có độ nhô nhiều hơn các bề mặt khác. So sánh con số dừng lại ở đâu thì tiến hành ghi chú lại ra giấy. Ví dụ: vòng ngực – 80cm.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size8.png') }}" alt="size1">
                        <p>Hiện nay, khách hàng thường đề nghị nhà may thiết kế riêng cho mình những mẫu quần áo
                            <br>
                            phù hợp với số đo 3 vòng của bản thân</p>
                    </center><br>
                    <b>► Bước 2</b>
                    <p>Tương tự bước 1, dùng thước dây, lấy số nhỏ nhất hoặc lớn nhất làm mốc, thực hiện tạo thành một vòng tròn xung quanh vòng eo có kích cỡ nhỏ nhất. So sánh con số dừng lại ở đâu thì tiến hành ghi chú lại ra giấy. Ví dụ: vòng eo – 60cm.</p>
                    <b>► Bước 3</b>
                    <p>Dùng thước dây, lấy số nhỏ nhất hoặc lớn nhất làm mốc, thực hiện tạo thành một vòng tròn xung quanh vòng nở nhất. So sánh con số dừng lại ở đâu thì tiến hành ghi chú lại ra giấy. Ví dụ: vòng mông – 90cm.</p>
                    <b>► Bước 4</b>
                    <p>Bước cuối cùng là bạn phải lấy số đo chiều cao của mình để người may có thể ước chừng sản phẩm sao cho vừa vặn nhất. Dùng thước dây đo từ lòng bàn chân đến đỉnh đầu tính từ số nhỏ nhất. Con số còn lại dừng tới đâu thì tiến hành ghi chú lại ra giấy. Ví dụ: chiều cao – 160cm.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size9.png') }}" alt="size1">
                        <p>Khách hàng cũng có thể thực hiện phương pháp này ngay tại nhà và gửi lại số đo lẫn yêu cầu của mình cho xưởng may</p>
                    </center><br>
                </div>
            </div>

            <div class="tab-pane fade" id="danhgia" role="tabpanel" aria-labelledby="description-tab">
                <h5><b>3. SIZE ÁO THEO ĐỘ DÀI THÂN, NGANG NGỰC VÀ RỘNG VAI</b></h5>
                <div id="noidung3">
                    <p>Nếu nói đến phương pháp lấy số đo 3 vòng thì bạn cũng không nên bỏ qua một hình thức khác vô cùng phổ biến hiện nay chính là đo size áo theo độ dài thân, ngang ngực và rộng vai. Với phương pháp này, người tiêu dùng có thể sở hữu tất tần tật những kiểu áo phù hợp với dáng người của mình nhất mà không phải lo lắng vấn đề quá rộng hay bó sát.</p>
                    <b>► Chuẩn bị</b>
                    <p>Bước đầu tiên chính là bạn cần chuẩn bị sợi thước dây chuyên dụng trong việc đo đạc quần áo, có thể mua ở nhà sách hoặc những tiệm bán kim chỉ, vải may trên toàn quốc. Khi thực hiện thao tác đo, thước dây phải kéo căng vừa phải với độ dài của các bộ phận cần đo.</p>
                    <p>Xoay thước để tìm ra vị trí có số lớn nhất hoặc nhỏ để bắt đầu đo đạc. Bạn cần đứng thẳng người, không gù lưng hay vai khép lại trong lúc tiến hành đo.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size10.png') }}" alt="size1">
                        <p>Nhắc đến lấy số đo 3 vòng thì bạn cũng không nên bỏ qua một hình thức khác vô cùng phổ biến
                            <br>
                            chính là đo size áo theo độ dài thân, ngang ngực và rộng vai</p>
                    </center><br>
                    <b>► Bước 1</b>
                    <p>Lấy số nhỏ nhất hoặc lớn nhất ở thước làm mốc, thực hiện đo phần ngang ngực trước bằng một vòng tròn dây. Phần ngang ngực được tính từ dưới tay áo theo chiều rộng. So sánh con số dừng lại ở đâu thì tiến hành ghi chú lại ra giấy. Ví dụ: vòng ngực – 80cm.</p>
                    <b>► Bước 2</b>
                    <p>Tiếp tục đo phần bả vai áo, được tính bằng chiều rộng phía trên tay áo. Lần này, bạn không đo theo một vòng nữa mà đo từ trái sang phải duy nhất một đường thẳng rồi so sánh con số dừng lại ở đâu thì tiến hành ghi chú lại ra giấy. Ví dụ: vai áo – 40cm.</p>
                    <b>► Bước 3</b>
                    <p>Tương tự bước 2, độ dài thân sẽ được tính bằng chiều dài từ điểm cao nhất tới điểm thấp nhất của áo. Đo lần lượt một đường thẳng từ trên xuống dưới rồi so sánh con số dừng lại ở đâu thì tiến hành ghi chú lại ra giấy. Ví dụ: độ dài thân – 90cm.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size11.png') }}" alt="size1">
                        <p>Với cách đo này, khách hàng có thể sở hữu tất tần tật những kiểu áo phù hợp với dáng người
                            <br>
                            của mình nhất mà không phải lo lắng vấn đề quá rộng hay bó sát</p>
                    </center><br>

                </div>
            </div>
            <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="description-tab">
                <h5><b>TỔNG HỢP ĐẦY ĐỦ BẢNG SIZE ÁO PHỔ BIẾN NHẤT HIỆN NAY</b></h5>
                <div id="noidung4">
                    <b>1. BẢNG SIZE ÁO NAM</b>
                    <p>Ngày nay, việc lựa chọn size áo nam trở nên dễ dàng hơn bao giờ hết từ áo thun, áo sơ cho đến áo khoác… đều được quy về bảng size áo nam đã được kiểm nghiệm thực tế dựa vào vóc dáng. Điều này phần nào đã giúp những quý ông thuận tiện lựa chọn hay mua quần áo online về sử dụng. Thậm chí dựa vào đó, các cô nàng cũng có thể mua quà tặng chàng trong dịp lễ đặc biệt sắp tới.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size12.png') }}" alt="size1">
                        <p>Bảng size áo nam dựa trên cân nặng và chiều cao</p>
                    </center><br>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size13.png') }}" alt="size1">
                        <p>Bảng size áo nam dựa trên những thông số của cơ thể</p>
                    </center><br>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size14.png') }}" alt="size1">
                        <p>Bảng size áo khoác nam theo cân nặng và chiều cao</p>
                    </center><br>

                    <b>2. BẢNG SIZE ÁO NỮ</b>
                    <p>Tương tự đối với nữ, các bảng size áo nữ phần lớn giúp các nàng lựa chọn ra những item phù hợp với mình nhất từ áo thun, áo khoác cho đến áo sơ mi… Tất tần tật thông số trên được tóm tắt qua các bảng size như sau.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size15.png') }}" alt="size1">
                        <p>Bảng size áo nữ dựa trên cân nặng và chiều cao</p>
                    </center><br>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size16.png') }}" alt="size1">
                        <p>Bảng size áo nữ dựa trên những thông số của cơ thể</p>
                    </center><br>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size17.png') }}" alt="size1">
                        <p>Bảng size áo khoác nữ theo cân nặng và chiều cao</p>
                    </center><br>

                    <b>3. SIZE QUẦN ÁO TRẺ EM</b>
                    <p>Khác với người lớn, tính size áo dành cho trẻ em thường sẽ không giống nhau về ký hiệu, độ tuổi lẫn chiều cao và cân nặng. Các nhà thiết kế chia quần áo trẻ em thành 2 dạng là đồ dành cho trẻ sơ sinh tức 0 – 12 tháng và đồ dành cho trẻ từ 1 đến 13 tuổi.</p>
                    <p>Dựa vào cân nặng lẫn chiều cao của bé, ba mẹ có thể chủ động lựa chọn size quần áo thích từ được đánh số từ 1 đến 12 qua bảng sau.</p>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size18.png') }}" alt="size1">
                        <p>Bảng size quần áo cho trẻ em dựa trên cân nặng và chiều cao</p>
                    </center><br>
                    <center>
                        <img width="50%" src="{{ asset('Upload/product/size19.png') }}" alt="size1">
                        <p>Bảng size quần áo cho trẻ em dựa trên cân nặng và chiều cao tại thời trang Yody Việt Nam</p>
                    </center><br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
