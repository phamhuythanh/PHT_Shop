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
            <div class="panel-heading"">
                <div class="col-md-8">Quản lý danh mục</div>
                <div class="col-md-4 text-right"><a href="{{ URL::to('/add-category-product') }}" class='btn btn-info'><svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới</a></div></div>
            
            <div class="panel-body" style="padding:0px;">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="info">										
                                <th>STT</th>										
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Danh mục cha</th>
                                <th>Hiển thị</th>
                                <th>Thao tác</th>										
                            </tr>
                        </thead>
                        <?php
                            $i=1;
                            ?>
                        <tbody>
                            @foreach($all_category_product as $key => $cate_pro)
                            <tr style="text-align: left">
                                <td><strong>{{ $i++}}</strong></td>
                                <td><strong >{{ $cate_pro->category_name }}</strong></td>
                                <td><strong >{{ $cate_pro->category_desc }}</strong></td>
                                @if($cate_pro->category_rank==1)
                                <td><strong>Thời trang nam</strong></td>
                                @elseif($cate_pro->category_rank==2)
                                <td><strong>Thời trang nữ</strong></td>
                                @endif
                                <td><strong >
                                    <?php
                                        if($cate_pro->category_status==0){         
                                        ?>
                                        <a href="{{URL::to ('/unactive-category-product/'.$cate_pro->category_id) }}"><span class="glyphicon glyphicon-remove-sign"></span></a>
                                        
                                        <?php
                                        } else{
                                        ?>
                                            <a href="{{URL::to ('/active-category-product/'.$cate_pro->category_id) }}"><span class="glyphicon glyphicon-ok-sign"></span></a>
                                        <?php
                                        }
                                        ?>

                                </strong></td>
                                <td class="list_td aligncenter">
                                    <a href="{{URL::to ('/edit-category-product/'.$cate_pro->category_id) }}" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
                                    <a href="{{URL::to ('/delete-category-product/'.$cate_pro->category_id) }}" title="Xóa"> <span class="glyphicon glyphicon-remove" onclick=" return confirm('Bạn chắc chắn muốn xóa?')"></span> </a>
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