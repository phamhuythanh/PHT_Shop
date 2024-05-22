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
				Thêm danh mục
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="" method="post" action="{{ URL::to('/save-category-product') }}">

						{!! csrf_field() !!}

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
						<div class="col-sm-5">
							<input type="text" name='category_product_name' class="form-control" id="inputEmail3" placeholder="" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Mô tả</label>
						<div class="col-sm-8">
						<textarea class="form-control" rows="3" name="category_product_desc"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Danh mục cha</label>
						<div class="col-sm-5">
							<select class="form-control" name="category_product_rank">
								<option value="1">Thời trang nam</option>
								<option value="2">Thời trang nữ</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hiển thị</label>
						<div class="col-sm-5">
							<select class="form-control" name="category_product_status">
								<option value='0'>Hiện</option>
								<option value='1'>Ẩn</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
						<button type="submit" class="btn btn-primary" name="add_category_product">Thêm mới</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>

@endsection