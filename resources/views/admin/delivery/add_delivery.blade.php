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
            <section class="panel">
                <header class="panel-heading">
                   Thêm vận chuyển
                </header>
                 <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                    ?>
                <div class="panel-body">

                    <div class="position-center">
                        <form>
                            {!! csrf_field() !!}
                     
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chọn thành phố</label>
                              <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                            
                                    <option value="">--Chọn tỉnh thành phố--</option>
                                @foreach($city as $key => $ci)
                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                @endforeach
                                    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chọn quận huyện</label>
                              <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                    <option value="">--Chọn quận huyện--</option>
                                   
                            </select>
                        </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Chọn xã phường</label>
                              <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">--Chọn xã phường--</option>   
                            </select>
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Phí vận chuyển</label>
                            <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Phí vận chuyển">
                        </div>
                       
                        <button type="submit" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                        </form>
                    </div>

                    {{-- <div id="load_delivery"> --}}
                        <div class="table-responsive">  
                            <table class="table table-bordered">
                                <thread> 
                                    <tr>
                                        <th>Tên thành phố</th>
                                        <th>Tên quận huyện</th> 
                                        <th>Tên xã phường</th>
                                        <th>Phí ship</th>
                                        <th></th>
                                    </tr>  
                                </thread>
                                <tbody>
                                    <form  method="post" action="{{ URL::to('/update-delivery') }}">

                                        {!! csrf_field() !!}
                                    @foreach($feeship as $key => $fee)
                                        <tr>
                                            <td>{{ $fee->name_city }}</td>
                                            <td>{{ $fee->name_quanhuyen }}</td>
                                            <td>{{ $fee->name_xaphuong }}</td>
                                            <td contenteditable data-feeship_id="{{ $fee->fee_id }}" class="fee_feeship_edit">{{ number_format($fee->fee_feeship,0,',','.') }}</td>
                                            <td><a href="{{URL::to ('/delete-delivery/'.$fee->fee_id) }}" title="Xóa"> <span class="glyphicon glyphicon-remove" onclick=" return confirm('Bạn chắc chắn muốn xóa?')"></span> </a></td>
                                        </tr>
                                    @endforeach
                                    </form>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    
                </div>
            </section>

    </div>
</div>

@endsection