@extends('welcome')
@section('nav')
@endsection
<div class="container" style="margin-top: 50px;">
    <h2>{{Auth::user()->name}} Profile</h2>
</div>