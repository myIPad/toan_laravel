@extends('backend.layout.backend-login')
@section('main1')
@section('main2')
@if(count($errors)>0)
		<div class="alert alert-danger">
			<ul >@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			</ul>@endforeach
		</div>
		@endif
<form class="login-form" method="POST" action="{{ route('admin.login.postlogin') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="text" name="username" placeholder="username"/>
  <input type="password" name="password" placeholder="password"/>
  <button>login</button>
  <p class="message"><a href="#">Create an account</a></p>
  <p class="message"><a href="#">Forgot password</a></p>
</form>


@stop