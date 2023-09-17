@extends('front.leyout.layout', [$title = 'Our Blogs'])

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/blog.css')}}">
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>{{ $title }}</h2>
    </div>
</div>
<!-- Page banner end -->

<!-- Blog section start -->
<section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog-content">
                    <div class="form-search">
                        <form action="{{route('blog.by.search.get')}}" method="POST" class="search-content">
                            @csrf
                            <input name="key" type="search" placeholder="Search here...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="row">
                        @forelse ($blogs as $blog)
                        <div class="col-lg-4">
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
                        @empty
                        <p class="no-blog"><i class="far fa-frown-open"></i> No blog found <i class="far fa-frown-open"></i></p>
                        @endforelse
                    </div>
                </div>
                <div class="paginate-area">
                    {{ $blogs->onEachSide(3)->links() }}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="right-sidebar">
                    @if ($sidebar)
                    <div class="sidebar-item">
                        <div class="cta">
                            <img src="{{ asset($sidebar->image) }}" alt="{{$sidebar->content}}" />
                            <p>{{ $sidebar->content }}</p>
                            <a href="{{$sidebar->btn_link}}">{{$sidebar->btn_text}}</a>
                        </div>
                    </div>
                    @endif
                    <div class="sidebar-item">
                        <div class="category">
                            <h4>Categories</h4>
                            <ul>
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('blog.by.category', $category->slug)}}">
                                        <span>{{ $category->title }}</span>
                                        <span>({{$category->blogs->count()}})</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
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

                    @foreach (blog_add() as $add)
                    <div class="sidebar-item">
                        <a href="{{$add->link}}" class="add">
                            <img class="img-fluid w-100" src="{{asset($add->image)}}" alt="{{$add->title}}" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->

@endsection