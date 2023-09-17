{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}








@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{ asset('front/css/pages/account.css') }}">
@endpush

@section('content')
<!-- Log In start -->
<section class="login">
    <div class="container">
        <div class="account-form">
            <h2 class="text-center">Verify Email</h2>
            <p class="text-center p-2">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
            <div class="text-center">
                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button style="background: #066F75;" type="submit" class="btn btn-secondary">Resend Verification Email</button> 
                </form>
                <br>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Log Out</button> 
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Log In end -->
@endsection
