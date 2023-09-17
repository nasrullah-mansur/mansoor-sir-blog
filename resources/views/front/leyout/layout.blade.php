<!DOCTYPE html>
<html lang="en">
  @include('front.components.head')

  <body>

    @include('front.components.header')

    <!-- ===================================== -->

      @yield('content')

    <!-- ===================================== -->
    @include('front.components.footer')

    @include('front.components.script')
  </body>
</html>
