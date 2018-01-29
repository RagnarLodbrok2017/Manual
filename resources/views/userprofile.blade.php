@extends('welcome')
@section('nav')
@endsection
<div class="container" style="margin-top: 50px;">
    <h2><strong>{{Auth::user()->name}} </strong> Profile:</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Transaction ID:</th>
            <th>Car ID:</th>
            <th>Car Name:</th>
            <th>User ID:</th>
            <th>Finall Price:</th>
            <th>Delete:</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($soldcars))
            @foreach($soldcars as $soldcar)
                <tr>
                    <th scope="row">{{$soldcar->id}}</th>
                    <td>{{$soldcar->car_id}}</td>
                    <td>{{$user->cars[$loop->index]->name}}</td>
                    <td>{{$soldcar->user_id}}</td>
                    <td>{{$soldcar->total_price}}</td>
                    <td>
                        {!! Form::open(['url'=>"carsuser/{$soldcar->id}", 'method'=>'DELETE'])!!}
                        {!! Form::submit('Delete',["class"=>"btn btn-danger"]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        <tr>
        </tbody>
    </table>
    {!! Form::open(['url'=>"carsuser", 'method'=>'GET'])!!}
    {!! Form::submit('DONE',["class"=>"btn btn-success"]) !!}
    {!! Form::close() !!}
</div>