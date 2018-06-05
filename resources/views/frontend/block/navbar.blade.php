	<nav class="navbar navbar-inverse" role="navigation" id="mynavbar">
		<!-- add #changebar thay đổi text mặc định of css -->
		<div class="container" id="changebar">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{!! url('/') !!}"><strong>Trang chủ</strong></a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav" >
					<?php 
							$menu_level_1 = DB::table('categorys')->where('parent_id',0)->get();
					 ?>
					 @foreach($menu_level_1 as $item_level_1)
					<li id="taga">
						<a href="#"><strong>{!! $item_level_1->name !!}</strong></a>
						<div>
							<ul id="tagahover">
								<?php 
									$menu_level_2 = DB::table('categorys')->where('parent_id', $item_level_1->id)->get();
								 ?>
								@foreach($menu_level_2 as $item_level_2)
							<li>
								<a href="{!! url('loai-san-pham', [$item_level_2->id, $item_level_2->alias]) !!}">{!! $item_level_2->name !!}</a>
							</li>
							    @endforeach
						</ul>
						</div>
					</li>
					@endforeach
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-info">Tìm kiếm</button>
				</form>
				<ul class="nav navbar-nav navbar-right" >
				    <!-- add #iconrefer thêm icon refer to youtube, facebook,... -->
					<li id="iconrefer">
						<a href="#"><img src="{{ url('/') }}/public/images/youtube.png" alt="youtube" class=""></a>
						<a href="#"><img src="{{ url('/') }}/public/images/twitter.png" alt="twitter"></a>
						<a href="#"><img src="{{ url('/') }}/public/images/link.png" alt="link"></a>
						<a href="#"><img src="{{ url('/') }}/public/images/facebook.png" alt="facebook"></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" >Login <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Profile</a></li>
							<li><a href="#">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>