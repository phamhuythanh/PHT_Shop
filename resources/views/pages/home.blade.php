@extends('layout')
@Section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-height:600px">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">

        </li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1">

        </li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2">

        </li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3" >

        </li>
    </ol>
    <div class="carousel-inner">
        @php
        $i = 0;
        @endphp
        @foreach($slider as $key => $slide)
            @php
                $i++;
            @endphp
            <div class="carousel-item {{$i==1 ? 'active' : '' }}">
                <div class="col-sm-12">
                    <img alt="{{$slide->slider_desc}}" src="{{asset('Upload/slider/'.$slide->slider_image)}}" width="100%" >

                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row" id="botton-carousel">
    <div class="col-4 text-center botton-carousel">
        <p>
            <i class="fas fa-truck"></i>
            <span>Đồng giá ship với nhiều đơn hàng</span>
        </p>
    </div>
    <div class="col-4 text-center botton-carousel">
        <p>
            <i class="fas fa-repeat"></i>
            <span>Đổi trả trong vòng 7 ngày</span>
        </p>
    </div>
    <div class="col-4 text-center botton-carousel">
        <p>
            <i class="fas fa-medkit"></i>
            <span>Hỗ trợ trực tuyến 24/7</span>
        </p>
    </div>
</div>

<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="{{ asset('Upload/product/banner-1.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Xu hướng thời trang 2023</h2>
                        <a href="{{ URL::to('/tat-ca-san-pham') }}">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="{{ asset('Upload/product/dalat.png') }}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Tin tức thời trang mới nhất</h2>
                        <a href="{{URL::to('/home-news')}}">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic">
                        <img src="{{ asset('Upload/product/banner-6.jpg') }}" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Hàng mới về</h2>
                        <a href="{{ URL::to('/new-product') }}">Xem ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="all-product">
    <h1 style="font-family: Arial, Helvetica, sans-serif">SẢN PHẨM MỚI</h1>
    <center><p style="width:100px; border-top:5px solid #7fad39; margin-top:20px;"></p></center>

    <div class="list">
        @foreach($all_product_new as $key => $prod)
            <form style="margin-bottom:30px">
                @csrf
                <input type="hidden" value="{{$prod->product_id}}" class="cart_product_id_{{$prod->product_id}}">
                <input type="hidden" value="{{$prod->product_name}}" class="cart_product_name_{{$prod->product_id}}">
                <input type="hidden" value="{{$prod->product_image}}" class="cart_product_image_{{$prod->product_id}}">
                <input type="hidden" value="{{$prod->product_price}}" class="cart_product_price_{{$prod->product_id}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$prod->product_id}}">
                <input type="hidden" value="M" class="cart_product_size_{{$prod->product_id}}">
                <input type="hidden" value="{{$prod->M}}" class="cart_product_qty_m_{{$prod->product_id}}">
                <input type="hidden" value="{{$prod->S}}" class="cart_product_qty_s_{{$prod->product_id}}">
                <input type="hidden" value="{{$prod->XL}}" class="cart_product_qty_xl_{{$prod->product_id}}">
            </form>
        <div class="product">
            <img src="Upload/product/{{ $prod->product_image2 }} ">
            <div>
                <h5><b>{{ $prod->product_name }}</b></h5>
                    <p class="price">{{ number_format( $prod->product_price) }} ₫</p><br>
                <a id="a1" href="{{URL::to('/chi-tiet-san-pham/'.$prod->product_id)}}">
                    <p>Xem chi tiết</p>
                </a>
                <a id="a2" type="button" class="add-to-cart" data-id_product="{{$prod->product_id}}" name="add-to-cart">
                    <p>Thêm vào giỏ hàng</p>
                </a>
            </div>
        </div>

        @endforeach
    </div>
</section>

<div class="col-12 text-center" id="btn-xemthem">
    <a href="{{URL::to('/new-product')}}">
        <button type="button" class="btn btn-outline-primary">XEM THÊM</button>
    </a>
</div>

<section id="all-product">
    <h1 style="font-family: Arial, Helvetica, sans-serif">SẢN PHẨM BÁN CHẠY</h1>
    <center><p style="width:100px; border-top:5px solid #7fad39; margin-top:20px;"></p></center>

    <div class="list">
        @foreach($all_product as $key => $pro)
            <form style="margin-bottom:30px">
                @csrf
                <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_name}}" class="cart_product_name_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_image}}" class="cart_product_image_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_price}}" class="cart_product_price_{{$pro->product_id}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">
                <input type="hidden" value="M" class="cart_product_size_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->M}}" class="cart_product_qty_m_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->S}}" class="cart_product_qty_s_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->XL}}" class="cart_product_qty_xl_{{$pro->product_id}}">
            </form>
        <div class="product">
            <img src="Upload/product/{{ $pro->product_image2 }} ">
            <div>
                <h5><b>{{ $pro->product_name }}</b></h5>
                    <p class="price">{{ number_format( $pro->product_price) }} ₫</p><br>
                <a id="a1" href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
                    <p>Xem chi tiết</p>
                </a>
                <a id="a2" type="button" class="add-to-cart" data-id_product="{{$pro->product_id}}" name="add-to-cart">
                    <p>Thêm vào giỏ hàng</p>
                </a>
            </div>
        </div>

        @endforeach
    </div>
</section>

<div class="col-12 text-center" id="btn-xemthem">
    <a href="{{URL::to('/tat-ca-san-pham')}}">
        <button type="button" class="btn btn-outline-primary">XEM THÊM</button>
    </a>
</div>

@endsection
