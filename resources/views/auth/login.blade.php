
@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('front/css/pages/account.css') }}">
@endpush

@section('content')
<!-- Log In start -->
<section class="login">
    <div class="container">
        <div class="account-form">
            <h2 class="text-center">Log In</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    @if ($errors->any())
                    <small class="text-danger">{{ $errors->first() }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="mb-3 form-check">
                    <input name="remember" type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Check me logged in</label>
                </div>

                <button type="submit" class="btn btn-primary">Log In</button> 
                <hr>
                <div class="footer-notice text-center">
                    <p class="m-0">Forgot password? <a href="{{route('password.request')}}">Reset now</a></p>
                    <p class="m-0">Don't have account? <a href="{{route('register')}}">Register now</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Log In end -->
@endsection
