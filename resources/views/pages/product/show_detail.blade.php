@extends('layout')
@Section('content')
<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
                <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
                <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
                <li>
                    @foreach($category_name as $key => $name)
                    <a href="{{URL::to('/danh-muc-san-pham/'.$name->category_id)}}">
                        {{ $name->category_name }}
                        <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i>
                    </a>
                    @endforeach
                </li>
                <li><a href="">
                    @foreach($product_name as $key => $pro_n)
                    {{ $pro_n->product_name }}
                    @endforeach
                </a></li>
            </ul>
       </div>
    </div>
</div>

@if(Session::get('cart')==true)
    @php
            $total = 0;
            $getcart = Session::get('cart');
    @endphp
    @foreach($getcart as $key => $cart)
        @php
            $subtotal = $cart['product_price']*$cart['product_qty'];
            $total+=$subtotal;
        @endphp

    <input type="hidden" name="cart_product_id" class="cart_product_id" value="{{$cart['product_id']}}">
    <input type="hidden" name="cart_session" class="cart_session" value="{{$cart['session_id']}}">
    <input type="hidden" class="qty_{{$cart['session_id']}}" value="{{$cart['product_qty']}}" name="cart_product_quantity">

    <input type="hidden" value="{{$cart['product_size']}}" class="cart_product_size" name="cart_product_size">
    <input type="hidden" value="{{$cart['product_size']}}" class="cart_size_{{$cart['product_size']}}" name="cart_size">

    <input type="hidden" name="qty_storage_m" class="qty_storage_m_{{$cart['product_id']}}" value="{{$cart['product_qty_m']}}">
    <input type="hidden" name="qty_storage_s" class="qty_storage_s_{{$cart['product_id']}}" value="{{$cart['product_qty_s']}}">
    <input type="hidden" name="qty_storage_xl" class="qty_storage_xl_{{$cart['product_id']}}" value="{{$cart['product_qty_xl']}}">

    @endforeach
@endif

@foreach($product_detail as $key =>$value)
<form style="margin-bottom:30px">
    @csrf
    <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
    <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
    <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
    <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">

    <input type="hidden" value="{{$value->M}}" class="cart_product_qty_m_{{$value->product_id}}">
    <input type="hidden" value="{{$value->S}}" class="cart_product_qty_s_{{$value->product_id}}">
    <input type="hidden" value="{{$value->XL}}" class="cart_product_qty_xl_{{$value->product_id}}">

<!-- body shop -->
<div class="pd-wrap">
    <div class="cards1" id="cards-detail">
        <div class="img-shop-detail">
            <style>
                li.active{
                    border: 5px solid sandybrown;
                }
                .radio-label {
                    position: relative;
                }

                .toolti {
                    visibility: hidden;
                    background-color: #333;
                    color: #ffffff;
                    text-align: center;
                    position: absolute;
                    z-index: 5;
                    top:50px;
                    font-size: 14px;
                }

                .radio-label:hover .toolti {
                    visibility: visible;
                }
            </style>

            <ul id="imageGallery">
                @foreach($gallery as $key => $gal)
                <li data-thumb="{{ asset('Upload/gallery/'.$gal->gallery_image) }}" data-src="{{ asset('Upload/gallery/'.$gal->gallery_image) }}">
                  <img width="100%" alt="{{ $gal->gallery_name }}" style="max-height:600px;" src="{{ asset('Upload/gallery/'.$gal->gallery_image) }}" />
                </li>
                @endforeach
            </ul>
        </div>


        <div class="shop-detail">
            <p>{{ $value->product_name }}</p>
            <div style="border-bottom: 4px solid black; width:100px; margin-bottom:30px"></div>

            <span>Mã SP: {{ $value->product_id }}</span><br>
            <span>Danh mục: {{ $value->category_name }}</span><br>

                <br>
            <p style="color:rgba(255, 0, 0, 0.771);">{{ number_format($value->product_price) }} ₫</p>

            <span>Size</span>
            <div class="size-selector">
                <div class="radio-buttons">
                @if($value->M>0)
                  <label class="radio-label">
                    <input type="radio" name="product_size" checked value="M">
                    <span>M</span>
                    <span class="toolti">Tồn {{ $value->M }}</span>
                  </label>

                @endif
                @if($value->S>0)
                  <label class="radio-label">
                    <input type="radio" name="product_size" value="S">
                    <span>S</span>
                    <span class="toolti">Tồn {{ $value->S }}</span>
                  </label>

                @endif
                @if($value->XL>0)
                  <label class="radio-label">
                    <input type="radio" name="product_size" value="XL">
                    <span>XL</span>
                    <span class="toolti">Tồn {{ $value->XL }}</span>
                  </label>
                @endif
                </div>
                <span style="margin-left: 10px; margin-top:22px">
                    <a href="{{ URL::to('/size-notificate') }}" >Tư vấn chọn size</a>
                </span>
            </div>
            <br><br>
            <p>Số lượng</p>

            <div class="container-input">
                <div class="quantity">
                    <button class="minus-btn" type="button">-</button>
                    <input name="qty" id="input_quantity1" type="number" min="1" class="cart_product_qty_{{$value->product_id}}" value="1">
                    <button class="plus-btn" type="button">+</button>
                </div>
                <input style="opacity: 1; margin-left:20px; width:200px; position:relative;" type="button" value="Thêm vào giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
            </div>

            <input name="productid_hidden" type="hidden" value="{{ $value->product_id }}">
            <br><br>
            <div id="shield">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                    <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                </svg>
                <span> Cam kết 100% hàng chính hãng</span><br><br>

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
                <span> Giao hàng đúng hạn</span><br><br>

                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                </svg>
                <span> Đổi trả trong vòng 7 ngày</span>
            </div>

        </div>
    </div>
<div class="product-info-tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Chi tiết</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="danhgiasp" data-toggle="tab" href="#danhgia" role="tab" aria-controls="review" aria-selected="false">Bình luận</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
        <p>🍉 THÔNG TIN SẢN PHẨM:<br>
            {!! $value->product_content !!}
        </p>
        </div>

        <div class="tab-pane fade" id="danhgia" role="tabpanel" aria-labelledby="description-tab">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0&appId=5372383886195743&autoLogAppEvents=1" nonce="WoR3tph5"></script>

            <div class="fb-comments" data-href="{{ $url_canonical }}" data-width="" data-numposts="10"></div>
        </div>
    </div>
        </div>
</div>

<div class="container-fluid padding">
    <div class="row welcome text-center">
        <div class="col-12">
            <h5>SẢN PHẨM CÙNG LOẠI</h5>
        </div>
        <hr>
    </div>
</div>



<div class="parent">
    @foreach($relate as $key => $lienquan)
    <div class="wap-ss-img-lienquan">
        <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}"><img class="img-big" width="275px" height="275px" src="{{ asset('Upload/product/'.$lienquan->product_image) }}"></a>
        <div class="textleft">
            <div style="margin-top:10px; width:280px; height:70px">{{ $lienquan->product_name }}<a href="#"></a></div>

            <div><b>{{ number_format($lienquan->product_price) }} ₫</b></div>
        </div>
    </div>
    @endforeach
</div>

</form>
@endforeach



@endsection

