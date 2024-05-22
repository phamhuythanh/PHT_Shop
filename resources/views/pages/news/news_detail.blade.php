@extends('layout')
@Section('content')

<style>
    .navbar-branch img{
        width: 106px !important;
    }
    #img-cus{
        width: 40px !important;
    }
    .footer__logo img{
        width: 150px !important;
    }
    img{
        width: 100% !important;
    }
</style>
@foreach($all_news as $key => $value)
<div class="row row-demo-grid" style="width:100%; padding:50px">
    <div class="col-md-9">
        <h2 style="font-family:Arial, Helvetica, sans-serif"><b>{{ $value->news_name }}</b></h2>
        @foreach($time as $key => $ti)
        <p style="padding-bottom: 20px; border-bottom:1px solid black; ">{{ $ti->date }}</p>
        @endforeach
        <span ><p style="margin-top:50px" id="content">{!! $value->news_content !!}</p></span>
    </div>
    <div class="col-md-3 ml-auto" style="padding-right: 0px">
        <h4 style="font-family:Arial, Helvetica, sans-serif"><b>Bài viết mới</b></h4>
        @foreach($related_news as $key => $related)
        <div style="display: flex; padding:10px 0px">
            <div class="col-5">
                <img src="{{ asset('Upload/news/'.$related->news_image) }}" alt="">
            </div>
            <div class="col-7" style="padding: 0px">
                <a href="{{ URL::to('/news-detail/'.$related->news_id) }}"><b>{{ $related->news_name }}</b></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach

@endsection
