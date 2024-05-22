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
				Thêm bài viết
				</div>
				<div class="panel-body">
					<form class="form-horizontal" name="" method="post" action="{{ URL::to('/save-news') }}" enctype="multipart/form-data">

						{!! csrf_field() !!}

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề bài viết</label>
						<div class="col-sm-10">
							<input type="text" name='news_name' class="form-control" id="inputEmail3" placeholder="" value="">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Bài viết</label>
						<div class="col-sm-10">
						    <textarea class="form-control" rows="10" id="ckeditor" name="news_content"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh minh họa</label>
						<div class="col-sm-5">
							<input type="file" name='news_image' class="form-control" id="inputEmail3" placeholder="" value="">
						</div>
					</div>
                    <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hiển thị</label>
						<div class="col-sm-5">
							<select class="form-control" name="news_status">
								<option value='1'>Hiện</option>
								<option value='0'>Ẩn</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
						    <button type="submit" class="btn btn-primary" name="add_news">Thêm bài viết</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>

@endsection