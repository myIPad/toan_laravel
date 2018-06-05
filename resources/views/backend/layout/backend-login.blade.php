
<!DOCTYPE html>
<html>
<head
    <meta charset="utf-8" content="content" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('/')}}/public/backend/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/backend/css/style.css" />
  <!-- Nhúng ckeditor và ckfinder -->

</head>
<body>
<!--   you can substitue the span of reauth email for a input with the email and
include the remember me checkbox -->
  <div class="container">
      <div class="card card-container">
         @if(Session::has('success'))
          <div class="alert alert-success">
              
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!!Session::get('success')!!}
          </div>
        @endif
         @if(Session::has('error'))
          <div class="alert alert-danger">
      
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!!Session::get('error')!!}
          </div>
        @endif
     

       <div class="login-page"> <!--Login-->
          @yield('main1')
  <div class="form">
 @yield('main2')
  </div>
</div>
        </div><!-- /card-container -->
    </div><!-- /container -->
<script src="{{url('/')}}/public/backend/js/jquery.min.js"></script>
<script src="{{url('/')}}/public/backend/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/public/backend/js/myscript.js"></script>
</body>
</html>

