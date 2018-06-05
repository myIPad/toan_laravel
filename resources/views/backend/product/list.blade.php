
@extends('backend.layout.backend')
@section('tab','Trang thêm danh sách sản phẩm')
@section('content')
<div class="col-lg-12">
	<table class="table table-hover" style="border: solid 1px;">
	<caption>Bảng danh sách sản phẩm</caption>
	<thead>
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Size</th>
			<th>Giá</th>
			<th>Ngày, giờ tạo</th>
			<th>Danh mục sản phẩm</th>
			<th>Delete</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody><?php $stt = 0 ?>
		@foreach($data as $item)
		<?php $stt = $stt +1 ?>
		<tr>
			<td>{!! $stt !!}</td>
			<td>{!! $item['name'] !!}</td>
			<td>{!! $item['keywords'] !!}</td>
			<td>{!! number_format($item['price'],0,",",".") !!} <sup>vnđ</sup></td>
			<td>{!! $item['created_at'] !!}</td>
			<td>
				<?php $cate = DB::table('categorys')->where('id',$item['cate_id'])->first(); echo $cate->name; ?>
			</td>
			<td><a href="{{ route('admin.product.delete',$item['id']) }}" onclick="return xacnhanxoa('Bạn chắc chắn muốn xóa') " class="btn btn-danger">Delete</a></td>
				<td><a href="{{ route('admin.product.getedit',$item['id']) }}" class="btn btn-info">Edit</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>

<div class="col-lg-4"></div>
<div class="col-lg-4 pagination">
	<ul id="paginate">
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
<div class="col-lg-4"></div>
@stop()