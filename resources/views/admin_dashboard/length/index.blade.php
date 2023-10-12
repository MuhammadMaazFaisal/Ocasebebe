@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Length List </h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('create.length') }}">Add</a></div>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table class="display dataTable no-footer" id="basic-1"
                                    role="grid" aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                S.NO</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">City</th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Length Name</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Stock</th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($length as $key => $value)
                                            <tr role="row" class="odd">
                                                <td>
                                                    {{ $value->id }}
                                                </td>

                                                <td>
                                                    {{ $value->name }}
                                                </td>
                                                {{-- this is for stock --}}

                                                {{-- <td>
                                                    <a href="{{ route('length-stock_status', $value->id) }}">
                                                    @if ($value->stock == 1)
                                                        <button class="btn btn-info btn-sm" id="status"><i
                                                                class="fa fa-thumbs-up"></i></button>
                                                    @else
                                                        <button class="btn btn-danger btn-sm" id="status"><i
                                                                class="fa fa-thumbs-down"></i></button>
                                                    @endif
                                                    </a>
                                                </td> --}}

                                                <td>
                                                    <a href="{{ route('length-status', $value->id) }}">
                                                        @if ($value->status == 1)
                                                            <button class="btn btn-info btn-sm"><i
                                                                    class="fa fa-thumbs-up"></i></button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        @endif
                                                    </a>
                                                </td>

                                                <td class="editDelete">
                                                    {{-- Delete Button --}}
                                                    {{-- <form action="{{ route("delete.length",$value->id) }}" method="post">

                                                        @method("DELETE")

                                                        @csrf
                                                        <a href="#">
                                                        <button class="btn btn-danger btn-xs" type="submit"
                                                            data-original-title="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete length ?');" >Delete</button></a>
                                                    </form> --}}

                                                    <a href="{{ route('edit.length', $value->id) }}"> <button
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""
                                                            data-bs-original-title="">Edit</button></a>

                                                    {{-- <a href="{{ route('attribute-value',$value->id) }}"> <button
                                                                class="btn btn-success btn-xs" type="button"
                                                                data-original-title="btn btn-danger btn-xs" title=""
                                                                data-bs-original-title="">Terms</button></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Individual column searching (text inputs) Ends-->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>.
@endsection
