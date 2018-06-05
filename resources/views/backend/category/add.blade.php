@extends('backend.layout.backend')
@section('tab','Trang thêm mới danh mục')
@section('content')
<div class="col-md-3"></div>
<div class="col-md-6">
	<form action="" method="POST" role="form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<legend style="text-align: center">Bảng thêm danh mục sản phẩm</legend>

		<div class="form-group">
			<label for="">Category Parent</label>
			<select name="parent_id" id="input" class="form-control" required="required">
				<option value="0">Chọn danh mục</option>
				<?php cate_parent($parent); ?>
					
			</select>
		</div>

		<div class="form-group">
			<label for="">Tên danh mục</label>
			<input type="text" class="form-control" name="name" placeholder="name" value="{!! old('name') !!}">
		</div>
			@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
				@endforeach()
			</ul>
		</div>	
			@endif()

		<div class="form-group">
			<label for="">Name Order</label>
			<input type="text" class="form-control" name="order" placeholder="order" value="{!! old('order') !!}">
		</div>

		<div class="form-group">
			<label for="">keywords</label>
			<input type="text" class="form-control" name="keywords" placeholder="keywords" value="{!! old('keywords') !!}">
		</div>

		<div class="form-group">
			<label for="">descriptions</label>
			<input type="text" class="form-control" name="descriptions" placeholder="descriptions" value="{!! old('descriptions') !!}">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
<div class="col-md-3"></div>
@stop()