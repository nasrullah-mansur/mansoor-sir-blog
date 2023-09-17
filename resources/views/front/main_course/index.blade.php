@extends('front.leyout.layout', [$title = 'Our Blogs'])

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/blog.css')}}">
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>Our Valuable Courses</h2>
    </div>
</div>
<!-- Page banner end -->

<!-- Blog section start -->
<section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-content">
                    
                    <div class="row">
                        @forelse ($courses as $course)
                        <div class="col-lg-4">
                            <div class="blog-item shadow course-image">
                                
                                <div class="course-menu">
                                    <span class="close-btn">
                                        <i class="fas fa-times"></i>
                                    </span>
                                    <ul>
                                        <li><a target="_blank" href="{{ $course->mini_course_link }}">Mini Course</a></li>
                                        <li><a target="_blank" href="{{ $course->blog_route }}">Related Blogs</a></li>
                                        <li><a target="_blank" href="{{ $course->complementary_route }}">Complementary Modules</a></li>
                                        <li><a target="_blank" href="{{ $course->social_proof_route }}">Social Proof</a></li>
                                        <li><a target="_blank" href="{{ $course->buy_now_link }}">Buy Now</a></li>
                                    </ul>
                                </div>
                                <div class="img">
                                    <span class="drop-btn">
                                        <i class="fas fa-bars"></i>
                                    </span>
                                    <img class="img-fluid w-100" src="{{ asset($course->image)}}" alt="{{$course->title}}" />
                                </div>
                                <div class="blog-text course-title">
                                    <h3>{{ $course->title }} {{$course->blog_test}}</h3>
                                    <div class="read-more">
                                        <a class="d-block text-center py-2" href="#">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p class="no-blog"><i class="far fa-frown-open"></i> No course found <i class="far fa-frown-open"></i></p>
                        @endforelse
                    </div>
                </div>
                <div class="paginate-area">
                    {{ $courses->onEachSide(3)->links() }}
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- Blog section end -->

@endsection