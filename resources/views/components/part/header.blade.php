<div class="header">
  <div class="header-content">
    <nav class="navbar navbar-expand">
      <div class="collapse navbar-collapse justify-content-between">
        <div class="header-left">
          <div class="dashboard_bar">
          </div>
        </div>
        <ul class="navbar-nav header-right">
          <li class="nav-item">
            <div class="d-flex weather-detail">
              <span>@myprofile('nama_profile')</span>
              @myprofile('alamat')
            </div>
          </li>
          <li class="nav-item dropdown notification_dropdown">
            <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
              <i id="icon-light" class="fas fa-sun"></i>
              <i id="icon-dark" class="fas fa-moon"></i>

            </a>
          </li>
          @if (auth()->user()->role == 'admin')
          <li class="nav-item dropdown notification_dropdown">
            <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L2 7v2h20V7L12 2z" fill="#3E4954"/>
                <path d="M4 10v8h2v-6h2v6h2v-6h2v6h2v-6h2v6h2v-8H4z" fill="#3E4954"/>
                <rect x="2" y="20" width="20" height="2" fill="#3E4954"/>
              </svg>
              {{-- <span class="badge light text-white bg-primary rounded-circle">12</span> --}}
            </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
                    <ul class="timeline">
                      @foreach (App\Models\Admin\Profile::get() as $item)
                        <li style="">
                          <a href="{{ route('session-bank.index', $item->token_profile) }}">
                              <div class="timeline-panel">
                                <div class="media me-2">
                                  <img alt="image" width="50" src="{{ asset('') }}images/logo/{{ $item->logo }}">
                                </div>
                                <div class="media-body">
                                  <h6 class="mb-1">{{ $item->nama_profile }}</h6>
                                  <small class="d-block">29 July 2024 - 02:26 PM</small>
                                </div>
                              </div>
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                  <a class="all-notification" href="javascript:void(0)">See all notifications <i
                      class="ti-arrow-right"></i></a>
                </div>
            </li>
            @endif
          <li class="nav-item dropdown header-profile">
            <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
              <div class="header-info">
                <span class="text-black"><strong>{{ auth()->user()->name }}</strong></span>
                <p class="fs-12 mb-0">@ucfirst(auth()->user()->role)</p>
              </div>
              <img src="{{ auth()->user()->foto_user && file_exists(public_path('images/user/' . auth()->user()->foto_user)) ? asset('images/user/' . auth()->user()->foto_user) : asset('images/user/default.png') }}" width="20" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="/settings" class="dropdown-item ai-icon">
                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18"
                  height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span class="ms-2">Profile </span>
              </a>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                  <button type="submit" class="dropdown-item ai-icon">
                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18"
                      height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                      <polyline points="16 17 21 12 16 7"></polyline>
                      <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span class="ms-2">Logout </span>
                  </button>
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
