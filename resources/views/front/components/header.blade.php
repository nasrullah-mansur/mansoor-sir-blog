
  <!-- Header start -->
  <header class="home-header">
      @if (contact_section())
    <div class="top">
        <ul>
            <li>
                <a href="tel:{{contact_section()->phone}}"><i class="fas fa-phone-alt"></i> {{contact_section()->phone}}</a>
            </li>
            <li>
                <a href="mailto:{{contact_section()->email}}"><i class="far fa-envelope"></i> {{contact_section()->email}}</a>
            </li>
        </ul>
    </div>
    @endif
    <div class="main-menu">
        <div class="container-fluid">
            <div class="menu-content">
                <div class="logo">
                    <a href="{{ url('/') }}">
                      <img src="{{ asset(logo()) }}" alt="{{ theme() ? theme()->theme_name : '' }}" />
                    </a>
                </div>
                <div class="list">

                    <ul>
                      @foreach (main_menu() as $menu)
                        <li {{ $menu->class ? $menu->class : '' }}>
                          <a target="{{ $menu->target }}" href="{{ $menu->slug }}">{{ $menu->label }} @if($menu->menuItem->count() != 0) <i class="fas fa-chevron-down"></i>@endif</a>
                          @if ($menu->menuItem->count() != 0)
                          <ul>
                            @foreach ($menu->menuItem as $submenu)
                            
                              <li {{ $submenu->class ? $submenu->class : '' }}>
                                <a target="{{ $submenu->target }}" href="{{ $submenu->slug }}">{{ $submenu->label }}</a>
                                @if ($submenu->childMenuItem->count() != 0)
                                <ul class="sub-sub-menu">
                                    @foreach ($submenu->childMenuItem as $subsubmenu)
                                    <li>
                                        <a target="{{ $subsubmenu->target }}" href="{{ $subsubmenu->slug }}">{{ $subsubmenu->label }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                              </li>
                              @endforeach
                            </ul>
                            @endif
                          </li>
                        @endforeach
                    </ul>
                </div>
                <div class="account">
                    <ul>
                        <li>
                            <a class="appointment" href="{{ route('contact.page') }}">
                                <span>Contact US</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mobile">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header end -->