@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5><u>Product</u></h5>
                        <div class=""><a class="btn btn-gradient" data-bs-original-title="" title=""
                                href="{{ route('product.create') }}">Add</a></div>

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
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Image</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Product Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Parent Category</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Main Category</th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $value)
                                            <tr role="row" class="odd">
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset('products/' . $value->image) }}" alt=""
                                                        width="40px">
                                                </td>
                                                <td>
                                                    {{ $value->product_name ?? null }}
                                                </td>
                                                <td>
                                                    @foreach ($parent_categories as $parent_category)
                                                        @if ($parent_category->id == $value->parent_category_id)
                                                            {{ $parent_category->parent_category_name ?? null }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                {{-- <td>
                                                    {{ $value->get_main_category->main_category_name ?? 'N/A' }}
                                                </td> --}}

                                                <td>
                                                    <a href="{{ route('product-status', $value->id) }}">
                                                        @if ($value->status == 1)
                                                            <button class="btn btn-info btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-up"></i></button>
                                                        @else
                                                            <button class="btn btn-danger btn-sm" id="status"><i
                                                                    class="fa fa-thumbs-down"></i></button>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td style="display:flex;">
                                                    {{-- <a href="javascript:void(0);" class="deleteproduct"
                                                        data-id="{{ $value->id }}">
                                                        <button class="btn btn-danger btn-xs" type="submit"
                                                            data-original-title="btn btn-danger btn-xs">Delete</button></a> --}}

                                                    <form action="{{ route('product.destroy', $value->id) }}"
                                                        method="post">

                                                        @method('DELETE')

                                                        @csrf
                                                        <a href="#">
                                                            <button class="btn btn-danger btn-xs" type="submit"
                                                                style="margin-right: 6px;"
                                                                data-original-title="btn btn-danger btn-xs"
                                                                onclick="return confirm('Are you sure you want to delete product ?');">Delete</button></a>
                                                    </form>

                                                    <a href="{{ route('product.edit', $value->id) }}"> <button
                                                            class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title=""
                                                            data-bs-original-title="">Edit</button></a>
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


    <script>
        $(document).ready(function() {

            toastr.options = {
                'closeButton': true,
                'debug': false,
                'newestOnTop': false,
                'progressBar': false,
                'positionClass': 'toast-top-right',
                'preventDuplicates': false,
                'showDuration': '1000',
                'hideDuration': '1000',
                'timeOut': '5000',
                'extendedTimeOut': '1000',
                'showEasing': 'swing',
                'hideEasing': 'linear',
                'showMethod': 'fadeIn',
                'hideMethod': 'fadeOut',
            }

            $(".deleteproduct").on("click", function() {
                var id = $(this).attr("data-id");
                $.ajax({
                    url: "{{ route('product.destroy', 'id') }}",
                    data: {
                        "id": id,
                        "_token": "{{ csrf_token() }}"
                    },
                    type: 'DELETE',
                    success: function(result) {
                        toastr.success('Product Deleted Sucessfully');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                });
            });
        })
    </script>
@endsection
