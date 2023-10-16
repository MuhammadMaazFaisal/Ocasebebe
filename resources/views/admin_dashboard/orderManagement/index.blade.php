@extends('admin_dashboard.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Management </h5>
                        <div class="my-4"></div>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive product-table">
                            <div id="basic-1_wrapper" class="dataTables_wrapper no-footer">
                                <table class="display dataTable no-footer" id="basic-1" role="grid"
                                    aria-describedby="basic-1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-sort="ascending">
                                                ORDER ID</th>
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Total</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Order Date</th>
                                                {{-- <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending"> Status</th> --}}
                                                {{-- <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Billing To</th> --}}
                                                <th class="sorting" tabindex="0" aria-controls="basic-1"
                                                aria-label="Details: activate to sort column ascending">Payment Method</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-1" rowspan="1"
                                                colspan="1" aria-label="Action: activate to sort column ascending"
                                                style="width: 120.016px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr role="row" class="odd">
                                                <td>
                                                    {{ $order->id }}
                                                </td>
                                                <td>
                                                    ${{ number_format($order->total_price,2) }}
                                                </td>
                                                <td>
                                                    {{ $order->created_at }}
                                                </td>
                                                {{-- <td>
                                                    @if($order->order_status == 1)
                                                    <span class="span badge rounded-pill pill-badge-warning">Pending</span>
                                                    @endif
                                                    @if($order->order_status == 2)
                                                    <span class="span badge rounded-pill pill-badge-danger">Dispatched</span>
                                                    @endif
                                                    @if($order->order_status == 3)
                                                    <span class="span badge rounded-pill pill-badge-success">Delivered</span>
                                                    @endif

                                                    @if(($order->order_status != 1 && $order->order_status != 2) && $order->order_status != 3)
                                                     N/A
                                                    @endif

                                                </td> --}}
                                                {{-- <td>
                                                    @if (!empty($order->order_address->address))

                                                    {{ Str::limit($order->order_address->address, 11, '...') }}
                                                    @else
                                                    N/A
                                                    @endif
                                                </td> --}}
                                                <td>
                                                  {{$order->payment_method}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('orderManagement.show',$order->id) }}"><i class="icon-eye"></i></a>
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
                        url: "{{route('product.destroy',"id")}}",
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


{{-- @if (Session::has('Update_Faqs'))
    <script>
        toastr.success('Faqs Updated', '{{ Session::get('Update_Faqs') }}', 'success')
    </script>
@endif --}}

    @endsection
