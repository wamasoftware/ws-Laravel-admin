<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="/public/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/public/css/style.css" type="text/css" />
    <script src="/public/js/bootstrap.min.js" type="text/javascript">
	</script>
	<title>Look at me Login</title>
    
</head>
<body>

	<!--{{ Form::open(array('url' => '/')) }}
		<h1>Login</h1>

		 if there are login errors, show them here
		<p>
			{{ $errors->first('username') }}
			{{ $errors->first('password') }}
		</p>

		<p>
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', Input::old('username'), array('placeholder' => 'admin','value' => 'nnnn')) }}
		</p>

		<p>
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password') }}
		</p>

		<p>{{ Form::submit('Submit!') }}</p>
	{{ Form::close() }}-->
    
<div class="container">
	<div class="row">
    	<div class="col-md-4 col-sm-6 col-xs-11 center-block login-page" style="float:none;">
        	<div class="">
            <h1 class="text-center">Login</h1>
        <form class="form-horizontal" role="form" name="login_frm" id="">
            <div class="form-group">
			 	<label for="username" class="col-sm-3 control-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="Username" />
                </div>
		  	</div>
		  
		  	<div class="form-group">
				<label for="password" name="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-9">
                    <!--<input type="password" class="form-control" name="password" placeholder="Password">-->
                    {{ Form::text('password', Input::old('password'), array('placeholder' => 'Password','name' => 'password','class' => 'form-control')) }}
                </div>
		  	</div>
            
            <div class="form-group">
            	<div class="col-md-4 col-sm-4 col-sm-offset-3 ">
            		<input class="btn btn-primary ladda-button" type="submit" data-style="zoom-in" value="Login">
                </div>
            </div>
            <div class="form-group">
            	<div class="col-md-6 col-sm-offset-3">
					<a class="" href="#">Forgot password?</a>
				</div>
            </div>
       </form>
       </div>
       </div>
    </div>
</div>

</body>
</html>