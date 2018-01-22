@extends('layouts.app')
@section('content')
@endsection
<div class="container">
    <h2>Cars</h2>
        {!! Form::open(['url'=>'cars', "files"=>"true"]) !!}
        <div class="text-center col-xs-6">
            <h3><code>Add car : <br><br></code></h3>
            <div class="form-group">
                <label>Enter The Name : </label>{!! Form::text('name','',["class"=>"form-control", "placeholder"=>"Name:"]) !!}
            </div>
            <div class="form-group">
                <label>Enter The Price : </label>{!! Form::text('price','',["class"=>"form-control", "placeholder"=>"Price:"]) !!}
            </div>
            <div class="form-group">
                <label>Enter The Tax : </label>{!! Form::text('tax','',["class"=>"form-control", "placeholder"=>"Tax:"]) !!}
            </div>
            <div class="form-group">
                <label>Enter The Description : </label>{!! Form::text('description','',["class"=>"form-control" , "placeholder"=>"Description:"]) !!}
            </div>
            <select name="category_id" class="form-control">
                @if(isset($categories))
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                @endif
            </select>
            <div class="form-group">
                <label>upload the Logo: </label>{{ Form::file('logo', ['class' => 'field form-control']) }}
            </div>
            <div class="form-group">
                <label>upload the Images Of Car: </label>{{ Form::file('images[]', ['class' => 'field form-control', "multiple"]) }}
            </div>
        <div class="form-group">
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group">
            @if ($errors->has('price'))
                <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('price') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group">
            @if ($errors->has('tax'))
                <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('tax') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group">
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('description') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group">
            @if ($errors->has('logo'))
                <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('logo') }}</strong>
                    </span>
            @endif
        </div>
            <div class="form-group">
                @if ($errors->has('images'))
                    <span class="help-block">
                        <strong class="alert alert-danger">{{ $errors->first('images') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
            {!! Form::submit('add',["class"=>"btn btn-success"]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>