@extends('welcome')
@section('nav')
@endsection
<div class="container" style="margin-top: 50px;">
    <h2>Cars Main Page For Users</h2>
        <div class="row">
            <div class='list-group gallery'>
                @if(isset($cars))
                    @foreach($cars as $car)
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="padding-top: 50px;">
                    <a class="thumbnail fancybox" rel="ligthbox" href="carsuser/{{$car->id}}" methods="GET">
                        <img class="img-responsive" alt="" style="width: 320px;height: 320px" src=" {{asset("/uploads/logo/$car->logo")}} " />
                        <div class='text-center'>
                            <strong class='text-muted'>{{$car->name}}</strong>
                            <div class="form">
                                {!! Form::open(["url"=>"carsuser/{$car->id}/buy", "method"=>"GET"]) !!}
                                <div style="float: left; width: 120px;padding-top: 10px;">
                                    {!! Form::submit('Buy',["class"=>"btn btn-info"]) !!}
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
    </div>
</div>