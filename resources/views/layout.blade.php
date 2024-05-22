<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- -------------SEO---------------- --}}
    {{-- <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <title>{{ $meta_title }}</title> --}}
    <title>PHTStore</title>
    <link rel="shortcut icon" href="{{ asset('Frontend/images/logo.png') }}" type="image/png">
    {{--end -------------SEO---------------- --}}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('Frontend/css/css.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/detail.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('Frontend/css/shop_detail.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('Frontend/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/lightgallery.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/lightslider.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/prettify.css') }}">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
      id="theme-styles"
    />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>

    </style>
</head>
<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <div id="top-nav" style="height: 40px;background: #212121;">
        {{-- <marquee direction="right" class="bg-color"><img src="{{ asset('Frontend/images/cat1.png') }}" height="40px">Chúc bạn một ngày mới tốt lành :)<img src="{{ asset('Frontend/images/cat1.png') }}" height="40px"></marquee>
         --}}
        <div class="container1">
            <div class="text"></div>
        </div>

    </div>

    <div class="row" style="width:100%;">
        <div class="col-8">
            <a class="navbar-branch" href="{{ URL::to('/') }}" >
               <img src="{{ asset('Frontend/images/logo.png') }}" height="70px" style="margin-left: 72%">
           </a>
        </div>
        <div class="col-4">
            <?php
                $customer_id= Session::get('customer_id');
                if($customer_id!=Null){
            ?>
            @foreach($all_customer as $key => $cus)
            @endforeach


            <li class="nav-item dropdown" style="list-style-type: none; margin-top:22px; float:right;">
                <a class="nav-link dropdown-toggle" href="{{ URL::to('/edit-customer/'.$customer_id) }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="img-cus" src="{{ asset('Upload/customer/'.$cus->customer_image) }}" height="40" width="40" style="border-radius: 30px;margin-top:-10px;">

                    <?php
                        $customer_name= session::get('customer_name');
                        if($customer_name){
                            echo $customer_name;
                        }
                    ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a href="" class="dropdown-item" style="padding: 30px 0px"></a>
                <a class="dropdown-item" href="{{ URL::to('/edit-customer/'.$customer_id) }}"><i class="far fa-user"></i> Tài khoản của tôi</a>
                <a class="dropdown-item" href="{{ URL::to('/order-customer/'.$customer_id) }}"><i class="fas fa-cart-arrow-down"></i> Đơn mua</a>
                <a class="dropdown-item" href="{{ URL::to('/logout-checkout')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                </div>
            </li>
            <?php
                }else{
            ?>
            <li class="nav-item" id="account">
                <a href="{{ URL::to('/login-checkout') }}" style="text-decoration: none;color:white"><i class="fa-solid fa-user"></i> Tài khoản</a>
            </li>
            <?php
                }
            ?>

        </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-light sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-md-9 ml-auto mr-auto">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{URL::to('/')}}" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                TRANG CHỦ
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ URL::to('/tat-ca-san-pham') }}" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                PHT
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ URL::to('/new-product') }}" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                MỚI
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                THỜI TRANG NAM
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($cate_product1 as $key => $cate1)
                                <a class="dropdown-item" href="{{URL::to('/danh-muc-san-pham/'.$cate1->category_id)}}">{{ $cate1->category_name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                THỜI TRANG NỮ
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach($cate_product2 as $key => $cate2)
                                <a class="dropdown-item" href="{{URL::to('/danh-muc-san-pham/'.$cate2->category_id)}}">{{ $cate2->category_name }}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ URL::to('/home-news') }}" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                TIN THỜI TRANG
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <form action="{{ URL::to('/tim-kiem') }}" method="POST">
                            {{ csrf_field() }}
                        <div class="search-box">
                            <input type="text" name="keywords_submit" placeholder="Search">
                            <a class="search-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input type="submit" name="form-control" value="">
                            </a>
                        </div>
                        </form>
                    </li>

                    <li class="nav-item" id="icon-top">
                        <div class="icon-cart">
                            <a href="{{ URL::to('/gio-hang-ajax') }}" style="text-decoration: none; "><i class="fa-sharp fa-solid fa-bag-shopping"></i>

                            </a>

                        </div>
                        <span id="count-qty">
                            @if(Session::get('cart')==true)
                            @php
                            $getcart = Session::get('cart');
                            $count = 0;
                            @endphp
                            @foreach($getcart as $key2 => $cart)
                            @php
                                $count += $cart['product_qty'];
                            @endphp
                            @endforeach
                            @php
                                echo($count);
                            @endphp
                            @else
                            0
                            @endif
                        </span>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')

    <div class="support">
        <a href="{{ URL::to('/about-us') }}" >
            <div id="some">
                <p>Thông tin hỗ trợ mua hàng</p>
                <i class="fas fa-question-circle"></i>
            </div>
        </a>
    </div>

    <!-- grid container -->
    <div class="row" style="margin: 0px !important">
        <div class="col-sm-3" style="padding: 0px !important">
            <article id="3685" class="location-listing">
                <a class="location-title" href="https://www.facebook.com/profile.php?id=100090235664602">Facebook</a>
                <div class="location-image">
                    <a href="#">
                      <img  src="{{ asset('Frontend/images/facebook.jpg') }}" alt="SP1">
                    </a>
                </div>
            </article>
        </div>
        <div class="col-sm-3" style="padding: 0px !important">
            <article id="3688" class="location-listing">
                <a class="location-title" href="https://www.instagram.com/">Instagram</a>
                <div class="location-image">
                  <a href="#">
                      <img src="{{ asset('Frontend/images/instagram.jpg') }}" alt="SP2">  </a>
                </div>
            </article>
        </div>
        <div class="col-sm-3" style="padding: 0px !important">
            <article id="3691" class="location-listing">
                <a class="location-title" href="https://www.tiktok.com/@kent_vn">Tiktok</a>
                <div class="location-image">
                  <a href="#">
                      <img width="300" height="169" src="{{ asset('Frontend/images/tiktok.png') }}" alt="SP3">  </a>
                </div>
            </article>
        </div>
        <div class="col-sm-3" style="padding: 0px !important">
            <article id="3700" class="location-listing">
                <a class="location-title" href="https://twitter.com/">Twitter</a>
                <div class="location-image">
                  <a href="#">
                      <img width="300" height="169" src="{{ asset('Frontend/images/unnamed.png') }}" alt="SP4">
                    </a>
                </div>
            </article>
        </div>
    </div>
    <!-- end grid container -->

    <hr>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="/"><img src="{{ asset('Frontend/images/logo.png') }}" style="height: 150px" alt=""></a>
                        </div>
                        <p>Chất lượng, uy tín tạo niềm tin.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>PHTStore.COM</h6>
                        <ul>
                            <li><a href="{{ URL::to('/about-us') }}">Giới Thiệu PHTStore</a></li>
                            <li><a href="{{ URL::to('/question') }}">Câu hỏi thường gặp</a></li>
                            <li><a href="{{ URL::to('/contact') }}">Thông tin liên hệ</a></li>
                            <li><a href="{{ URL::to('/size-notificate') }}">Hướng dẫn chọn size</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>CHÍNH SÁCH</h6>
                        <ul>
                            <li><a href="{{ URL::to('/shopping-guide') }}">Hướng dẫn mua hàng</a></li>
                            <li><a href="{{ URL::to('/privacy-policy') }}">Chính sách bảo mật</a></li>
                            <li><a href="{{ URL::to('/production-partner') }}">Đối tác sản xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>NEWSLETTER</h6>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__social">
                            <a href="https://www.facebook.com/2001kent"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright__text">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> Nguyễn Bá Tuấn</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </footer>
    <!-- Footer Section End -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('jquery-validation-1.19.5/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('Backend/js/catcherror.js') }}"></script>
    <script src="{{ asset('Frontend/js/sweetalert.js') }}"></script>
    <script src="{{ asset('Frontend/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/prettify.js') }}"></script>
    <script src="{{ asset('Frontend/js/lightslider.js') }}"></script>
    <script src="{{ asset('Frontend/js/home.js') }}"></script>
    <script src="{{ asset('Frontend/js/detail.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "117326257951334");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>

    {{-- lọc giá và a-z --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#sort').on('change',function(){
                var url = $(this).val();
                //alert (url);
                if(url){
                    window.location = url;
                }
                return false;
            })
        });
    </script>

{{-- show detail --}}
    <script>
        $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:4,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }
        });
    });
    </script>

    <script>
        $(document).ready(function(){

            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp != '' && maqh !='' && xaid !=''){
                $.ajax({
                url : '{{url('/calculate-fee')}}',
                method: 'POST',
                data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                success:function(){
                location.reload();
                }
                });
            }else{
                Swal.fire({
                icon: 'info',
                title: 'Thông báo...',
                text: 'Làm ơn chọn địa chỉ để tính phí vận chuyển !!',
                })
            }
            localStorage.setItem(key, matp);
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
            //alert(id);
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();

            var cart_product_m = $('.cart_product_qty_m_' + id).val();
            var cart_product_s = $('.cart_product_qty_s_' + id).val();
            var cart_product_xl = $('.cart_product_qty_xl_' + id).val();

            var radios = document.getElementsByName("product_size");
            if (radios.length > 0) {
                for (let i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                    // Nếu phần tử được chọn, lấy giá trị của phần tử đó và in ra
                    var cart_product_size = radios[i].value;
                    }
                }
            } else {
                var cart_product_size = $('.cart_product_size_' + id).val();
            }

            var _token = $('input[name="_token"]').val();

            //alert(cart_product_size);
            switch (cart_product_size) {
            case 'M':
            if(parseInt(cart_product_m)==0){
                Swal.fire({
                icon: 'error',
                title: 'Thông báo...',
                text: 'Size M đã hết hàng, vui lòng xem chi tiết để chọn size khác!!',
                })
            }else if(parseInt(cart_product_qty)<=0){
                Swal.fire({
                icon: 'error',
                title: 'Thông báo...',
                text: 'Số lượng nhập không đúng!!',
                })
            }
            else{
                if(parseInt(cart_product_qty)>parseInt(cart_product_m)){
                    Swal.fire({
                    icon: 'info',
                    title: 'Thông báo...',
                    text: 'Với size M làm ơn đặt hàng số lượng nhỏ hơn hoặc bằng '+ cart_product_m,
                    })
                }
                else{
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_size:cart_product_size
                            ,_token:_token, cart_product_m:cart_product_m, cart_product_s:cart_product_s,cart_product_xl:cart_product_xl},
                        success:function(){
                            //alert(data);
                            Swal.fire({
                            title: 'Thêm thành công',
                            text: 'Bạn có thể tiếp tục mua hàng hoặc đi tới giỏ hàng để tiến hành thanh toán !!',
                            icon: 'question',
                            iconHtml: '?',
                            confirmButtonText: 'Đến giỏ hàng',
                            cancelButtonText: 'Tiếp tục',
                            showCancelButton: true,
                            showCloseButton: true
                            }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{url('/gio-hang-ajax')}}";
                            }
                            })
                        }
                    });
                }
            }
            break;
            case 'S':
            if(parseInt(cart_product_qty)>parseInt(cart_product_s)){
                Swal.fire({
                    icon: 'info',
                    title: 'Thông báo...',
                    text: 'Với size S làm ơn đặt hàng số lượng nhỏ hơn hoặc bằng '+ cart_product_s,
                })
            }else if(parseInt(cart_product_qty)<=0){
                Swal.fire({
                icon: 'error',
                title: 'Thông báo...',
                text: 'Số lượng nhập không đúng!!',
                })
            }
            else{
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_size:cart_product_size
                        ,_token:_token, cart_product_m:cart_product_m, cart_product_s:cart_product_s,cart_product_xl:cart_product_xl},
                    success:function(){
                        //alert(data);
                        Swal.fire({
                        title: 'Thêm sản phẩm thành công',
                        text: 'Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán',
                        icon: 'question',
                        iconHtml: '?',
                        confirmButtonText: 'Đến giỏ hàng',
                        cancelButtonText: 'Tiếp tục',
                        showCancelButton: true,
                        showCloseButton: true
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{url('/gio-hang-ajax')}}";
                        }
                        })
                    }
                });
            }
            break;
            default:
            if(parseInt(cart_product_qty)>parseInt(cart_product_xl)){
                Swal.fire({
                icon: 'info',
                title: 'Thông báo...',
                text: 'Với size XL làm ơn đặt hàng số lượng nhỏ hơn hoặc bằng '+ cart_product_xl,
                })
            }else if(parseInt(cart_product_qty)<=0){
                Swal.fire({
                icon: 'error',
                title: 'Thông báo...',
                text: 'Số lượng nhập không đúng!!',
                })
            }
            else{
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,cart_product_size:cart_product_size
                        ,_token:_token, cart_product_m:cart_product_m, cart_product_s:cart_product_s,cart_product_xl:cart_product_xl},
                    success:function(){
                        //alert(data);
                        Swal.fire({
                        title: 'Thêm sản phẩm thành công',
                        text: 'Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán',
                        icon: 'question',
                        iconHtml: '?',
                        confirmButtonText: 'Đến giỏ hàng',
                        cancelButtonText: 'Tiếp tục',
                        showCancelButton: true,
                        showCloseButton: true
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{url('/gio-hang-ajax')}}";
                        }
                        })
                    }
                });
            }
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-checkout').click(function(){
            //lay ra product id
            cart_product_id = [];
            $("input[name='cart_product_id']").each(function(){
                cart_product_id.push($(this).val());
            });
            //lay ra session_id
            cart_session = [];
            $("input[name='cart_session']").each(function(){
                cart_session.push($(this).val());
            });
            //lay ra product size
            cart_product_size = [];
            $("input[name='cart_product_size']").each(function(){
                cart_product_size.push($(this).val());
            });

            //alert(cart_product_size);
            j = 0;
            for(i=0;i<cart_product_id.length;i++){
                var qty_storage_m = $('.qty_storage_m_' + cart_product_id[i]).val();
                var qty_storage_s = $('.qty_storage_s_' + cart_product_id[i]).val();
                var qty_storage_xl = $('.qty_storage_xl_' + cart_product_id[i]).val();

                var qty = $('.qty_' + cart_session[i]).val();
                var cart_size = $('.cart_size_' + cart_product_size[i]).val();
                //alert(qty);
                switch (cart_size) {
                case 'M':
                    if(parseInt(qty)>parseInt(qty_storage_m)){
                            j = j + 1;
                            if(j==1){
                                Swal.fire({
                                icon: 'info',
                                title: 'Thông báo...',
                                text: 'Số lượng hàng tồn của sản phẩm không đủ, vui lòng cập nhật lại số lượng!!',
                                })
                            }
                            $('.color_qty_'+cart_session[i]).css('background','#F0E68C');
                        }
                    break;
                case 'S':
                    if(parseInt(qty)>parseInt(qty_storage_s)){
                            j = j + 1;
                            if(j==1){
                                Swal.fire({
                                icon: 'info',
                                title: 'Thông báo...',
                                text: 'Số lượng hàng tồn của sản phẩm không đủ, vui lòng cập nhật lại số lượng!!',
                                })
                            }
                            $('.color_qty_'+cart_session[i]).css('background','#F0E68C');
                        }
                    break;
                default:
                    if(parseInt(qty)>parseInt(qty_storage_xl)){
                            j = j + 1;
                            if(j==1){
                                Swal.fire({
                                icon: 'info',
                                title: 'Thông báo...',
                                text: 'Số lượng hàng tồn của sản phẩm không đủ, vui lòng cập nhật lại số lượng!!',
                                })
                            }
                            $('.color_qty_'+cart_session[i]).css('background','#F0E68C');
                        }
                }
            }if(j==0){
                window.location.href = "{{url('/checkout')}}";
            }
        });
    });
</script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#gui').click(function(){
                var check_name = $('.shipping-name').val();
                var check_phone = $('.shipping-phone').val();
                var check_address = $('.shipping-address').val();

                Swal.fire({
                title: 'Xác nhận đặt hàng?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đặt hàng',
                cancelButtonText: 'Hủy'
                }).then((result) => {
                if (result.isConfirmed) {
                    if(check_name != '' && check_phone != ''&& check_address != ''){
                        Swal.fire(
                        'Thông báo!',
                        'Đặt hàng thành công!',
                        'success'
                        )
                        document.querySelector('#form-gui').submit();
                    }else{
                        Swal.fire(
                        'Thông báo!',
                        'Nhập đủ thông tin giao hàng!',
                        'succes'
                        )
                        document.querySelector('#form-gui').button();
                    }
                }
                })
            });
        });
    </script>

    {{-- //luôn giữ active khi chọn option --}}
    <script type="text/javascript">
        $(document).ready(function(){
            var active = location.search; //?kytu=asc
            $('#sort option[value="'+active+'"]').attr('selected', 'selected');
            // alert (active);
        });
    </script>
</body>

</html>
