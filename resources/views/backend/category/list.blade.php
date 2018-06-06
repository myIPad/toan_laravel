@extends('backend.layout.backend')
@section('tab','Trang  danh sách danh mục')
@section('content')
<div >
	<table class="table table-striped table-bordered table-hover" >
		<caption>Bảng danh sách danh mục</caption>
		<thead>
			<tr style="text-align: center">
				<th>Số thứ tự</th>
				<th>Name</th>
				<th>Category Parent</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
			<?php $stt = 0 ?>
			@foreach($data as $item)
			<?php $stt  = $stt +1 ?>
			<tr>
				<td>{!! $stt !!}</td>
				<td>{!! $item["name"] !!}</td>
				<td>
				@if($item["parent_id"] == 0 )
				{!! "None" !!}
				@else
				<?php 
					$val = DB::table('categorys')->where('id',$item['parent_id'])->first();
					print $val->name
				 ?>
				 @endif
				</td>
				<td><a href="{{ route('admin.cate.getdelete',$item['id']) }}" onclick="return xacnhanxoa('Bạn chắc chắn muốn xóa') " class="btn btn-danger">Delete</a></td>
				<td><a href="{{ route('admin.cate.getedit',$item['id']) }}" class="btn btn-info">Edit</a></td>
					
			</tr>

			@endforeach
		</tbody>
	</table>
	<a href="{{ url('/admin/category/add') }}" class="btn btn-info">Thêm mới</a>
</div>

@stop()