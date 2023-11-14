@extends('admin_dashboard.layouts.master')
@section('content')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/rating.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <!-- <h3>Inquiry Details</h3> -->
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">Reviews Detail</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Reviews</li>
    <li class="breadcrumb-item active"> Management</li>
@endsection

@section('content')
    <style>
        .deteleButton {
            background-color: #C1272D;
            color: #fff !important;
            font-family: Poppins-Regular;
            font-size: 11px;
            border-radius: 22px !important;
            outline: none;
            border: none;
            padding: 10px 20px !important;
        }

        .deteleButton a {
            color: #fff !important;
        }

        .editButton {
            background-color: #22B573;
            color: #fff !important;
            font-family: Poppins-Regular;
            font-size: 11px;
            border-radius: 22px !important;
            outline: none;
            border: none;
            padding: 10px 20px !important;
        }

        .editButton a {
            color: #fff !important;
        }

        .round-cstm-btn-green {
            border-radius: 30px !important;
            padding: 10px 20px !important;
            font-family: Poppins-Regular;
            background-color: #00a808 !important;
            border: none;
        }

        .round-cstm-btn-red a,
        .round-cstm-btn-green a {
            color: #fff;
            font-size: 14px;
        }

        .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper {
            height: 100% !important;

        }

        .for-review-comment {
            display: flex;
            align-items: end;
        }

        .for-review-comment span {
            margin-left: 4px;
            font-size: 20px;
            color: #989898;
        }

        .cstm-star-rate {
            flex-direction: row-reverse;
            justify-content: start;
            height: 40px;
            margin-top: 6px;
        }

        .cstm-star-rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }

        .cstm-star-rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 34px;
            color: #ccc;
        }

        .cstm-star-rate:not(:checked)>label:before {
            content: '★ ';
        }

        .cstm-star-rate>input:checked~label {
            color: #ffc700;
        }

        .cstm-star-rate:not(:checked)>label:hover,
        .cstm-star-rate:not(:checked)>label:hover~label {
            color: #ffc700;
        }

        .cstm-star-rate>input:checked+label:hover,
        .cstm-star-rate>input:checked+label:hover~label,
        .cstm-star-rate>input:checked~label:hover,
        .cstm-star-rate>input:checked~label:hover~label,
        .cstm-star-rate>label:hover~input:checked~label {
            color: #ffc700;

        }

        .goldenstar {
            color: #ffc700;
        }

        .btn-group-toggle {
            border-radius: 5px;
        }

        .btn-group-toggle .btn {
            margin: 3px;
            border-radius: 5px !important;
            width: 100px;
            padding: 5px 10px;
            border: 1px solid #ff2446;
        }

        .btn-group-toggle .btn.active {
            background: #ff2446;
            color: #ffffff;
        }

        .btn-group-toggle .btn:last-of-type {
            margin-right: 3px !important;
        }


        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="container-fluid" style="color: #000;">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="table-responsive product-table">
                                <table class="display" id="basic-1">
                                    <thead>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>User Email</th>
                                            <td>{{ $details->get_user->email ?? 'N/A' }}</td>
                                        </tr>
                                        {{-- update work 16 --}}
                                        <tr>
                                            <th>Product Name </th>
                                            <td>{{ $details->get_product->product_name ?? 'N/A' }}
                                                {{ $details->variations->attribute ?? '' }}</td>
                                        </tr>

                                        <tr>
                                            <th>Comments </th>
                                            <td>{{ $details->comments ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Reviews</th>
                                            <td>
                                                <div class="">
                                                    <div class="">
                                                        @php

                                                            $num = 5 - $details->rating;
                                                        @endphp
                                                        @for ($x = 1; $x <= $details->rating; $x++)
                                                            <i class="fa fa-star goldenstar "></i>
                                                        @endfor

                                                        @for ($x = 1; $x <= $num; $x++)
                                                            <i class="fa fa-star"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Approve Review</th>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="accept" name="status"
                                                        data-id="{{ $details->id }}"
                                                        @if ($details->status == 1 || $details->status == true) checked @endif>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Individual column searching (text inputs) Ends-->
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <a class="btn btn-success" href="{{ route('reviews') }}" data-bs-original-title=""
                            title="">Back</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/rating/jquery.barrating.js') }}"></script>
        <script src="{{ asset('assets/js/rating/rating-script.js') }}"></script>
        <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/js/ecommerce.js') }}"></script>
        <script src="{{ asset('assets/js/product-list-custom.js') }}"></script>
        <script>
            const els = document.getElementsByClassName("btn");

            for (let e of els) {
                e.addEventListener("click", setActive);
            }

            function setActive($event) {
                for (let e of els) {
                    e.classList.remove("active");
                }

                $event.target.classList.add("active");
            }
        </script>

        <script>
            jQuery(document).ready(function() {
                $('.accept').on('change', function(e) {
                    // alert('test');
                    e.preventDefault();
                    var id = $(this).attr("data-id");
                    // alert(id);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                        },
                        type: "POST",
                        url: "{{ route('review-toggle') }}",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                        },
                        success: function(response) {
                            if (response.status == 404) {
                                toastr.error('Some thing went wrong');
                            } else {
                                toastr.success('Review Status Updated Successfully');
                            }
                        }

                    });
                });
            });
        </script>
    @endsection
