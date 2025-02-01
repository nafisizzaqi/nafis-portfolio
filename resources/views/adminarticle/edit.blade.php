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
                        {{ __('Edit Article') }}
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
                <form id="kt_modal_add_skill_form" class="form" action="{{ route('adminarticle.update', $article->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body py-4">
                        <div class="mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control form-control-solid mb-3 mb-lg-0 {{ $errors->get("title") ? "is-invalid border border-1 border-danger" : "" }}" placeholder="Full title"
                                value="{{ $article->title }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div class="mb-7">
                            <label class="fw-semibold fs-6 mb-2">Avatar</label>
                            @if ($article->image)
                                <div class="image__  me-3 mb-2" style="width: 50px; height: 50px; overflow: hidden">
                                    <img src="{{ asset('media/images/' . $article->image) }}" class="rounded-full" alt="User Avatar"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            @endif
                            <input type="file" name="image" id="image"
                                class="form-control form-control-solid mb-3 mb-lg-0 {{ $errors->get('image') ? 'is-invalid border border-1 border-danger' : '' }}"
                                value="{{ old('image') }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div class="mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Author</label>
                            <input type="text" name="author" id="author"
                                class="form-control form-control-solid mb-3 mb-lg-0 {{ $errors->get("author") ? "is-invalid border border-1 border-danger" : "" }}" placeholder="Full Author"
                                value="{{ $article->author }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('author')" />
                        </div>

                        <div class="mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Content</label>
                            <input type="text" name="content" id="content"
                                class="form-control form-control-solid mb-3 mb-lg-0 {{ $errors->get("content") ? "is-invalid border border-1 border-danger" : "" }}" placeholder="Full Content"
                                value="{{ $article->content }}" />
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a href="{{ route('adminarticle.index') }}">
                            <button type="button" class="btn btn-light me-3">Cancel</button>
                        </a>
                        <!-- <button type="submit" class="btn btn-primary me-3" name="update_and_continue_editing" value="1">
                            <span class="indicator-label" id="submitAndOther">Update & Continue Editing</span>
                        </button> -->
                        <button type="submit" class="btn btn-primary" name="update">
                            <span class="indicator-label" id="submit">Submit</span>
                        </button>
                    </div>
                </form>
        </div>
    </div>


</x-app-layout>
