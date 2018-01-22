@extends('layouts.app')
@section('content')
@endsection
<div class="container">
    <h2>Cars</h2>
    <div class="row">
        <div class='list-group gallery'>
            @if(isset($car))
                <div class="text-center">
                    <h3><strong>Name: </strong><code>{{$car->name}}</code></h3>
                    <h3><strong>Price: </strong><code>{{$car->price}}</code></h3>
                    <h3><strong>Tax: </strong><code>{{$car->tax}}</code></h3>
                    <h3><strong>Description: </strong><code>{{$car->description}}</code></h3>
                </div>
                @foreach($car as $car)
                    <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="padding-top: 50px;">
                        <a class="thumbnail fancybox" rel="ligthbox" href=" {{asset("/uploads/logo/$car->logo")}} ">
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
    <a href="cars/create" class="btn btn-default">Create Car</a>
</div>