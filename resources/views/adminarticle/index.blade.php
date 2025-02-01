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
                        {{ __('Manage Article') }}
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
                            <form action="{{ route('adminarticle.index') }}" method="GET">
                                <input type="text" id="user-search" name="search" data-kt-user-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-13" placeholder="Search skill"  value="{{ request('search') }}" />
                            </form>
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            @can ('adminarticle-create')
                            <a href="{{ route('adminarticle.create') }}" class="btn btn-primary">
                                <i class="ki-outline ki-plus fs-2"></i> Add Article
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

                                <th class="min-w-125px">Title</th>
                                <th class="min-w-125px text-start">Avatar--</th>
                                <th class="min-w-125px">Author</th>
                                <th class="min-w-125px">Content</th>
                                <th class="min-w-125px">created at</th>
                                @canany(['adminarticle-edit', 'adminarticle-show', 'adminarticle-delete'])
                                <th class="text-center min-w-100px">Actions</th>
                                @endcanany
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @foreach ($articles as $article)
                                <tr>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('adminarticle.show', ['adminarticle' => $article->id]) }}"
                                                class="text-gray-800 text-hover-primary mb-1"></a>
                                            <span>{{ $article->title }}</span>
                                        </div>
                                    </td>

                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        @if ($article->image)
                                            <div class="image__  me-3"
                                                style="width: 40px; height: 40px; overflow: hidden">
                                                <a href="{{ asset('media/images/' . $article->image) }}" target="_blank" >
                                                    <img src="{{ asset('media/images/' . $article->image) }}" class="rounded-full"
                                                        alt="skill Profile"
                                                        style="width: 100%; height:100%; object-fit: cover;">
                                                </a>
                                            </div>
                                        @else
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="#">
                                                    <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                        {{ substr($article->title, 0, 1) }}</div>
                                                </a>
                                            </div>
                                        @endif
                                        <!--end::Avatar-->
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('adminarticle.show', ['adminarticle' => $article->id]) }}"
                                                class="text-gray-800 text-hover-primary mb-1"></a>
                                            
                                        </div>
                                        <!--begin::User details-->
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('adminarticle.show', ['adminarticle' => $article->id]) }}"
                                                class="text-gray-800 text-hover-primary mb-1"></a>
                                            <span>{{ $article->author }}</span>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('adminarticle.show', ['adminarticle' => $article->id]) }}"
                                                class="text-gray-800 text-hover-primary mb-1"></a>
                                            <span>{{ Str::limit( $article->content, 20 ) }}</span>
                                        </div>
                                    </td>

                                    <td>{{ $article->created_at }}</td>
                                    @canany(['adminarticle-edit', 'adminarticle-show', 'adminarticle-delete'])
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                @can('adminarticle-edit')
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('adminarticle.edit', ['adminarticle' => $article->id]) }}"
                                                        class="menu-link px-3">Edit</a>
                                                </div>
                                                @endcan
                                                @can('adminarticle-show')
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('adminarticle.show', ['adminarticle' => $article->id]) }}"
                                                        class="menu-link px-3">Show</a>
                                                </div>
                                                @endcan
                                                @can('adminarticle-delete')
                                                <div class="menu-item px-3">
                                                    <form id="delete-form-{{ $article->id }}"
                                                        action="{{ route('adminarticle.destroy', ['adminarticle' => $article->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#" class="menu-link px-3"
                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $article->id }}').submit();">Delete</a>
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
                        {{ $articles->links('vendor.pagination.bootstrap-4') }}
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
