<x-app-layout>
    @if ($errors->any())
        <div id="is_invalid__"></div>
    @endif
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2" style="background-color: #f6f6f6;}">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        {{ __('Manage Portfolio') }}
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid" style="background-color: #f6f6f6;}">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid" style="padding-left: 0px!important; padding-right: 0px!important">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                            <form action="{{ route('portfolio.index') }}" method="GET">
                                <input type="text" id="user-search" name="search" data-kt-user-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search portfolio"  value="{{ request('search') }}" />
                            </form>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            @can ('portfolio-create')
                            <a href="{{ route('portfolio.create') }}" class="btn btn-primary">
                                <i class="ki-outline ki-plus fs-2"></i> Add Portfolio
                            </a>
                            @endcan
                        </div>
                        
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table id="skills-table" class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_skills">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                <th class="min-w-125px text-start">Image</th>
                                <th class="min-w-125px">Title</th>
                                <th class="min-w-125px">Description</th>
                                <th class="min-w-125px">Date</th>
                                <th class="min-w-125px">created at</th>
                                @canany(['portfolio-edit', 'portfolio-show', 'portfolio-delete'])
                                <th class="text-center min-w-100px">Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($portfolios as $portfolio)
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        @if ($portfolio->image)
                                            <div class="image__  me-3"
                                                style="width: 100px; height: 70px; overflow: hidden">
                                                <a href="{{ asset('media/images/' . $portfolio->image) }}" target="_blank">
                                                    <img src="{{ asset('media/images/' . $portfolio->image) }}"
                                                        alt="portfolio Profile"
                                                        style="width: 100%; height:100%; object-fit: cover;">
                                                </a>
                                            </div>
                                        @else
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="#">
                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                        {{ substr($portfolio->title, 0, 1) }}</div>
                                                </a>
                                            </div>
                                        @endif
                                        <!--end::Avatar-->
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('portfolio.show', ['portfolio' => $portfolio->id]) }}"
                                                class="text-gray-800 text-hover-primary mb-1"></a>
                                            <span>{{ $portfolio->title }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('portfolio.show', ['portfolio' => $portfolio->id]) }}"
                                                class="text-gray-800 text-hover-primary mb-1"></a>
                                            <span>{{ $portfolio->description }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('portfolio.show', ['portfolio' => $portfolio->id]) }}"
                                                class="text-gray-800 text-hover-primary mb-1"></a>
                                            <span>{{ $portfolio->date }}</span>
                                        </div>
                                    </td>

                                    

                                    <td>{{ $portfolio->created_at }}</td>
                                    @canany(['portfolio-edit', 'portfolio-show', 'portfolio-delete'])
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                @can('portfolio-edit')
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('portfolio.edit', ['portfolio' => $portfolio->id]) }}"
                                                        class="menu-link px-3">Edit</a>
                                                </div>
                                                @endcan
                                                @can('portfolio-show')
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('portfolio.show', ['portfolio' => $portfolio->id]) }}"
                                                        class="menu-link px-3">Show</a>
                                                </div>
                                                @endcan
                                                @can('portfolio-delete')
                                                <div class="menu-item px-3">
                                                    <form id="delete-form-{{ $portfolio->id }}"
                                                        action="{{ route('portfolio.destroy', ['portfolio' => $portfolio->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#" class="menu-link px-3"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $portfolio->id }}').submit();">Delete</a>
                                                    </form>
                                                </div>
                                                @endcan
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                    <div class="pagination float-end">
                        {{ $portfolios->links('vendor.pagination.bootstrap-4') }}
                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

</x-app-layout>
