@extends('front.leyout.layout')

@push('page_css')
    <link rel="stylesheet" href="{{asset('front/css/pages/gallery.css')}}">
@endpush

@section('content')
<!-- Page banner start -->
<div class="page-banner" style="background-image: url({{ asset('front/images/banner-bg.jpg') }});">
    <div class="container">
        <h2>{{ $title }}</h2>
    </div>
</div>
<!-- Page banner end -->


<!-- Gallery start -->
<div class="gallery-page">
    <div class="container">
        <div class="category">
            <ul>
                <li>
                    <a href="{{ route('video.gallery') }}">All</a>
                </li>
                @foreach ($categories as $category)
                <li class="{{ $active_slug == $category->slug ? 'active' : '' }}">
                    <a href="{{ route('video.gallery.category', $category->slug) }}">{{$category->title}}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="items">
            <div class="row">
                @foreach ($galleries as $gallery)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="ratio ratio-16x9">
                            {!! $gallery->iframe_link !!}
                          </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="paginate-area">
                {{ $galleries->onEachSide(3)->links() }}
            </div>
        </div>
    </div>
</div>
<!-- Gallery end -->
@endsection