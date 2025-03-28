<div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar" style="padding-left: 20px">
    <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1 d-none d-md-block">
        <div id="kt_header_search" class="header-search d-flex align-items-center w-lg-350px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="true" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
            <div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
                <div class="d-flex">
                    <i class="ki-outline ki-magnifier fs-1 fs-1"></i>
                </div>
            </div>
            <form data-kt-search-element="form" class="d-none d-lg-block w-100 position-relative mb-5 mb-lg-0" autocomplete="off">
                <input type="hidden" />
                <i class="ki-outline ki-magnifier search-icon fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-5"></i>
                <input type="text" class="search-input form-control form-control border-0 h-lg-45px ps-13" name="search" value="" placeholder="search" data-kt-search-element="input" />
                <span class="search-spinner position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                    <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                </span>
                <span class="search-reset btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
                    <i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>
                </span>
            </form>
        </div>
    </div>
    <div class="app-navbar-item ms-2 ms-lg-6 me-lg-8 ms-n2 me-6" id="kt_header_user_menu_toggle">
        <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-lg-45px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            @if (Auth::user()->avatar)
            <img src="{{ auth()->user()?->avatar ?? '/default-avatar.png' }}" alt="Avatar">
            @else
                <div class="symbol-label fs-3 bg-light-danger text-danger">{{ substr(Auth::user()->name, 0, 1) }}</div>
            @endif
        </div>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <div class="symbol symbol-50px symbol-circle me-5">
                        @if (Auth::user()->avatar)
                            <img src="{{ URL::asset("media/avatars/" . Auth::user()->avatar)}}" alt="Photo Profile" />
                        @else
                            <div class="symbol-label fs-3 bg-light-danger text-danger">{{ substr(Auth::user()->name, 0, 1) }}</div>
                        @endif
                    </div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}
                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{ Auth::user()->getRoleNames()->first() }}</span></div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                    </div>
                </div>
            </div>
            <div class="separator my-2"></div>
            <div class="menu-item px-5">
                <a href="{{route('account.profile.edit')}}" class="menu-link px-5">{{ __('Profile Settings') }}</a>
            </div>
            <div class="menu-item px-5">
                <a href="{{route('account.profile.password')}}" class="menu-link px-5">{{ __('Change Password') }}</a>
            </div>
            <div class="menu-item px-5">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();" class="menu-link px-5">
                                {{ __('Log Out') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="app-navbar-item ms-2 ms-lg-6 me-lg-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" onclick="event.preventDefault();
                        this.closest('form').submit();"  class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px">
                <i class="ki-outline ki-exit-right fs-1"></i>
            </a>
        </form>
    </div> -->
    <!-- <div class="app-navbar-item ms-2 ms-lg-6 ms-n2 me-3 d-flex d-lg-none">
        <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px" id="kt_app_aside_mobile_toggle">
            <i class="ki-outline ki-burger-menu-2 fs-2"></i>
        </div>
    </div> -->
</div>
