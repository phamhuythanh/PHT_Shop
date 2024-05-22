@extends('layout_admin')
@Section('content_admin')


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Quản trị</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Trang chủ</h1>
        </div>
    </div><!--/.row-->
    
    <div class="row">
        <a href="{{url('/statistical')}}">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">Thống kê báo cáo</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href="{{url('/sell-product')}}">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">Sản phẩm bán chạy</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href="{{url('/product-inventory')}}">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">Sản phẩm tồn kho</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href="{{ url('/filter-by-date') }}">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">Biểu đồ doanh thu</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
    </div><!--/.row-->
   
</div>	<!--/.main-->

@endsection