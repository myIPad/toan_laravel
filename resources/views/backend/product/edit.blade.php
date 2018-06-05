@extends('backend.layout.backend')
@section('tab','Trang chỉnh sửa sản phẩm')
@section('content')
<div class="col-md-8">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<legend style="text-align: center">Bảng danh sách sản phẩm</legend>
		
			<div class="form-group">
				<label for=""> Choose Category Parent</label>
				<select name="parent" id="input" class="form-control" required="required" value="{!! old('parent') !!}">
					<option value="">Danh mục sản phẩm</option>
				<?php cate_parent($parent,0,"1", $product["cate_id"])?>
			</select>

			<div class="form-group">
				<label for="">Tên sản phẩm</label>
				<input type="text" class="form-control" name="name" value="{!! old('name'), isset($product)?$product['name']:null !!}">
			</div>
<!-- 
            <div class="form-group">
				<label for="">alias</label>
				<input type="text" class="form-control" name="alias" value="{!! old('alias'), isset($product)?$product['alias']:null !!}">
			</div> -->

			<div class="form-group">
				<label for="">Giá</label>
				<input type="text" class="form-control" name="price" value="{!! old('price'),isset($product)?$product['price']:null !!}">
			</div>

			<div class="form-group">
				<label for="">Thông tin sản phẩm</label>
				<textarea name="intro" id="content" cols="30" rows="10" >{!! old('intro'),isset($product)?$product['intro']:null !!}</textarea>
			</div>
	
			<div class="form-group">
				<label for="">Nội dung sản phẩm</label>
				<textarea name="content" id="content" cols="30" rows="10" >{!! old('content'),isset($product)?$product['content'] :null !!}</textarea>
			</div>

			<div class="form-group">
				<label for="">Hình ảnh sản phẩm</label>
				<input type="file" class="form-control" name="image">
				<img src="{{ url('/') }}/public/uploads/{!! $product['image'] !!}" alt="">
			</div>

			<div class="form-group">
				<label for="">Keywords</label>
				<input type="text" class="form-control" name="keywords" value="{!! old('keywords'),isset($product)?$product['keywords']: null !!}">
			</div>

			<div class="form-group">
				<label for="">descriptions</label>
				<input type="text" class="form-control" name="description" value="{!! old('description'),isset($product)?$product['description']:null !!}">
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@stop()