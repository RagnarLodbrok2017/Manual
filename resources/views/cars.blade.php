{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--@endsection--}}
@extends('welcome')
@section('nav')
@endsection
<div class="container" style="margin-top: 70px;">
    <div class="widget-body row">
        <h3>Category: </h3>
        <div class="center-block centered" style="width: 250px;">
        <ul>
        @if(isset($categories))
            @foreach($categories as $category)
                <li>
                    {!! Form::open(["url"=>"cars/{$category->id}", "method"=>"POST"]) !!}
                    <span class="badge pull-right">{{$category->cars->count()}}</span>
                        {!! Form::submit("{$category->title}",["class"=>"btn btn-info"]) !!}
                    {!! Form::close() !!}
                </li>
            @endforeach
        @endif
        </ul>
        </div>
        {{--<a href="/?category=family"><button class="btn btn-info"> Family </button> </a>--}}
        {{--<a href="/?category=race cars"><button class="btn btn-info"> Race Cars </button></a>--}}
        {{--<a href="/?category=Luxury car"><button class="btn btn-info"> Luxury Cars </button></a>--}}
    </div>
        <div class="row">
            <div class='list-group gallery'>
                @if(isset($cars))
                    @foreach($cars as $car)
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="padding-top: 50px;">
                    <a class="thumbnail fancybox" rel="ligthbox" href="../cars/{{$car->id}}" methods="GET">
                        <img class="img-responsive" alt="" style="width: 320px;height: 320px" src=" {{asset("/uploads/logo/$car->logo")}} " />
                        <div class='text-center'>
                            <strong class='text-muted'>{{$car->name}}</strong>
                            <div class="form">
                                {!! Form::open(["url"=>"cars/{$car->id}/edit", "method"=>"GET"]) !!}
                                <div style="float: left; width: 120px;padding-top: 10px;">
                                    {!! Form::submit('Edit',["class"=>"btn btn-info"]) !!}
                                </div>
                                {!! Form::close() !!}
                                {!! Form::open(["url"=>"cars/{$car->id}","method"=>"DELETE"]) !!}
                                <div style="float: right; width: 120px;padding-top: 10px;">
                                    {!! Form::submit('Delete',["class"=>"btn btn-danger"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div> <!-- text-right / end -->
                    </a>
                </div> <!-- col-6 / end -->
                    @endforeach
                    @endif
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    <div class="text-center">
        {{$cars->links()}}
        <a href="cars/create" class="btn btn-default">Create Car</a>
    </div>
</div>