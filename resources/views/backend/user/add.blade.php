@extends('backend.layout.backend')
@section('tab','Trang thêm user đăng nhập')
@section('content')
<div class="container">
		<form action="{{ route('admin.user.poststore') }}" method="POST" role="form" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<legend style="text-align: center">Thêm người quản trị </legend>
		
		<div class="container">
		@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul >@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			</ul>@endforeach
		</div>
		@endif
		
			<div class="form-group">
				<label for="">Username đăng nhập</label>
				<input type="text" class="form-control" name="username" placeholder="username" value="{!! old('username') !!}">
			</div>
				

			<div class="form-group">
				<label for="">Email Đăng ký </label>
				<input type="email" class="form-control" name="email" placeholder="email" value="{!! old('email') !!}" >
			</div>

			<div class="form-group">
				<label for="">Mật khẩu đăng nhập</label>
				<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" >
			</div>

			<div class="form-group">
				<label for=""> Xác nhận mật khẩu đăng nhập</label>
				<input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" >
			</div>

			<div class="form-group">
				<label for="">Quyền truy cập</label>
				<select name="level" id="inputLevel" class="form-control" required="required">
					<option value="1">Admin</option>
					<option value="2">Member</option>
				</select>
			</div>

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@stop()