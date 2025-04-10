<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        @include('layouts.partials._head')
    </head>

	<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" data-kt-app-aside-push-footer="true" class="app-default">
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
                @include('layouts.partials._header')
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                    @include('layouts.partials._sidebar')

                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main" style="padding-left: 20px; padding-right: 20px">
						<div class="d-flex flex-column flex-column-fluid">
							{{ $slot }}
						</div>
                        @include('layouts.partials._footer')
					</div>
				</div>
			</div>
		</div>
        @include('layouts.partials._script')
	</body>

	@if (session('message'))
        {{-- @dd(session("message")) --}}
        <x-toast type="{{ session('message')['status'] == 'success' ? 'success' : 'danger' }}"
            message="{{ session('message')['message'] }}" />
    @endif

</html>
