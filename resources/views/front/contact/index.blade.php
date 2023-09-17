@extends('front.leyout.layout')


@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/contact.css')}}">
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>Contact Us</h2>
    </div>
</div>
<!-- Page banner end -->

<!-- Contact start -->
<section class="home-contact" id="contact">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-6 mx-auto">
                <div class="form">
                    <div class="section-title">
                        <h2>{{contact_section() ? contact_section()->form_title : 'Send Us a Message' }}</h2>
                        @if (contact_section())
                        <p>{{ contact_section()->form_description }}</p>
                        @endif
                        @if (Session::has('success'))
                          <p style="color: #f74d6c;" class="pb-2 mb-0">{{ Session::get('success') }}</p>
                      @endif
                    </div>
                    <form action="{{ route('user.contact.store')}}" method="POST">
                      @csrf
                        <div class="input-content">
                            <div class="input-item w-h">
                                <input type="text" placeholder="First name" name="first_name">
                                @if ($errors->has('first_name'))
                                    <small class="text-danger">{{ $errors->first('first_name') }}</small>
                                @endif
                            </div>
                            <div class="input-item w-h">
                                <input type="text" placeholder="Last name" name="last_name">
                                @if ($errors->has('last_name'))
                                    <small class="text-danger">{{ $errors->first('last_name') }}</small>
                                @endif
                            </div>
                            <div class="input-item">
                                <input type="email" placeholder="Your email" name="email">
                                @if ($errors->has('email'))
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                            <div class="input-item">
                                <input type="text" placeholder="Your phone" name="phone">
                                @if ($errors->has('phone'))
                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                @endif
                            </div>
                            <div class="input-item">
                                <input type="text" placeholder="Your subject" name="subject">
                                @if ($errors->has('subject'))
                                    <small class="text-danger">{{ $errors->first('subject') }}</small>
                                @endif
                            </div>
                            <div class="input-item">
                                <textarea name="message" placeholder="Leave us a message and we will get back in touch with you right away."></textarea>
                                @if ($errors->has('message'))
                                    <small class="text-danger">{{ $errors->first('message') }}</small>
                                @endif
                            </div>
                            <div class="submit-area">
                                <button type="submit">SUBMIT</button>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- Contact end -->
@endsection