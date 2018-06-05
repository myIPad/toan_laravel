@extends('backend.layout.backend')
@section('tab','Trang chỉnh sửa danh mục')
@section('content')


<div class="container">
		<form action="" method="POST" role="form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<legend style="text-align: center">Bảng chỉnh sửa danh mục</legend>

			<div class="form-group">
				<label for="">Category Parent</label>
				<select name="parent_id" id="input" class="form-control" required="required">
					<option>Chọn tên danh mục</option>
					<?php cate_parent($parent,0,"1",$data["parent_id"]); ?>
					
				</select>
			</div>

			<div class="form-group">
				<label for="">Tên danh mục</label>
				<input type="text" class="form-control" name="name" placeholder="name" value="{!! old('name'),isset($data)?$data['name']:null !!}">
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
				<input type="text" class="form-control" name="order" placeholder="order" value="{!! old('order'),isset($data)?$data['order']:null !!}">
			</div>

			<div class="form-group">
				<label for="">keywords</label>
				<input type="text" class="form-control" name="keywords" placeholder="keywords" value="{!! old('keywords'),isset($data)?$data['keywords']:null !!}">
			</div>

			<div class="form-group">
				<label for="">descriptions</label>
				<input type="text" class="form-control" name="descriptions" placeholder="descriptions" value="{!! old('descriptions'),isset($data)?$data['descriptions']:null !!}">
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@stop()