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
    <h3 class="welcome-dashboard-heading glitch glitch layers" data-text="Inquiry Details">User Details</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">User</li>
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
</style>
    <div class="container-fluid" style="color: #000;">
        <div class="row">
            <!-- Individual column searching (text inputs) Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <table class="display" id="basic-1">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $detail->first_name  }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $detail->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $detail->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>{{ $detail->contact ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>D.O.B</th>
                                        <td>{{ $detail->day ?? '' }}/{{ $detail->month ?? ''}}/{{ $detail->year ?? ''}}</td>
                                    </tr>
                                     <tr>
                                         <th>Address</th>
                                         <td>{{ $detail->address ?? '' }}</td>
                                     </tr>
                                     <tr>
                                         <th>Zip code</th>
                                         <td>{{ $detail->zip_code ?? '' }}</td>
                                     </tr>

                                    <tr>
                                        <th>Cosmetology License Number</th>
                                        <td>{{ $detail->cosmetology_license_number ?? '' }}</td>
                                    </tr>
                                     <tr>
                                         <th>Professional Details</th>
                                         <td>{{ $detail->professional_details ?? '' }}</td>
                                     </tr>
                                     {{-- <tr>

                                        <th>Copy of Business License</th>
                                        <td> @if(!empty( $detail->business_license_copy))
                                            <iframe src="{{ url('public/business_licenses/' . $detail->business_license_copy) }}">

                                            </iframe>

                                            @endif
                                        </td>

                                     </tr> --}}




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
                    <a class="btn btn-success" href="{{ route('user-index') }}"
                        data-bs-original-title="" title="">Back</a>
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
@endsection
