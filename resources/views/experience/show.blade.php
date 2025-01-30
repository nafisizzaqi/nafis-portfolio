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
                        {{ __('Detail Experience') }}
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid" style="background-color: #f6f6f6;}">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid" style="padding-left: 0px!important; padding-right: 0px!important">
            <!--begin::Card-->
            <div class="card table-responsive">
                <!--begin::Card header-->

                <!--begin::Card body-->
                <div class="card-body">
                    <!--begin::Details container-->
                    <div class="container">
                        <!--begin::Details-->
                        <div class="">
                            <div class="col-lg-6">
                                <!--begin::Name-->
                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">{{ __("Title") }}</label>
                                    <div class="text-dark fw-bold">{{ $experience->title }}</div>
                                </div>

                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">{{ __("Description") }}</label>
                                    <div class="text-dark fw-bold">{{ $experience->description }}</div>
                                </div>

                                <div class="mb-7">
                                    <label class="required fw-semibold fs-6 mb-2">{{ __("date") }}</label>
                                    <div class="text-dark fw-bold">{{ $experience->date }}</div>
                                </div>
                                <!--end::Name-->
                            </div>
                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::Details container-->

                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <a href="{{ route('experience.index') }}">
                            <button type="button" class="btn btn-light">{{ __("Back") }}</button>
                        </a>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
</x-app-layout>
