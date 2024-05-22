<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin</title>

<link href="{{ asset('Backend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('Backend/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('Backend/css/styles.css') }}" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Đăng nhập admin</div>
				<div class="panel-body">
					<form role="form" action="{{ URL::to('/login') }}" method="post">

						{!! csrf_field() !!}

				<?php
				$message= Session::get('message');
				if($message){
					echo '<span style="color:red;">'.$message.'</span>';
					Session::put('message',null);
				}
				?>

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="admin_email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="admin_password" type="password" value="">
							</div>

							<input type="submit" class="btn btn-primary" value="Login" name="login">
						</fieldset>
					</form>
{{--					--}}{{-- <a href="{{ URL::to('/login-facebook') }}">Login facebook</a>|--}}
{{--					<a href="{{ URL::to('/register-auth') }}">Register Auth</a>|--}}
{{--                    <a href="{{ URL::to('/login-auth') }}">Login Auth</a> --}}
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->



	<script src="{{ asset('Backend/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('Backend/js/chart.min.js') }}"></script>
	<script src="{{ asset('Backend/js/chart-data.js') }}"></script>
	<script src="{{ asset('Backend/js/easypiechart.js') }}"></script>
	<script src="{{ asset('Backend/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('Backend/js/bootstrap-datepicker.js') }}"></script>
	<script>
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
</body>

</html>
