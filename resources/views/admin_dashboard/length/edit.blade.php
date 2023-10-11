@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">


                    <div class="card-body">
                        <div class="form theme-form">
                            <form id="" action="{{ route('update.length', ['id' => $length->id]) }}" method="POST">
                                @csrf
                                @method('Put')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label>Edit Length</label>
                                            <input class="form-control" type="text" placeholder="Enter Length Value"
                                                data-bs-original-title="" title="" name="name"
                                                value="{{ $length->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <button type="submit" id="" class="btn btn-success me-3">Update</button>
                                            <a class="btn btn-danger" href="{{ route('admin.length') }}"
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



    <!-- Individual column searching (text inputs) Ends-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>.
@endsection
