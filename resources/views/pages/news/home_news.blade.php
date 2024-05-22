@extends('layout')
@Section('content')
<style>
    .banner__item__pic img{
        height: 320px;
        width: 320px;
    }
    .blog__item{
        margin-bottom: 50px;
    }
    .banner__item__text{
        max-width: 270px;
    }
</style>

<img src="{{ asset('Upload/slider/breadcrumb-bg.jpg') }}" alt="" width="100%" height="350px">

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            @foreach($all_news as $key => $all)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__text">
                        <div class="banner__item" >
                            <div class="banner__item__pic">
                                <img src="{{ asset('Upload/news/'.$all->news_image) }}" alt="">
                            </div>
                            <div class="banner__item__text" style="background: rgb(213, 181, 181);padding:10px 30px">
                                <p><b>{{ $all->news_name }}</b></p>
                                <a href="{{ URL::to('/news-detail/'.$all->news_id) }}">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection
