@extends('frontend.website')
@section('title', "Trang chủ")
@section('content')
<div class="container">
	    	@foreach($product_cate as $item)
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="text-align: center">	
	    <ul style="list-style: none">
	    	<li>
	    	<a href="#" class="thumbnail" style="text-decoration: none">
	    		<img src="{!! url('/public/uploads/'.$item->image) !!}" alt=""><h4>{!! $item->keywords !!}</h4>
	    	</a>
	    	<p>
	    		<a href="#" class="btn btn-primary">{!! number_format($item->price,0,',','.') !!}<sup>vnđ</sup></a>
	    		<a href="#" class="btn btn-default">Mua Hàng</a>
	    	</p>
	    		</li>
	    </ul>
	</div>
	    		@endforeach
</div>

<div class="container">
	<div id="mypage">
	<ul id="paginate" class="btn btn-info" >
		@if($product_cate->currentPage() != 1)
		<li ><a href="{!! $product_cate->url($product_cate->currentPage() - 1) !!}">Prev</a></li>
		@endif
		@for($i = 1; $i <= $product_cate->lastPage(); $i = $i +1 )
		<li class="{!! ($product_cate->currentPage() == $i) ? 'active' : '' !!}">
			<a href="{!! $product_cate->url($i) !!}">{{ $i }}</a>
		</li>
		@endfor
		@if($product_cate->currentPage() != $product_cate->lastPage())
		<li><a href="{!! $product_cate->url($product_cate->currentPage() + 1) !!}">Next</a></li>
		@endif
    </ul>
</div>
</div>



@endsection