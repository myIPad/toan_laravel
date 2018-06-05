@extends('backend.layout.backend')
@section('tab', 'Trang quản lý user')
@section('content')

<div class="container">
		<form action="" method="POST" role="form" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<legend style="text-align: center">Chỉnh sửa thông tin Username</legend>
				@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul >@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			</ul>@endforeach
		</div>
		@endif
		
			<div class="form-group">
				<label for="">Username đăng nhập</label>
				<input type="text" class="form-control" name="username" value="{!! old('username',isset($data)? $data['username']:null) !!}">
			</div>
				

			<div class="form-group">
				<label for="">Email Đăng ký </label>
				<input type="email" class="form-control" name="email" placeholder="email" value="{!! old('email',isset($data)? $data['email']:null) !!}" >
			</div>

			<div class="form-group">
				<label for="">Mật khẩu đăng nhập</label>
				<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" >
			</div>

			<div class="form-group">
				<label for=""> Xác nhận mật khẩu đăng nhập</label>
				<input type="password" class="form-control" name="repassword" placeholder="Nhập lại mật khẩu" >
			</div>
			@if(Auth::user()->id !=$id)
			<div class="form-group">
				<label for="">
					<input type="radio" value="1" name="level" 
					@if($data["level"]==1) 
					checked="checked" 
					@endif>Admin
				</label>

				<label>
					<input type="radio" value="2" name="level" 
					@if($data["level"]==2) 
					checked="checked" 
					@endif>Member
				</label>

			</div>
			@endif
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

@stop()