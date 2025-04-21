  {{-- @extends('app') --}}
  <!-- Navbar-->
  <header class="app-header">
    <ul class="app-nav" style="justify-content: start">
      <li class="app-search">
        <input class="app-search__input" type="search" placeholder="Search">
        <button class="app-search__button"><i class="bi bi-search"></i></button>
      </li>
      <!--Notification Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Show notifications"><i class="bi bi-bell fs-5"></i></a>
        <ul class="app-notification dropdown-menu dropdown-menu-right">
          <li class="app-notification__title">You have 4 new notifications.</li>
          <div class="app-notification__content">
            <ul>
              {{-- @foreach (auth()->user()->notifications as $notification)
                  <li>
                      {{ $notification->data['message'] }} 
                      <small>{{ $notification->created_at->diffForHumans() }}</small>
                  </li>
              @endforeach --}}
          </ul>
            {{-- @foreach(auth()->user()->notifications as $notification)
                  {{ $notification->data['message'] }}
              @endforeach --}}
          </div>
          <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
        </ul>
      </li>
      <!-- User Menu-->
      <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
        <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <li style="overflow: hidden"><a class="dropdown-item "  href="{{ route('settings.index') }}"><i class="bi bi-gear me-2 fs-5"></i> الاعدادت</a></li>
          <li style="overflow: hidden"><a class="dropdown-item " href="{{ route('profile.edit') }}"><i class="bi bi-person me-2 fs-5"></i> الملف الشخصي</a></li>
          <li>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button type="submit" class="dropdown-item" ><i class="bi bi-box-arrow-right me-2 fs-5"></i>تسجيل خروج</button>
            </form>
          </li>
        </ul>
      </li>
    </ul>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <a class="app-header__logo" style="font-size: 16px ;font-weight:bold" href="{{ route('dashboard') }}"> {{ $compony_name }} </a>
    <!-- Navbar Right Menu-->
  </header>