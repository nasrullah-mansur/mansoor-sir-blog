<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  @include('back.components.head')
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  @include('back.components.navbar')
  
  @include('back.components.menu')
  
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row ">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title mb-0">{{ isset($title) ? $title : 'Your title here' }}</h3>
        </div>
        <div class="content-header-right col-md-6 col-12 text-md-right mb-1">
          @if (isset($add_btn))
          <a class="btn btn-primary " href="{{ isset($add_btn_link) ? $add_btn_link : '#' }}">{{ isset($add_btn) ? $add_btn : 'Add new item' }}</i></a>
          @endif
        </div>
      </div>
      <div class="content-body">
        @yield('content')
      </div>
    </div>
  </div>
  
  @include('back.components.footer')

  @include('back.components.script')
</body>
</html>