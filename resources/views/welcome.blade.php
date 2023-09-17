@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/index.css')}}">
@endpush


@section('content')
<!-- Banner start -->
<section class="home-banner">
  
  <div class="container">
      <div class="row align-items-center">
          <div class="col-lg-6">
              <div class="img img-fluid">
                  <img src="{{ asset($banner ? $banner->image : 'front/images/dr.png') }}" alt="{{ theme() ? theme()->admin_name : '' }}" />
              </div>
          </div>
          <div class="col-lg-6">
              <div class="text">
                  <h1>{{ $banner ? $banner->title : 'Dr. Md. Gaousul Azam' }}</h1>
                  {!! $banner ? $banner->content : '' !!}
                  <a href="{{ $banner ? $banner->btn_link : '#' }}">{{ $banner ? $banner->btn_label : 'Know More' }}</a>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Banner end -->

<!-- Service start -->
<section class="home-service" id="courses">
  <div class="container">
      <div class="explore-title">
        <h2>Specialties include</h2>
    </div>
      <div class="row justify-content-center">
        @foreach ($specials as $special)
        <div class="col-lg-4 col-md-6">
            <a href="{{route('front.courses', $special->slug)}}">
                <div class="service-item">
                    <img src="{{ asset($special->image) }}" alt="{{ $special->title }}" />
                    <h4>{{ $special->title }}</h4>
                </div>
            </a>
        </div>
        @endforeach
      </div>
  </div>
</section>
<!-- Service end -->

<!-- Explore start -->
<section class="home-explore">
  <div class="container">
      <div class="explore-title">
          <h2>Explore Your Knowledge</h2>
      </div>
      <div class="row">
        @foreach ($videos as $video)
        <div class="col-lg-4" style="margin-bottom: 20px">
            <div class="img">
                <div class="ratio ratio-16x9">
                    {!! $video->iframe_link !!}
                </div>
            </div>
        </div>
        @endforeach
      </div>
  </div>
</section>
<!-- Explore end -->

<!-- Blog start -->
<section class="home-explore">
  <div class="container">
      <div class="explore-title">
          <h2>Latest Blogs</h2>
      </div>
      <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-lg-4" style="margin-bottom: 20px">
            <div class="blog-item">
                <div class="img">
                    <a href="{{ route('single.blog', $blog->slug) }}"><img class="img-fluid w-100" src="{{ asset($blog->image)}}" alt="{{$blog->title}}" /></a>
                </div>
                <div class="blog-text">
                    <div class="blog-item-title">
                        <a href="{{ route('blog.by.category', $blog->category->slug) }}" class="category">
                            {{$blog->category->title}}
                        </a>
                        <span class="time">
                            <i class="far fa-calendar"></i>
                            {{$blog->created_at->format('d M Y')}}
                        </span>
                    </div>

                    <div class="blog-content">
                        <h3>
                            <a href="{{route('single.blog', $blog->slug)}}">{{$blog->title}}</a>
                        </h3>
                        <p>
                            {{ $blog->content }}
                        </p>
                    </div>
                    <div class="read-more">
                        <a href="{{route('single.blog', $blog->slug)}}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center">
        <a href="{{ route('front.blog')}}" class="all-blog-btn">View All Blogs</a>
    </div>
  </div>
</section>
<!-- Blog end -->


@endsection