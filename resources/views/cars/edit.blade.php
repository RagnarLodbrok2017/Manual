@extends('layouts.app')
@section('content')
@endsection
<div class="container">
    <h2>Cars</h2>
    {!! Form::open(['route'=>["cars.update",$car->id], "files"=>"true", 'method'=>'PUT']) !!}
    <div class="text-center col-xs-6">
        <h3><code>Update car : <br><br></code></h3>
        <div class="form-group">
            <label>Enter The Name : </label>{!! Form::text('name',"{$car->name}",["class"=>"form-control", "placeholder"=>"Name:"]) !!}
        </div>
        <div class="form-group">
            <label>Enter The Price : </label>{!! Form::text('price',"{$car->price}",["class"=>"form-control", "placeholder"=>"Price:"]) !!}
        </div>
        <div class="form-group">
            <label>Enter The Tax : </label>{!! Form::text('tax',"{$car->tax}",["class"=>"form-control", "placeholder"=>"Tax:"]) !!}
        </div>
        <div class="form-group">
            <label>Enter The Description : </label>{!! Form::text('description',"{$car->description}",["class"=>"form-control" , "placeholder"=>"Description:"]) !!}
        </div>
        <select name="category_id" class="form-control">
            @if(isset($categories))
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            @endif
        </select>
        <div class="form-group">
            <img class="img-responsive" alt="" style="width: 320px;height: 320px" src=" {{asset("/uploads/logo/$car->logo")}} " />
            <label>upload the Logo: </label>{{ Form::file('logo', ['class' => 'field form-control']) }}
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
            {!! Form::submit('update',["class"=>"btn btn-success"]) !!}
        </div>
    </div>
    {!! Form::close() !!}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>