@extends('layout')
@Section('content')

<div class="breadcrumb-back">
    <div class="container breadcrumb-container">
       <div class="breadcrumb-row clearfix">
          <ul class="breadcrumb">
             <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> </a></li> 
             <li><span><i style="margin: 0 5px; font-size:10px;" class="fas fa-chevron-right"></i> </span></li>
             <li><a href="{{ URL::to('/') }}">Trang chủ </a></li>
          </ul>
       </div>
    </div>
</div>



<div style="text-align: center; margin:100px;">
    <h4>Không có sản phẩm!</h4>
    <div class="col-12 text-center" id="btn-xemthem" >
        <a href="{{URL::to('/tat-ca-san-pham')}}">
            <button type="button" class="btn btn-outline-primary" style="font-size: 14px">Tiếp tục mua</button>
        </a>    
    </div>
</div>

@endsection