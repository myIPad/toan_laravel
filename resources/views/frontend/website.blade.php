<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ url('/')}}/public/css/bootstrap.min.css ">
	<style>
	    body{
	    	padding: 0px;
	    	margin: 0px;
	    }
	    /* Bắt đầu nav links, text  */
		#mynavbar{
			background-color: darkorange;
			border-radius: 0;
			height: 70px;
			border-bottom: 0;
			border-top: 0;
			position: relative;
		}
		#changebar{
			margin: 10px auto;

		}
		#iconrefer{
           display: inline-flex;
		}
		#iconrefer img{
           width: 20px;
           height: auto;
           margin-right: -30px;
		}
		#taga  a:hover
		{
           font-size: 22px;
           color: darkcyan
		}
		#taga  a
		{
			color: black;
			font-size: 20px;
			box-sizing: border-box;
		
		}
		#taga:hover #tagahover
		{
			display: inline-block;
		}
		#taga
		 {
			display: inline-block;
			position: relative
			
		}
		#tagahover
		{
			display: none;
			position: absolute;
			background-color: white;
			color: black;
			min-width: 200px;
			padding: 10px 15px;
			box-shadow: 0px 7px 15px 0px;
			list-style-type: none;
		}
		#tagahover li a
		{
			display: block;
			font-size: 15px;
			text-decoration: none

		}
		/* end nav link */
		#paginate {
	list-style: none;
	display: inline-flex;
	text-align: center
	}
	#paginate li {
		padding: 5px;
	}

	#mypage{
		text-align: center
	}
	#myimage li {
		z-index: -1;
		position: relative
	}
	</style>
</head>
<body>
	    <!-- add #mynavbar thay đổi thuộc tính mặc định of css-->
@include('frontend.block.navbar')
	<!-- end navbar -->
<hr style="border-color: red; ">


<!-- start content -->
	@yield('content')
<!-- end content -->

<!-- thông tin liên hệ-->
<div class="container">
	<div class="col-lg-4" style="background-color: lightgreen"><h4>Đặt hàng 24/7: 123456789</h4></div>
	<div class="col-lg-4" style="text-align: center"><h4>Đặt hàng 24/7: 123456789</h4></div>
	<div class="col-lg-4" style="background-color: lightgreen"><h4 style="float: right">Đặt hàng 24/7: 123456789</h4></div>
</div>
<!--end contact-->

<!--thanh ngang-->
<hr style="height: 20px; width: 100%; background-color: lightblue">

@include('frontend.block.footer')