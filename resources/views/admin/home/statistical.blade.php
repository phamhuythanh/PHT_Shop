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
                            <svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>
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

    <div class="panel-body" style="padding:0px;">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="info">
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng nhập</th>
                        <th>Số lượng bán</th>
                        <th>Số lượng tồn kho</th>
                        <th>Giá nhập</th>
                        <th>Giá bán</th>
                        <th>Tổng nhập</th>
                        <th>Tổng bán</th>
                        <th>Lợi nhuận</th>
                    </tr>
                </thead>
                <?php
                    $i=1;
                    ?>
                <tbody>
                    @foreach($product as $key => $pro)
                    <tr>
                        <td><strong>{{ $i++}}</strong></td>
                        <td><strong ><img src="Upload/product/{{ $pro->product_image }}" height="50px" width="50px"></strong></td>
                        <td style="text-align: left"><strong>{{ $pro->product_name }}</strong></td>
                        <td><strong>{{ $pro->product_import_qty }}</strong></td>
                        <td><strong>{{ $pro->product_sold }}</strong></td>
                        <td><strong>{{ ($pro->M + $pro->S + $pro->XL)}}</strong></td>
                        <td><strong>{{ number_format($pro->product_import_price) }}</strong></td>
                        <td><strong>{{ number_format($pro->product_price) }}</strong></td>
                        <td><strong>{{ number_format(($pro->product_import_qty) * ($pro->product_import_price))  }}</strong></td>
                        <td><strong>{{ number_format(($pro->product_sold) * ($pro->product_price))  }}</strong></td>
                        <td><strong>{{ number_format(($pro->product_sold) * ($pro->product_price) -($pro->product_import_qty) * ($pro->product_import_price)) }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 text-center" id="btn-xemthem">    {{ $product->links('pagination::bootstrap-4') }}</div>
    </div>
</div>	<!--/.main-->



@endsection
