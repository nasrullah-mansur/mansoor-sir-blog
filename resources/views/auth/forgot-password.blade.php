@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('front/css/pages/account.css') }}">
@endpush

@section('content')
<!-- Log In start -->
<section class="login">
    <div class="container">
        <div class="account-form">
            <h2 class="text-center">Reset Password</h2>
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <p class="text-center">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                
                <div class="mb-3">
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                    @if ($errors->any())
                    <small class="text-danger">{{ $errors->first() }}</small>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Email Password Reset Link</button> 
                </div>

                @if (Session::has('status'))
                    <p class="mb-0 mt-1 text-center color-primary">{{ Session::get('status') }}</p>
                @endif
                
            </form>
        </div>
    </div>
</section>
<!-- Log In end -->
@endsection



