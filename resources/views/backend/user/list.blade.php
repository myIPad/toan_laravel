@extends('backend.layout.backend')
@section('tab', 'Danh sách user')
@section('content')
<div class="panel panel-info">
	<!-- Default panel contents -->
	<!-- Table -->
	<table class="table table-hover" style="border: 1px">
		<caption>Danh sách user đã tạo</caption>
		<thead>
			<tr>
				<th>Số thứ tự</th>
				<th>Username</th>
				<th>Email</th>
				<th>Cấp độ</th>
				<th>Ngày tạo</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody><?php $stt=0; ?>
			@foreach($data as $item)
			<?php $stt = $stt+1; ?>
			<tr>
				<td>{!! $stt !!}</td>
				<td>{!! $item['username'] !!}</td>
				<td>{!! $item['email'] !!}</td>
				<td>
					@if($item['id']==44)
						Superadmin
					@elseif($item['level']==1)
							Admin
					@else
							Member		
					@endif
				</td>
				<td>{!! $item['created_at'] !!}</td>
				<td><a href="{{ route('admin.user.destroy',$item['id']) }}" onclick="return xacnhanxoa('Bạn chắc chắn muốn xóa tài khoản này')" class="btn btn-warning">Delete</a></td>
				<th><a href="{{ route('admin.user.getedit',$item['id']) }}" class="btn btn-group-lg">Edit</a></th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@stop()