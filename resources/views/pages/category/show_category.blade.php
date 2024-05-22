@extends('layout')
@Section('content')

<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li>
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ <i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </a></li>
             <li> <a href="">
                @foreach($category_name as $key => $name)
                {{ $name->category_name }}
                @endforeach
            </a></li>
          </ul>
       </div>
    </div>
</div>

<!-- body shop -->
<section id="all-product">
    <h1>
        @foreach($category_name as $key => $name)
        {{ $name->category_name }}
        @endforeach
    </h1>
    <center><p style="width:100px; border-top:5px solid #7fad39; margin-top:20px;"></p></center>
    <div style="margin-left: 6%">
        <form>
            @csrf
        <select class="form-control" id="sort">
          <option value="">Sắp xếp</option>
          <option value="?sort_by=tang_dan">Giá: Tăng dần</option>
          <option value="?sort_by=giam_dan">Giá: Giảm dần</option>
          <option value="?sort_by=kitu_az">Tên: A-Z</option>
          <option value="?sort_by=kitu_za">Tên: Z-A</option>
        </select>
        </form>
    </div>

    <div class="list">
        @foreach($category_by_id as $key => $pro)
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
            <img src="{{ URL::to('Upload/product/'. $pro->product_image2 )}} " >
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
    <div class="col-12 text-center" id="btn-xemthem" style="margin: 0px; padding: 0 0 50px;">    {{ $category_by_id->links('pagination::bootstrap-4') }}</div>
</section>

@endsection
