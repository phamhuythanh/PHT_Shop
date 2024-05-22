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
    <style>
        img{
            max-height: 100px;
        }
    </style>

    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading"">
                <div class="col-md-8">Quản lý bài viết</div>
                <div class="col-md-4 text-right"><a href="{{ URL::to('/add-news') }}" class='btn btn-info'><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới</a></div></div>

            <div class="panel-body" style="padding:0px;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="info">
                                <th>STT</th>
                                <th>Hình ảnh minh họa</th>
                                <th>Tên bài viết</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <?php
                            $i=1;
                            ?>
                        <tbody>
                            @foreach($all_news as $key => $all)
                            <tr>
                                <td><strong>{{ $i++}}</strong></td>
                                <td><strong ><img src="Upload/news/{{ $all->news_image }}" height="100px" width="100px"></strong></td>
                                <td style="text-align: left;"><strong >{{ $all->news_name }}</strong></td>
                                <td style="text-align: left;"><strong>{!! Str::limit($all->news_content, 450, '...') !!}</strong></td>
                                <td><strong >
                                    <?php
                                        if($all->news_status==1){
                                        ?>
                                        <a href="{{URL::to ('/unactive-news/'.$all->news_id) }}"><span class="glyphicon glyphicon-check"></span></a>

                                        <?php
                                        } else{
                                        ?>
                                            <a href="{{URL::to ('/active-news/'.$all->news_id) }}"><span class="glyphicon glyphicon-unchecked"></span></a>
                                        <?php
                                        }
                                        ?>

                                </strong></td>
                                <td class="list_td aligncenter">
                                    <a href="{{URL::to ('/edit-news/'.$all->news_id) }}" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{URL::to ('/delete-news/'.$all->news_id) }}" title="Xóa"> <span class="glyphicon glyphicon-remove" onclick=" return confirm('Bạn chắc chắn muốn xóa?')"></span> </a>
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
