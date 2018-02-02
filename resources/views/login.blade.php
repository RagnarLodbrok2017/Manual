<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login and Signup</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container text-center">
    <h1>Car Agency</h1>
    <div class="col-xs-6">
        {!! Form::open(['url'=>'/login' , 'style=padding-top:70px;']) !!}
        <div class="col-xs-10">
            <h3>Login Page:</h3>
            <div class="form-group">
                <label>Enter The Username : </label>{!! Form::text('username','',["class"=>"form-control", "placeholder"=>"Username:"]) !!}
            </div>
            <div class="form-group">
                <label>Enter The Password : </label>{!! Form::password('password',["class"=>"form-control", "placeholder"=>"Password:"] ) !!}
            </div>
            <div class="form-group">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                @if (Session::has('message'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ Session::get('message') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::submit('Login',["class"=>"btn btn-success"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-xs-6">
        {!! Form::open(['url'=>'/signup' , 'style=padding-top:70px;']) !!}
        <div class="col-xs-10">
            <h3>Signup Page:</h3>
            <div class="form-group">
                <label>Enter The Name : </label>{!! Form::text('name','',["class"=>"form-control", "placeholder"=>"Name:"]) !!}
            </div>
            <div class="form-group">
                <label>Enter The Email : </label>{!! Form::email('email','',["class"=>"form-control", "placeholder"=>"Email:"]) !!}
            </div>
            <div class="form-group">
                <label>Enter The Username : </label>{!! Form::text('username','',["class"=>"form-control", "placeholder"=>"Username:"]) !!}
            </div>
            <div class="form-group">
                <label>Enter The Password : </label>{!! Form::password('password',["class"=>"form-control" , "placeholder"=>"Password:"]) !!}
            </div>
            <div class="form-group">
                <label>Confirm Password : </label>{!! Form::password('password_confirmation',["class"=>"form-control" , "placeholder"=>"Confirm Password:"] ) !!}
            </div>
            <div class="form-group">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::submit('Signup',["class"=>"btn btn-success"]) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</body>
</html>