<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHTShop - Admin</title>
<link rel="shortcut icon" href="{{ asset('Frontend/images/logo.png') }}" type="image/png">

<link href="{{ asset('Backend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('Backend/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('Backend/css/styles.css') }}" rel="stylesheet">

<!--Icons-->
<script src="{{ asset('Backend/js/lumino.glyphs.js') }}"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>PHTStore</span>Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>

							<?php
							$name= Auth::user()->admin_name;
							if($name){
								echo $name;
							}
							?>

						<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							{{-- <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Tài khoản</a></li> --}}
							<li><a href="{{ URL::to('/logout-auth') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="{{ URL::to('/dashboard') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Trang chủ</a></li>
			@hasrole('admin')
			<li><a href="{{ URL::to('/all-category-product') }}"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Quản lý danh mục</a></li>
			@endhasrole
			<li><a href="{{ URL::to('/all-product') }}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg>Quản lý sản phẩm</a></li>
			<li><a href="{{ URL::to('/manage-slider') }}"><svg class="glyph stroked landscape"><use xlink:href="#stroked-landscape"/></svg>Quản lý slider</a></li>
			<li><a href="{{ URL::to('/manage-order') }}"><svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>Quản lý đơn đặt hàng</a></li>
			<li><a href="{{ URL::to('/view-customer') }}"><svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>Quản lý khách hàng</a></li>
			@hasrole('admin')
			<li><a href="{{ URL::to('/delivery') }}"><svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg>Quản lý vận chuyển</a></li>
			<li><a href="{{ URL::to('/users') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Quản lý nhân viên</a></li>
			@endhasrole
			<li><a href="{{ URL::to('/all-news') }}"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>Quản lý bài viết</a></li>
			{{-- <li><a href="icons.html"><svg class="glyph stroked dashboard dial"><use xlink:href="#stroked-dashboard-dial"/></svg> Đối tác vận chuyển</a></li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng nhập</a></li>
			 --}}
		</ul>
	</div><!--/.sidebar-->

	@yield('content_admin')

	<script src="{{ asset('Backend/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('Backend/js/chart.min.js') }}"></script>
	<script src="{{ asset('Backend/js/chart-data.js') }}"></script>
	<script src="{{ asset('Backend/js/easypiechart.js') }}"></script>
	<script src="{{ asset('Backend/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('Backend/js/bootstrap-datepicker.js') }}"></script>
	<script src="//cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
	<script src="{{ asset('jquery-validation-1.19.5/dist/jquery.validate.min.js') }}"></script>
	<script src="{{ asset('Backend/js/catcherror.js') }}"></script>
	<script src="{{ asset('Backend/js/jquery-3.6.3.min.js') }}"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
		        $(this).find('em:first').toggleClass("glyphicon-minus");
		    });
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>

	<script>
		CKEDITOR.replace('ckeditor');
		CKEDITOR.replace('ckeditor1');
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			load_gallery();

			function load_gallery(){
			var pro_id = $('.pro_id').val();
			var _token = $('input[name="_token"]').val();
			//alert(pro_id);
			$.ajax({
				url:"{{ url('/select-gallery') }}",
				method: "POST",
				data: {pro_id:pro_id,_token:_token},
				success:function(data) {
					$('#gallery_load').html(data);
				}
				});
			}

			$('#file').change(function(){
				var error = '';
				var files = $('#file')[0].files;

				if(files.length>5){
					error +='<p>Bạn chọn tối đa 5 ảnh</p>';
				}else if(files.length==''){
					error +='<p>Bạn không được bỏ trống ảnh</p>';
				}else if(files.size>2000000){
					error +='<p>Ảnh không được lớn hơn 2MB</p>';
				}

				if(error == ''){

				}else{
					$('#file').val('');
					$('#error_gallery').html('<span class="text-danger">'+error+'</span>');
					return false;
				}
			});
			$(document).on('blur','.edit_gal_name',function(){
				var gal_id= $(this).data('gal_id');
				var gal_text = $(this).text();
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url:"{{ url('/update-gallery-name') }}",
					method: "POST",
					data: {gal_id:gal_id,gal_text:gal_text,_token:_token},
					success:function(data) {
						load_gallery();
						$('#error_gallery').html('<span class="text-danger">Cập nhật tên hình ảnh thành công</span>');
					}
				});
			});

			$(document).on('click','.delete-gallery',function(){
				var gal_id= $(this).data('gal_id');
				var _token = $('input[name="_token"]').val();
				if(confirm('Bạn muốn xóa hình ảnh này không?')){

				$.ajax({
					url:"{{ url('/delete-gallery') }}",
					method: "POST",
					data: {gal_id:gal_id,_token:_token},
					success:function(data) {
						load_gallery();
						$('#error_gallery').html('<span class="text-danger">Xóa hình ảnh thành công</span>');
					}
				});
			}
			});
		});
	</script>

<script type="text/javascript">

    function ChangeToSlug()
        {
            var slug;

            //Lấy text từ thẻ input title
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }

</script>

<script type="text/javascript">
    $(document).ready(function(){

        // fetch_delivery();

        // function fetch_delivery(){
        //     var _token = $('input[name="_token"]').val();
        //     //  $.ajax({
        //     //     url : "{{url('/select-feeship')}}",
        //     //     method: "POST",
        //     //     data:{_token:_token},
        //     //     success:function(data){
        //     //        $('#load_delivery').html(data);
        //     //     }
        //     // });
        // }
	$(document).on('blur','.fee_feeship_edit',function(){

		var feeship_id = $(this).data('feeship_id');
		var fee_value = $(this).text();
			var _token = $('input[name="_token"]').val();
		// alert(feeship_id);
		// alert(fee_value);
		$.ajax({
			url : '{{url('/update-delivery')}}',
			method: 'POST',
			data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
			success:function(data){
				location.reload();
			}
		});

	});
	$('.add_delivery').click(function(){

		var city = $('.city').val();
		var province = $('.province').val();
		var wards = $('.wards').val();
		var fee_ship = $('.fee_ship').val();
		var _token = $('input[name="_token"]').val();
		// alert(city);
		// alert(province);
		// alert(wards);
		// alert(fee_ship);
		$.ajax({
			url : '{{url('/insert-delivery')}}',
			method: 'POST',
			data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
			success:function(data){
				location.reload();
			}
		});


	});
	$('.choose').on('change',function(){
		var action = $(this).attr('id');
		var ma_id = $(this).val();
		var _token = $('input[name="_token"]').val();
		var result = '';
		// alert(action);
		//  alert(matp);
		//   alert(_token);

		if(action=='city'){
			result = 'province';
		}else{
			result = 'wards';
		}
		$.ajax({
			url : '{{url('/select-delivery')}}',
			method: 'POST',
			data:{action:action,ma_id:ma_id,_token:_token},
			success:function(data){
				$('#'+result).html(data);
			}
		});
	});
})

</script>

<script>

</script>

<script>
	$('.order_details').change(function(){
	var order_status = $(this).val();
	var order_id = $(this).children(":selected").attr("id");
	var _token = $('input[name="_token"]').val();

	//alert(order_status);
	//lay ra so luong
	quantity = [];
	$("input[name='product_sales_quantity']").each(function(){
		quantity.push($(this).val());
	});
	//lay ra product id
	order_product_id = [];
	$("input[name='order_product_id']").each(function(){
		order_product_id.push($(this).val());
	});
	//lay ra order product id
	order_detail_id = [];
	$("input[name='order_detail_id']").each(function(){
		order_detail_id.push($(this).val());
	});

	//alert(order_detail_id);
	j = 0;
	if(order_status==2){
		for(i=0;i<order_product_id.length;i++){
			//so luong khach dat
			var order_qty = $('.order_qty_' + order_detail_id[i]).val();
			//so luong ton kho
			var order_qty_storage_m = $('.order_qty_storage_m_' + order_product_id[i]).val();
			var order_qty_storage_s = $('.order_qty_storage_s_' + order_product_id[i]).val();
			var order_qty_storage_xl = $('.order_qty_storage_xl_' + order_product_id[i]).val();
			//size khach dat
			var order_product_size = $('.order_product_size_' + order_detail_id[i]).val();
			//alert(order_product_size);

			switch (order_product_size) {
			case 'M':
				if(parseInt(order_qty)>parseInt(order_qty_storage_m)){
						j = j + 1;
						if(j==1){
							alert('Số lượng bán trong kho không đủ');
						}
						$('.color_qty_'+order_detail_id[i]).css('background','#000');
					}
				break;
			case 'S':
				if(parseInt(order_qty)>parseInt(order_qty_storage_s)){
						j = j + 1;
						if(j==1){
							alert('Số lượng bán trong kho không đủ');
						}
						$('.color_qty_'+order_detail_id[i]).css('background','#000');
					}
				break;
			default:
				if(parseInt(order_qty)>parseInt(order_qty_storage_xl)){
						j = j + 1;
						if(j==1){
							alert('Số lượng bán trong kho không đủ');
						}
						$('.color_qty_'+order_detail_id[i]).css('background','#000');
					}
			}
		}
		if(j==0 ){
			$.ajax({
				url : '{{url('/update-order-qty')}}',
					method: 'POST',
					data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id,order_detail_id:order_detail_id},
					success:function(data){
						alert('Thay đổi tình trạng đơn hàng thành công');
						location.reload();
					}
			});
		}
	}else{
		$.ajax({
			url : '{{url('/update-order-qty')}}',
				method: 'POST',
				data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id,order_detail_id:order_detail_id},
				success:function(data){
					alert('Thay đổi tình trạng đơn hàng thành công');
					location.reload();
				}
		});
	}

});
</script>

<script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
            duration: "slow"
        });
        $( "#datepicker2" ).datepicker({
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
            duration: "slow"
        });
    });
 </script>


</body>

</html>
