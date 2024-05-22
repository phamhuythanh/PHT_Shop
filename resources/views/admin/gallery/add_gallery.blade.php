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
				Thêm thư viện ảnh
				</div>

				<form action="{{ url('/insert-gallery/'.$pro_id) }}" method="POST" enctype="multipart/form-data">
					@csrf
				<div class="row">
					<div class="col-md-3" align="right">

					</div>
					<div class="col-md-6">
						<input type="file" id="file" class="form-control" name="file[]" accept="image/*" multiple>
						<span id="error_gallery"></span>
					</div>
					<div class="col-md-3" >
						<input type="submit" value="Tải ảnh" name="upload" class="btn btn-success">
					</div>
				</div>
				</form>

				<div class="panel-body">
					<input type="hidden" value="{{ $pro_id }}" name="pro_id" class="pro_id">
					<form>
						@csrf
						<div id="gallery_load"> 
							
						</div>
					</form>
				</div>

			</div>
		</div>
	</div><!--/.row-->
</div>

@endsection