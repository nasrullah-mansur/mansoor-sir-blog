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
                    
                    <div class="row">
                        @forelse ($blogs as $blog)
                        <div class="col-lg-4">
                            <div class="blog-item">
                                <div class="img">
                                    <a href="{{ route('single.up.blog', $blog->slug) }}"><img class="img-fluid w-100" src="{{ asset($blog->image)}}" alt="{{$blog->title}}" /></a>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-item-title">
                                        <a href="{{ route('up.blog.by.category', $blog->category->slug) }}" class="category">
                                            {{$blog->category->title}}
                                        </a>
                                        <span class="time">
                                            <i class="far fa-calendar"></i>
                                            {{$blog->created_at->format('d M Y')}}
                                        </span>
                                    </div>

                                    <div class="blog-content">
                                        <h3>
                                            <a href="{{route('single.up.blog', $blog->slug)}}">{{$blog->title}}</a>
                                        </h3>
                                        <p>
                                            {{ $blog->content }}
                                        </p>
                                    </div>
                                    <div class="read-more">
                                        <a href="{{route('single.up.blog', $blog->slug)}}">{{ $blog->button_text ? $blog->button_text : 'Read More' }}</a>
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
                   
                    <div class="sidebar-item">
                        <div class="category">
                            <h4>Categories</h4>
                            <ul>
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{route('up.blog.by.category', $category->slug)}}">
                                        <span>{{ $category->title }}</span>
                                        <span>({{$category->blogs->count()}})</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    

                    @if ($sidebar->mini_course == 'on')
                    
                    <div class="sidebar-item">
                        @if ($sidebar->mini_course == 'on')
                       @include('front.components.get_access_form', 
                       [
                        'drive_link' => $sidebar->mini_course_link,
                        'title' => $sidebar->mini_course_title
                        ])
                    @endif
                    </div>
                    @endif
    
                    @if ($sidebar->advertizement == 'on')
                    {!!targetAdvertizement($sidebar->advertizement_id)!!}
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->

@endsection