@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('front/css/pages/account.css') }}">
@endpush

@section('content')
<!-- Log In start -->
<section class="login">
    <div class="container">
        <div class="account-form">
            <h2 class="text-center">Register Now</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="name" class="form-control" id="name" placeholder="Name">
                    @if ($errors->has('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input name="phone" type="number" class="form-control" id="phone" placeholder="Phone">
                    @if ($errors->has('phone'))
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    @if ($errors->has('password'))
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password" placeholder="Confirm Password">
                    @if ($errors->has('password_confirmation'))
                    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                    @endif
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
                <hr>
                <div class="text-center">
                    <p class="mb-0 text-center">Alrady have any account? <a href="{{ route('login') }}">Log In</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Log In end -->
@endsection

