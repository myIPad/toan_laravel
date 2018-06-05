@extends('frontend.website')
@section('title', "Trang chủ")
@section('content')

<div class="container" id="myimage">
				@foreach($data as $item)
	    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align: center">
			<ul style="list-style: none">
				<li class="thumbnail">
					
					<a href="#" style="text-decoration: none;"><img src="{!! asset('public/uploads/'.$item->image) !!} " alt="image"><h4>{!! $item->keywords !!}</h4></a>
					<p>
						<a href="" class="btn btn-primary">{!! number_format($item->price,0,',','.') !!}<sup>vnđ</sup></a>
						<a href="" class="btn btn-danger">Mua Hàng</a>
					</p>
				</li>
			</ul>
	    </div>
			@endforeach
</div>
<div class="container">
	<div id="mypage">
	<ul id="paginate" class="btn btn-info" >
		@if($data->currentPage() != 1)
		<li ><a href="{!! $data->url($data->currentPage() - 1) !!}">Prev</a></li>
		@endif
		@for($i = 1; $i <= $data->lastPage(); $i = $i +1 )
		<li class="{!! ($data->currentPage() == $i) ? 'active' : '' !!}">
			<a href="{!! $data->url($i) !!}">{{ $i }}</a>
		</li>
		@endfor
		@if($data->currentPage() != $data->lastPage())
		<li><a href="{!! $data->url($data->currentPage() + 1) !!}">Next</a></li>
		@endif
    </ul>
</div>
</div>


@endsection