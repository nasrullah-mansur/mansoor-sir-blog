@extends('front.leyout.layout')

@push('custom_page_css')

<style>
    .custom-contact {
        padding: 50px 0 30px;
    }
</style>

    <style>
        {!! $page->css !!}
    </style>
@endpush

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/blog.css')}}">
@endpush


@push('custom_page_js')
    <script>
        {!! $page->javascript !!}
    </script>
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset($page->image ? $page->image : 'front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>{{ $page->name }}</h2>
    </div>
</div>
<!-- Page banner end -->


<!-- Blog section start -->
   <section class="blog-page">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-9">
                <div class="single-blog">
                    {!! $page->html !!}

                    @include('front.components.comment', [
                        'comments' => $comments, 
                        'route' => route('comment.custom.store')
                        ])
                </div>
            </div>
            <div class="col-lg-3">
              <div class="right-sidebar">
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