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
                <div class="col-md-8">Quản lý slider</div>
                <div class="col-md-4 text-right"><a href="{{ URL::to('/add-slider') }}" class='btn btn-info'><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới</a></div></div>
            </div>
            <p>Chỉ có thể hiển thị 4 slider!!</p>
            <div class="panel-body" style="padding:0px;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="info">
                                <th>ID</th>
                                <th>Tên slider</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Hiển thị</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                            $i=1;
                            ?>
                        <tbody>
                            @foreach($all_slide as $key => $sli)
                            <tr>
                                <td><strong>{{ $i++}}</strong></td>
                                <td><strong >{{ $sli->slider_name }}</strong></td>
                                <td><strong ><img src="Upload/slider/{{ $sli->slider_image }}" height="100" width="400"></strong></td>
                                <td><strong >{{ $sli->slider_desc }}</strong></td>

                                <td><strong >
                                    <?php
                                        if($sli->slider_status==0){
                                        ?>
                                        <a href="{{URL::to ('/unactive-slide/'.$sli->slider_id) }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

                                        <?php
                                        } else{
                                        ?>
                                            <a href="{{URL::to ('/active-slide/'.$sli->slider_id) }}"><span class="glyphicon glyphicon-ok-sign"></span></a>
                                        <?php
                                        }
                                        ?>

                                </strong></td>
                                <td class="list_td aligncenter">

                                    <a href="{{URL::to ('/delete-slide/'.$sli->slider_id) }}" title="Xóa"> <span class="glyphicon glyphicon-remove" onclick=" return confirm('Bạn chắc chắn muốn xóa?')"></span> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
