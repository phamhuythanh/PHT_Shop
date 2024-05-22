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
				Sửa bài viết
				</div>
				<div class="panel-body">
                    @foreach($edit_news as $key => $edit)
					<form class="form-horizontal" name="" method="post" action="{{ URL::to('/update-news/'.$edit->news_id) }}" enctype="multipart/form-data">

						{!! csrf_field() !!}
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề bài viết</label>
						<div class="col-sm-10">
							<input type="text" name='news_name' class="form-control" id="inputEmail3" placeholder="" value="{{ $edit->news_name }}">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Bài viết</label>
						<div class="col-sm-10">
						    <textarea class="form-control" rows="10" id="ckeditor" name="news_content">{!! $edit->news_content !!}</textarea>
						</div>
					</div>
                    <div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh minh họa</label>
						<div class="col-sm-5">
							<input type="file" name='news_image' class="form-control" id="inputEmail3" placeholder="" value="">
                            <img src="{{ URL::to('Upload/news/'.$edit->news_image ) }}" height="100px" width="100px">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-5">
						    <button type="submit" class="btn btn-primary" name="add_news">Cập nhật bài viết</button>
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
