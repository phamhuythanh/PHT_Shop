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
				Thêm slider
				</div>
				<div class="panel-body">
					<form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
					<div class="form-group">
						<label for="exampleInputEmail1">Tên slide</label>
						<input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Hình ảnh</label>
						<input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Mô tả slider</label>
						<textarea style="resize: none" rows="8" class="form-control" name="slider_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Hiển thị</label>
						  <select name="slider_status" class="form-control input-sm m-bot15">
								<option value="0">Hiển thị slider</option>
								<option value="1">Ẩn slider</option>
								
						</select>
					</div>
				   
					<button type="submit" name="add_slider" class="btn btn-info">Thêm slider</button>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>

@endsection

