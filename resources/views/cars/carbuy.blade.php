@extends('layouts.app')
@section('content')
@endsection
<div class="container">
    <h2>Cars</h2>
    <div class="row">
        <div class='list-group gallery'>
            @if(isset($car))
                <div class="text-center" style="height: 350px;">
                    <div style="float: left;" class="col-xs-6">
                        <h2><strong>Name: </strong><code>{{$car->name}}</code></h2>
                        <h3><strong>Price: </strong><code>{{$car->price}}</code></h3>
                        <h3><strong>Tax: </strong><code>{{$car->tax}}</code></h3>
                        <h3><strong>Description: </strong><code>{{$car->description}}</code></h3>
                        <h2><strong>The total Price:</strong> <code>{{$car->price+($car->price * 3/100)}}</code></h2>
                    </div>
                    <div style="float: right;" class="col-xs-6">
                        <img class="img-responsive" alt="" style="width: 320px;height: 320px" src=" {{asset("/uploads/logo/$car->logo")}} " />
                    </div>
                </div>
            @endif
                @if(isset($images))
                    @foreach($images as $image)
                        <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3' style="padding-top: 50px;">
                            <a class="thumbnail fancybox" rel="ligthbox" href=" {{asset("/uploads/images/$image->title")}} ">
                                <img class="img-responsive" alt="" style="width: 320px;height: 400px" src=" {{asset("/uploads/images/$image->title")}} " />
                            </a>
                        </div> <!-- col-6 / end -->
                @endforeach
                    @endif
        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div>