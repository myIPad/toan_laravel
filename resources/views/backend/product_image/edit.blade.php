@extends('backend.layout.backend')
@section('content')
<div class="container">
		<form action="" method="POST" role="form" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<legend style="text-align: center">Bảng chỉnh sửa hình ảnh sản phẩm</legend>
		

		
			<div class="form-group">
				<label for="">Hình ảnh sản phẩm có ID </label>
				<input type="text" class="form-control" name="product_id">
			</div>
				

			<div class="form-group">
				<label for="">Hình ảnh sản phẩm</label>
				<input type="file" class="form-control" name="image" >
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@stop()