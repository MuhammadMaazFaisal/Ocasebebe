@extends('admin_dashboard.layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form theme-form">
                        <form id="" action="{{route('page-content.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Select Page.*</label>
                                        <select  name="page_id" for="exampleFormControlInput10" class="form-control btn-square type" id="service">
                                         @foreach ($pages as $service )
                                             <option value="{{$service->id}}" class="form-control btn-square" id="exampleFormControlInput10">{{$service->page_name}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Section name</label>
                                        <input class="form-control" type="text" placeholder="Enter  Section name" data-bs-original-title="" title="" name="section_name" name="{{ old('section_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input class="form-control" type="text" placeholder="Enter Title name" data-bs-original-title="" title="" name="title" name="{{ old('title') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label>Upload Image</label>
                                        <input class="form-control" type="file" placeholder="Upload Image" data-bs-original-title="" title="" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea class="form-control editor" name="description" id="" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <button type="submit" id="" class="btn btn-success me-3">Add</button>
                                        <a class="btn btn-danger" href="{{route('page-content.index')}}" data-bs-original-title="" title="">Cancel</a>
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

<!-- {{-- script start --}} -->
@push('scripts')
<script>
    $("input[type='file']").on("change", function () {
        if(this.files[0].size > 3000000) {
            toastr.error("Please Upload file less than 3 Mb")
            $(this).val('');
        }
    });
    </script>
@endpush
@endsection

