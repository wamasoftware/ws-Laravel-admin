<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="/css/style.css" type="text/css" />
        <script src="/js/bootstrap.min.js" type="text/javascript">
        </script>
        <title>Look at me Login</title>

    </head>
    <body>
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-11 center-block login-page" style="float:none;">
                    <div class="">
                        <h1 class="text-center">Login</h1>
                        {{ Form::open(array('url' => '/', 'class' => 'form-horizontal')) }}

                        <!--if there are login errors, show them here-->
                        <p class="login-error">
                            {{ $errors->first('username') }}
                            {{ $errors->first('password') }}
                        </p>

                        <div class="form-group">
                            {{ Form::label('username', 'Username', array('class' => 'col-sm-3 control-label')) }}
                            <div class="col-sm-9">
                                {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username','value' => 'nnnn', 'class' => 'form-control')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password', array('class' => 'col-sm-3 control-label')) }}
                            <div class="col-sm-9">
                                {{ Form::password('password', Input::old('password'), array('placeholder' => 'Password','name' => 'password','class' => 'form-control')) }}

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4 col-sm-4 col-sm-offset-3 ">
                                {{ Form::submit('Submit!', array('value' => 'Login', 'class' => 'btn btn-primary ladda-button')) }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>