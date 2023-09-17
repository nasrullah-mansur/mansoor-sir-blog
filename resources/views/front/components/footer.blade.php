<!-- Footer start -->
<footer class="home-footer">
  <div class="container">
      <div class="row">
          <div class="col-lg-3">
              <div class="flow">
                  <h4 class="flow">
                      Follow <br />
                      Mansoor Suhail
                  </h4>
                  <ul class="footer-social">
                    @foreach (socials() as $social_media)
                    <li>
                        <a target="{{ $social_media->target }}" href="{{ $social_media->link }}"><i class="{{ $social_media->icon }}"></i></a>
                    </li>
                    @endforeach
                  </ul>
              </div>
          </div>
          <div class="col-lg-3 col-md-4">
              <ul class="footer-link">
                @foreach (footer_left() as $left_menu)
                <li class="{{$left_menu->class}}" target="{{$left_menu->target}}"><a href="{{ $left_menu->slug }}">{{ $left_menu->label }}</a></li>
                @endforeach
              </ul>
          </div>
          <div class="col-lg-3 col-md-4">
              <ul class="footer-link">
                @foreach (footer_middle() as $middle_menu)
                <li class="{{$middle_menu->class}}" target="{{$middle_menu->target}}"><a href="{{ $middle_menu->slug }}">{{ $middle_menu->label }}</a></li>
                @endforeach
              </ul>
          </div>
          <div class="col-lg-3 col-md-4">
              <ul class="footer-link">
                @foreach (footer_right() as $right_menu)
                <li class="{{$right_menu->class}}" target="{{$right_menu->target}}"><a href="{{ $right_menu->slug }}">{{ $right_menu->label }}</a></li>
                @endforeach
              </ul>
          </div>
      </div>
  </div>
  <div class="copyright">
      <p>Copyrighted &copy; 2023 by Mansoor Suhail</p>
  </div>
</footer>
<!-- Footer end -->