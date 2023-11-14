@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('banner.update', $banners->id) }}" method="POST"
                                enctype="multipart/form-data">
                                {{-- <input id="hidden" type="hidden" name="hidden"> --}}
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="page_content_id" value="{{ $banners->id }}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Section</label>
                                            <input class="form-control" type="text" placeholder="Enter Section name"
                                                data-bs-original-title="" title="" name="section"
                                                value="{{ $banners->section }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Title</label>
                                            <input class="form-control" type="text" placeholder="Enter Title name"
                                                data-bs-original-title="" title="" name="title"
                                                value="{{ $banners->title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Description</label>
                                            <input class="form-control" type="text" placeholder="Enter Description name"
                                                data-bs-original-title="" title="" name="description"
                                                value="{{ $banners->description }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Button Title</label>
                                            <input class="form-control" type="text" placeholder="Enter Button Title"
                                                data-bs-original-title="" title="" name="button_title"
                                                value="{{ $banners->button_title }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Button Link</label>
                                            <input class="form-control" type="text" placeholder="Enter Button Link"
                                                data-bs-original-title="" title="" name="button_link"
                                                value="{{ $banners->button_link }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Upload Image</label>
                                            <input class="form-control" type="file" placeholder="Upload Image"
                                                data-bs-original-title="" title="" name="image">
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ asset('banner/' . $banners->image) }}" alt="" height="100px"
                                    width="100px" style="object-fit: contain;"> <br><br><br>

                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" class="btn btn-success me-3">Update</button>
                                            <a class="btn btn-danger" href="{{ route('banner.index') }}"
                                                data-bs-original-title="" title="">Cancel</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            $("input[type='file']").on("change", function() {
                if (this.files[0].size > 3000000) {
                    toastr.error("Please Upload file less than 3 Mb")
                    $(this).val('');
                }
            });
        </script>
    @endpush
@endsection
