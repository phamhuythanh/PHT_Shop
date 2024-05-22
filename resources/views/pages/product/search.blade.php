@extends('layout')
@Section('content')


<div class="container-fluid padding" style="margin-top: 50px">
    <div class="row welcome text-center">
        <div class="col-12">
            <h2>KẾT QUẢ TÌM KIẾM</h2>
        </div>
        <hr>
    </div>
</div>

<div class="menu">
    <div class="cards">
        @foreach($search_product as $key => $pro)
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
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="card-front">
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}"><img src="Upload/product/{{ $pro->product_image }} "></a>
                </div>
                <div class="card-back">
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}"><img src="Upload/product/{{ $pro->product_image2 }} "></a>
                    <div id="add-product">
                        <input type="button" value=""  class="add-to-cart" data-id_product="{{$pro->product_id}}" name="add-to-cart">
                        <span><i class="fa fa-shopping-cart"></i></span>
                    </div>
                    <div id="view-product">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
                            <span><i class="fas fa-eye"></i></span>
                        </a>
                    </div>
                    <h5 style="margin-top: -50px"><a href="{{URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">{{ $pro->product_name }}</a></h5>
                    <h5><b>{{ number_format( $pro->product_price) }} ₫</b></h5>
                </div>
            </div>
        </div>
        </form>
        @endforeach
    </div>
</div>
<div style="height: 100px"></div>


@endsection
