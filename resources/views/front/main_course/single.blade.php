@extends('front.leyout.layout', [$title = $blog->title])

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/blog.css')}}">
@endpush

@push('custom_page_css')
@if ($blog->custom_css)
    <style>
        {!! $blog->custom_css !!}
    </style>
    @endif
@endpush




@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset($course->image) }});">
  <div class="container">
      <h2>{{ $blog->title }}</h2>
  </div>
</div>
<!-- Page banner end -->
   <!-- Blog section start -->
   <section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="single-blog">
                    <div class="single-blog-title">
                        <h2>{{ $blog->title }}</h2>
                        {{$blog->category->title}}
                        
                      <span class="time">
                          <i class="far fa-calendar"></i>
                          {{$blog->created_at->format('d M Y')}}
                      </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="single-blog">
                    
                    <img class="w-100 img-fluid" src="{{ asset($blog->image) }}" alt="{{$blog->title}}">
                    <div class="description">
                        <p>{{$blog->content}}</p>
                    </div>

                    <div class="details">
                        {!! $blog->details !!}
                    </div>

                    <div class="next-prev">
                        <ul>
                          @if ($previous_blog)
                          <li>
                              <a href="{{ route('main.course.single.blog', [$course->slug, $previous_blog->slug]) }}">
                                  <span>Previous blog</span>
                                  <p>{{ $previous_blog->title }}</p>
                              </a>
                          </li>
                          @endif
                          @if ($next_blog)
                          <li class="text-lg-end">
                              <a href="{{ route('main.course.single.blog', [$course->slug, $next_blog->slug]) }}">
                                  <span>Next blog</span>
                                  <p>{{ $next_blog->title }}</p>
                              </a>
                          </li>
                          @endif
                        </ul>
                    </div>

                    <div class="also-like">
                        <h3>You may also like</h3>
                        <div class="row">
                          @foreach ($other_blogs as $like)
                          <div class="col-lg-4">
                            <div class="blog-item">
                                <div class="img">
                                    <a href="{{ route('main.course.single.blog', [$course->slug, $like->slug]) }}">
                                        <img class="img-fluid w-100" src="{{ asset($like->image) }}" alt="{{$like->title}}" />
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-content">
                                        <h3 class="mb-0">
                                            <a href="{{ route('main.course.single.blog', [$course->slug, $like->slug]) }}">{{ $like->title }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                          @endforeach
                        </div>
                    </div>
                    

                    @include('front.components.comment', ['comments' => $comments, 'route' => route('comment.upcoming.store')])


                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="right-sidebar">
                    
                    <div class="sidebar-item">
                        <div class="category">
                            <h4>Categories</h4>
                            <ul>
                                <li>
                                    <a href="{{ $course->mini_course_link }}">
                                        <span class="ms-0 mr-auto">Mini Course</span>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('front.main.course.blog.by.category', [$course->slug, $category->slug])}}">
                                        <span>{{ $category->title }}</span>
                                        <span>({{$category->blogs->count()}})</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-item">
                        <div class="category">
                            <h4>Our Courses</h4>
                            <ul>
                                @foreach ($courses as $course)
                                <li >
                                    <a class="border p-2" href="#">
                                        <span>{{ $course->title }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-item">
                        <a class="buy-btn" href="{{ $course->buy_now_link }}">Buy Now</a>
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

                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->
@endsection