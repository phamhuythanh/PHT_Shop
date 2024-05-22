@extends('layout_admin')
@Section('content_admin')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Quản trị</li>
        </ol>
    </div><!--/.row-->

    <?php
	$message= Session::get('message');
	if($message){
		echo '<span style="color:blue;">'.$message.'</span>';
		Session::put('message',null);
	}
	?>

    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="col-md-4">Quản lý sản phẩm</div>
                <div class="col-md-4">
                    <div class="input-group rounded">
                        <form action="{{ URL::to('/search-product') }}" method="POST">
                            @csrf
                            <input type="search" name="keywords_submit" class="form-control rounded" placeholder="Tìm kiếm sản phẩm" aria-label="Search" aria-describedby="search-addon" />
                        </form>
                    </div>
                </div>
                <div class="col-md-4 text-right"><a href="{{ URL::to('/add-product') }}" class='btn btn-info'><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới</a></div></div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="info">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh mặt 1</th>
                                <th>Hình ảnh mặt 2</th>
                                <th>Danh mục</th>
                                <th>Giá</th>
                                <th>Size</th>
                                <th>Hiển thị</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1;
                            ?>
                            @foreach($all_product as $key => $pro)
                            <tr>
                                <td><strong>{{ $i++}}</strong></td>
                                <td style="text-align: left !important">
                                    <strong>{{ $pro->product_name }}</strong>
                                    <p>Đã bán: {{ $pro->product_sold }}</p>
                                    <a href="{{url('/add-gallery/'.$pro->product_id) }}"><button type="button" class="btn btn-success">Thêm thư viện</button></a>
                                </td>
                                <td><strong ><img src="Upload/product/{{ $pro->product_image }}" height="100px" width="100px"></strong></td>
                                <td><strong ><img src="Upload/product/{{ $pro->product_image2 }}" height="100px" width="100px"></strong></td>
                                <td><strong>{{ $pro->category_name }}</strong></td>
                                <td><strong >{{ number_format($pro->product_price) }}</strong></td>
                                <td>
                                    <strong >M:{{ $pro->M }}</strong><br>
                                    <strong>S:{{ $pro->S }}</strong><br>
                                    <strong>XL:{{ $pro->XL }}</strong>
                                </td>

                                <td><strong >
                                    <?php
                                        if($pro->product_status==0){
                                        ?>
                                        <a href="{{URL::to ('/unactive-product/'.$pro->product_id) }}"><span class="glyphicon glyphicon-check"></span></a>

                                        <?php
                                        } else{
                                        ?>
                                            <a href="{{URL::to ('/active-product/'.$pro->product_id) }}"><span class="glyphicon glyphicon-unchecked"></span></a>
                                        <?php
                                        }
                                        ?>

                                </strong></td>
                                <td class="list_td aligncenter">
                                    <a href="{{URL::to ('/edit-product/'.$pro->product_id) }}" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{URL::to ('/delete-product/'.$pro->product_id) }}" title="Xóa"> <span class="glyphicon glyphicon-remove" onclick=" return confirm('Bạn chắc chắn muốn xóa?')"></span> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 text-center" id="btn-xemthem">    {{ $all_product->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
