@extends('layout_admin')
@Section('content_admin')

<style>
    #myChart{
      width: 60% !important;
      height: 60% !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

<div style="margin-left: 300px; margin-top:50px">
    <form method="GET" action="{{ URL::to('/filter-by-date') }}">
        <div class="col-md-2">
            @if(isset($startDate))
            <p>Từ ngày: <input type="text" id="datepicker" name="datepicker3" class="form-control" value="{{ $startDate }}"></p>
            @else
            <p>Từ ngày: <input type="text" id="datepicker" name="datepicker3" class="form-control"></p>
            @endif      
            <input type="submit" id="btn-dashboard-filter"  class="btn btn-primary btn-sm btn-dashboard-filter" value="Lọc kết quả"></p>
        </div>
        <div class="col-md-2">
            @if(isset($endDate))
            <p>Đến ngày: <input type="text" id="datepicker2" name="datepicker4" class="form-control" value="{{ $endDate }}"></p>
            @else
            <p>Đến ngày: <input type="text" id="datepicker2" name="datepicker4" class="form-control" ></p>
            @endif
        </div>
    </form>
</div>

<div class="col-md-12" style="padding-bottom: 50px">
    <center><h2>Biểu đồ thống kê theo ngày</h2></center>
    <center>
      <canvas id="myChart"></canvas>
    </center>
</div>




<script>
    var data = @json($data);
    var labels = data.map(function(item) {
        return item.date;
    });
    var values = data.map(function(item) {
        return item.total;
    });

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        // bar, line, area, pie, bubble
        type: 'line', 
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu',
                data: values,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection