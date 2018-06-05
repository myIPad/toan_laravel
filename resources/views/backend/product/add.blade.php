@extends('backend.layout.backend')
@section('tab','Trang thêm mới sản phẩm')
@section('content')
	<!-- <div class="col-md-4" style="float: right" >
				@for($i=1; $i<=10; $i++)
	    <div class="form-group" >
		    <label style="color: blue">Images Detail {!! $i !!}</label>
		    <input type="file" name="Productdetail[]" multiple="multiple" />
		</div>
				@endfor
	</div> -->
<div class="col-md-3"></div>
<div  class="col-md-6">
    <form action="" method="POST" role="form" enctype="multipart/form-data" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul >@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			</ul>@endforeach
		</div>
		@endif
			<legend style="text-align: center">Bảng thêm sản phẩm</legend>
			
		<div class="form-group">
			<label for=""> Choose Category Parent</label>
				<select name="parent" id="input" class="form-control" required="required" value="{!! old('parent') !!}">
				<option value="">Danh mục sản phẩm</option>
				<?php cate_parent($parent,0,"1", old('parent_id'))?>
			</select>

			<div class="form-group ">
				<label for="">Tên sản phẩm</label>
				<input type="text" class="form-control" name="name" placeholder="name" value="{!! old('name') !!}">
			</div>

<!-- 			<div class="form-group ">
	<label for="">Tên alias</label>
	<input type="text" class="form-control" name="alias" placeholder="alias" value="{!! old('alias') !!}">
</div> -->

			<div class="form-group">
				<label for="">Giá</label>
				<input type="text" class="form-control" name="price" placeholder="price" value="{!! old('price') !!}">
			</div>

			<div class="form-group">
				<label for="">Thông tin sản phẩm</label>
				<textarea name="intro" id="content" cols="30" rows="10" ></textarea>
			</div>
	
			<div class="form-group">
				<label for="">Nội dung sản phẩm</label>
				<textarea name="content" id="content" cols="30" rows="10" ></textarea>
			</div>

			<div class="form-group">
				<label for="">Hình ảnh sản phẩm</label>
				<input type="file" class="form-control" name="image" placeholder="image">
			</div>

			<div class="form-group">
				<label for="">Keywords</label>
				<input type="text" class="form-control" name="keywords" placeholder="Keywords" value="{!! old('keywords') !!}">
			</div>

			<div class="form-group">
				<label for="">descriptions</label>
				<input type="text" class="form-control" name="description" placeholder="descriptions" value="{!! old('description') !!}">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
    </form>
</div>
<div class="col-md-3"></div>


@stop()