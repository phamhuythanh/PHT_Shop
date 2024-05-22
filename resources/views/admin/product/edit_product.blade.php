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

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
				Cập nhật sản phẩm
				</div>
				<div class="panel-body">
                    @foreach($edit_product as $key => $pro)
					<form class="form-horizontal" name="" method="post" action="{{ URL::to('/update-product/'.$pro->product_id) }}" enctype="multipart/form-data">

						{!! csrf_field() !!}

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
						<div class="col-sm-5">
							<input type="text" name='product_name' class="form-control" id="inputEmail3" placeholder="" value="{{ $pro->product_name }}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Giá nhập sản phẩm</label>
						<div class="col-sm-5">
							<input type="text" name='product_import_price' class="form-control" id="inputEmail3" placeholder="" value="{{ $pro->product_import_price }}">
						</div>
					</div>
                    <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Giá bán sản phẩm</label>
						<div class="col-sm-5">
							<input type="text" name='product_price' class="form-control" id="inputEmail3" placeholder="" value="{{ $pro->product_price }}">
						</div>
					</div>
                    <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh mặt 1</label>
						<div class="col-sm-5">
							<input type="file" name='product_image' class="form-control" id="inputEmail3" placeholder="" value="">
                            <img src="{{ URL::to('Upload/product/'.$pro->product_image ) }}" height="100px" width="150px">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh mặt 2</label>
						<div class="col-sm-5">
							<input type="file" name='product_image2' class="form-control" id="inputEmail3" placeholder="" value="">
                            <img src="{{ URL::to('Upload/product/'.$pro->product_image2 ) }}" height="100px" width="150px">
						</div>
					</div>
                    <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Chi tiết</label>
						<div class="col-sm-8">
						<textarea class="form-control" rows="3" id="ckeditor1" name="product_content">{{ $pro->product_content }}</textarea>
						</div>
					</div>
					<div class="form-group">
                        <label for="inputEmail4" class="col-sm-2 control-label">Chi tiết số lượng</label>
						<label for="inputEmail3" class="col-lg-1" style="margin-top: 10px;text-align: right">M</label>
						<div class="col-lg-1">
							<input type="text" name='M' class="form-control" id="inputEmail3" placeholder="M" value="{{ $pro->M }}">
						</div>
						<label for="inputEmail3" class="col-lg-1" style="margin-top: 10px;text-align: right">S</label>
						<div class="col-lg-1">
							<input type="text" name='S' class="form-control" id="inputEmail3" placeholder="S" value="{{ $pro->S }}">
						</div>
						<label for="inputEmail3" class="col-lg-1" style="margin-top: 10px;text-align: right">XL</label>
						<div class="col-lg-1">
							<input type="text" name='XL' class="form-control" id="inputEmail3" placeholder="XL" value="{{ $pro->XL }}">
						</div>
						<input type="hidden" value="{{ $pro->M }}" name="qty_m">
						<input type="hidden" value="{{ $pro->S }}" name="qty_s">
						<input type="hidden" value="{{ $pro->XL }}" name="qty_xl">
					</div>
                    <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Danh mục sản phẩm</label>
						<div class="col-sm-5">
							<select class="form-control" name="product_cate">
								@foreach($cate_product as $key => $cate)
                                    @if($cate->category_id == $pro->category_id)
								        <option selected value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @else
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endif
                                @endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hiển thị</label>
						<div class="col-sm-5">
							<select class="form-control" name="product_status">
								<option value='0'>Hiện</option>
								<option value='1'>Ẩn</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
						<button type="submit" class="btn btn-primary" name="add_product">Cập nhật</button>
						</div>
					</div>
					</form>
                    @endforeach
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>

@endsection
