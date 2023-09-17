@extends('front.leyout.layout')

@section('content')


<div class="container">
    <div class="py-5">
        <h2>Hello: {{ Auth::guard('web')->user()->name }}</h2>
        <h4>Welcome to your profile</h4>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            
            <button class="btn btn-primary" type="submit">Log Out</button>
            </form>
    </div>
</div>

@endsection