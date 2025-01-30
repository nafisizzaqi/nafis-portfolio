<x-app-layout>
    @if ($errors->any())
        <div id="is_invalid__"></div>
    @endif

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2" style="background-color: #f6f6f6;">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <!--begin::Toolbar wrapper-->
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bold fs-3 m-0">
                        {{ isset($hero) ? __('Edit Hero') : __('Create Hero') }}
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
    <div id="kt_app_content" class="app-content flex-column-fluid" style="background-color: #f6f6f6;">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid"
            style="padding-left: 0px!important; padding-right: 0px!important">
            <!--begin::Card-->
            <div class="card">
                <form action="{{ route('hero.store_or_update') }}" method="POST" enctype="multipart/form-data"
                    id="kt_account_profile_details_form" class="form">
                    @csrf
                    <div class="card-body py-4">
                        <!-- Input hidden untuk ID jika edit -->
                        <input type="hidden" name="id" value="{{ isset($hero) ? $hero->id : '' }}">

                        <div class="mb-7">
                            <label class="fw-semibold fs-6 mb-2">Image : </label>

                            @if (session('imagePath') || (isset($hero) && $hero->image))
                                <img src="{{ asset('storage/' . (session('imagePath') ?? $hero->image)) }}"
                                    alt="img" style="width: 100px;">
                            @endif

                            <input type="file" name="image" id="image"
                                class="form-control form-control-solid mb-3 mb-lg-0 {{ $errors->get('image') ? 'is-invalid border border-1 border-danger' : '' }}"
                                value="{{ old('image') }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Title</label>
                            <div class="col-lg-8">
                                <input type="text" name="title"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="title" value="{{ old('title', $hero->title ?? '') }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Description </label>
                            <div class="col-lg-8">
                                <input type="text" name="description"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="description"
                                    value="{{ old('description', $hero->description ?? '') }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('description')" />
                            </div>
                        </div>

                    </div>

                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                            {{ isset($hero) ? 'Save Changes' : 'Save Hero' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Content-->
</x-app-layout>
