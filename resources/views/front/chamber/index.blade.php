@extends('front.leyout.layout', [$title = 'Our Chambers'])

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/chamber.css')}}">
@endpush

@push('page_plugin_css')
    <link rel="stylesheet" href="{{ asset('back/plugins/niceselect/nice-select.css') }}">
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>{{ $title }}</h2>
    </div>
</div>
<!-- Page banner end -->

<!-- Chamber section start -->
<section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="right-sidebar">
                    <div class="sidebar-filter sidebar-item">
                        <form action="{{route('front.chamber.set')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Select Days</label>
                                <select class="select2 form-control" name="day">
                                    <option selected value="{{null}}">All</option>
                                  @foreach ($days as $day)
                                  <option value="{{ $day->slug }}">{{ $day->day }}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('day'))
                                    <small class="text-danger">{{ $errors->first('day') }}</small>
                                @endif
                              </div>
                
                              <div class="form-group">
                                <label>Select Times</label>
                                
                                <select class="select2 form-control" name="time">
                                    <option selected value="{{null}}">All</option>
                                  @foreach ($times as $time)
                                  <option value="{{ $time->slug }}">{{ $time->time }}</option>
                                  @endforeach
                                </select>
                                @if ($errors->has('time'))
                                  <small class="text-danger">{{ $errors->first('time') }}</small>
                              @endif
                              </div>
                              <div class="form-actions">
                              <button type="submit" class="custom-btn">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-item">
                        <div class="subscriber-form">
                            <h4>Newsletter</h4>
                            <p class="text-centr">Make sure to subscribe to our newsletter and be the first to know the news make sure to subscribe to our newsletter.</p>
                            <form action="{{ route('subscriber.store') }}" method="POST">
                                @csrf
                                <input type="text" name="name" placeholder="Your name">
                                @if ($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @endif
                                <input type="email" name="email" placeholder="Email">
                                @if ($errors->has('email'))
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @endif
                                <button type="submit">Subscribe</button>
                                @if (Session::has('subscribed'))
                                <span class="text-primary d-block pt-1 text-center">Thank you for subscribing.</span>
                                @endif
                            </form>
                        </div>
                    </div>
                    @foreach (chamber_add() as $add)
                    <div class="sidebar-item">
                        <a href="{{$add->link}}" class="add">
                            <img class="img-fluid w-100" src="{{asset($add->image)}}" alt="{{$add->title}}" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="blog-content">
                    <div class="row">
                        @forelse ($chambers as $chamber)
                        <div class="col-lg-6">
                            <div class="blog-item">
                                <div class="img">
                                    <img class="img-fluid w-100" src="{{ asset($chamber->image)}}" alt="{{$chamber->chamber_name}}" />
                                </div>
                                <div class="blog-text">
                                    <div class="blog-item-title">
                                        <h3>{{$chamber->chamber_name}}</h3>
                                    </div>

                                    <div class="blog-content">
                                        <p class="m-0">
                                            <strong>Address </strong> {{ $chamber->address }}
                                        </p>
                                        <p class="m-0">
                                            <strong>Time </strong> {{ $chamber->time }}
                                        <p class="m-0">
                                            <strong>Day </strong> 
                                            (@foreach ($chamber->days as $cd)
                                            {{$cd->day}}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach)
                                        </p>
                                        <p class="m-0">
                                            <strong>Map </strong> <a href="{{$chamber->google_location}}">Google Map</a>
                                        </p>
                                        <p class="m-0">
                                            <strong>Contact </strong> {{ $chamber->serial_number }}
                                        </p>
                                    </div>
                                    <div class="read-more pt-3">
                                        <a href="#">Appoint Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="no-blog"><i class="far fa-frown-open"></i> No blog found <i class="far fa-frown-open"></i></p>
                        @endforelse
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</section>
<!-- Chamber section end -->

@endsection

@push('page_plugin_js')
<script src="{{ asset('back/plugins/niceselect/jquery.nice-select.min.js') }}"></script>
@endpush

@push('custom_page_js')
    <script>
        $('.select2').niceSelect();
    </script>
@endpush