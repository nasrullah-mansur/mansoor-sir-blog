<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        
        <li class=" nav-item {{ Route::is('blog.*') ? 'active open' : '' }}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Blog</span></a>
          <ul class="menu-content">
              <li class="{{ Route::is('blog.index', 'blog.create', 'blog.edit') ? 'active' : '' }}">
                  <a class="menu-item" href="{{ route('blog.index') }}">Blogs</a>
              </li>
              <li class="{{ Route::is('blog.category.*') ? 'active' : '' }}">
                  <a class="menu-item" href="{{ route('blog.category.index') }}">Categories</a>
              </li>
              <li class=" {{ Route::is('comment.index') ? 'active' : ''}}">
                  <a class="menu-item" href="{{route('comment.index')}}">Comment</a>
              </li>
          </ul>
        </li>

        <li class=" nav-item {{ Route::is('main.course.index', 'main.course.create', 'main.course.edit') ? 'active open' : '' }}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Main Course</span></a>
          <ul class="menu-content">
              <li class="{{ Route::is('main.course.index', 'main.course.create', 'main.course.edit') ? 'active' : '' }}">
                  <a class="menu-item" href="{{ route('main.course.index') }}">All Course</a>
              </li>
          </ul>
        </li>
        
        <li class=" nav-item {{ Route::is('main.course.blog.*') ? 'active open' : '' }}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Main Course Blog</span></a>
          <ul class="menu-content">
              <li class="{{ Route::is('main.course.blog.index', 'main.course.blog.create', 'main.course.blog.edit') ? 'active' : '' }}">
                  <a class="menu-item" href="{{ route('main.course.blog.index') }}">Blogs</a>
              </li>
              <li class="{{ Route::is('main.course.blog.category.*') ? 'active' : '' }}">
                  <a class="menu-item" href="{{ route('main.course.blog.category.index') }}">Categories</a>
              </li>
              <li class=" {{ Route::is('comment.index') ? 'active' : ''}}">
                  <a class="menu-item" href="{{route('comment.index')}}">Comment</a>
              </li>
          </ul>
        </li>
        
        


        <li class=" nav-item {{ Route::is('custom.page.*', 'comment.custom.*') ? 'active' : ''}}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Other Pages</span></a>
          <ul class="menu-content">
            <li class=" nav-item {{ Route::is('custom.page.*') ? 'active' : ''}}">
              <a href="{{route('custom.page.index')}}">Other Pages</span></a>
            </li>
            <li class=" nav-item {{ Route::is('comment.custom.*') ? 'active' : ''}}">
              <a href="{{route('comment.custom.index')}}">Other Pages Comment</span></a>
            </li>
          </ul>
        </li>

        
        <li class=" nav-item {{ Route::is('image_gallery_category.*', 'video_gallery_category.*') ? 'active open' : '' }}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Youtube Video</span></a>
          <ul class="menu-content">
            <li class="{{ Route::is('video_gallery.*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('video_gallery.index') }}">Video</a>
            </li>
            <li class="{{ Route::is('video_gallery_category.*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('video_gallery_category.index') }}">Video Category</a>
            </li>
          </ul>
        </li>


        <li class=" nav-item ">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Sections</span></a>
          <ul class="menu-content">
            <li class="{{ Route::is('banner.*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('banner.edit') }}">Banner</a>
            </li>
            <li class="{{ Route::is('specialties.*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('specialties.index') }}">Specialties</a>
            </li>

            
            <li class="{{ Route::is('advertizement.*') ? 'active' : '' }}">
                <a class="menu-item" href="{{ route('advertizement.index') }}">Advertizement</a>
            </li>
          </ul>
        </li>

        <li class=" nav-item {{ Route::is('admin.admin.*', 'admin.admin') ? 'active' : ''}}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Users</span></a>
          <ul class="menu-content">
            <li class="{{ Route::is('admin.admin.*', 'admin.admin') ? 'active' : '' }}">
                <a class="menu-item" href="{{route('admin.admin')}}">Admins</a>
            </li>
          </ul>
        </li>

        <li class=" nav-item {{ Route::is('contact.section.*', 'contact.section', 'chamber.*') ? 'active' : ''}}">
          <a href="#"><i class="ft-box"></i><span class="menu-title">Contact</span></a>
          <ul class="menu-content">
            <li class="{{ Route::is('contact.section.*', 'contact.section') ? 'active' : '' }}">
                <a class="menu-item" href="{{route('contact.section')}}">Section</a>
            </li>
            
            
            <li class=" nav-item {{ Route::is('user.contact', 'user.contact.show') ? 'active' : ''}}">
                <a href="{{route('user.contact')}}"><span class="menu-title">Contact</span></a>
            </li>
          </ul>
        </li>



        <li class=" nav-item {{ Route::is('appearance.edit') ? 'active' : ''}}">
            <a href="{{route('appearance.edit')}}"><i class="ft-box"></i><span class="menu-title">Appearance</span></a>
        </li>

        <li class=" nav-item {{ Route::is('menu.*', 'menuItem.*') ? 'active' : ''}}">
            <a href="{{route('menu.index')}}"><i class="ft-box"></i><span class="menu-title">Menu</span></a>
        </li>

        <li class=" nav-item {{ Route::is('subscriber.*') ? 'active' : ''}}">
            <a href="{{route('subscriber.index')}}"><i class="ft-box"></i><span class="menu-title">Subscribers</span></a>
        </li>

        <li class=" nav-item {{ Route::is('course.*') ? 'active' : ''}}">
            <a href="{{route('course.index')}}"><i class="ft-box"></i><span class="menu-title">Freebies</span></a>
        </li>
        
        <li class=" nav-item {{ Route::is('social.*') ? 'active' : ''}}">
            <a href="{{route('social.index')}}"><i class="ft-box"></i><span class="menu-title">Social</span></a>
        </li>

        
      </ul>
    </div>
  </div>