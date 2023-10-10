@extends('admin_dashboard.layouts.master')
@section('content')
    <style>
        .customer_records,
        .remove {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #ff2446;
        }

        .nav-link {
            border: none;
            margin-right: 10px;
        }

        .billingInformation p {
            margin-bottom: 0px;
        }

        .sale-container .summary-comment-container .comment-container {
            margin-top: 20px;
            float: left;
        }

        .control-group,
        .control-group label {
            display: block;
            color: #3a3a3a;
        }


        .control-group textarea.control {
            height: 100px;
            padding: 10px;
            resize: none;
        }

        .control-group .control {
            background: #fff;
            border: 2px solid #c7c7c7;
            border-radius: 3px;
            width: 70%;
            height: 36px;
            display: inline-block;
            vertical-align: middle;
            transition: .2s cubic-bezier(.4, 0, .2, 1);
            padding: 0 10px;
            font-size: 15px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .checkbox input {
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            height: 24px;
            width: 24px;
            z-index: 100;
        }

        .btn.btn-primary {
            background: #0041ff;
            color: #fff;
        }

        .btn.btn-lg {
            padding: 10px 20px;
        }

        .sale-container .summary-comment-container .comment-container .comment-list {
            margin-top: 40px;
        }

        .sale-container .sale-summary {
            margin-top: 20px;
            height: 130px;
            float: right;
        }

        .summary-comment-container {
            display: flex;
        }

        .sale-container .sale-summary tr td {
            padding: 5px 8px;
            vertical-align: text-bottom;
        }

        .comment-container {
            width: 70%;
            margin-top: 20px;
        }

        table.sale-summary {
            width: 30%;
            margin-top: 20px;
        }

        .border {
            border: 0px solid #dee2e6 !important;
        }

        .checkbox {
            position: relative;
            display: block;
        }

        .checkbox .checkbox-view {
            height: 24px;
            display: inline-block !important;
            vertical-align: middle;
            margin: 10px 0px 10px 20px;

        }

        .checkbox label::before {
            border: 2px solid #bbbbbb;
        }

        .btn {
            margin-top: 20px;
            box-shadow: 0 1px 4px 0 rgb(0 0 0 / 20%), 0 0 8px 0 rgb(0 0 0 / 10%);
            border-radius: 3px;
            border: none;
            color: #fff;
            cursor: pointer;
            transition: .2s cubic-bezier(.4, 0, .2, 1);
            font: inherit;
            display: inline-block;
        }

        .btn-primary {
            background-color: #ff2446 !important;
            border-color: #ff2446 !important;
        }

        .table th {
            width: 200px;
        }

        .table th,
        .table td {
            padding: 8px 4px;
            text-align: center;
        }

        .accordion-button:not(.collapsed) {
            color: #ff2446;
            background-color: #f0f0f0;
            border-radius: 0.25rem;
        }

        .accordion-button:focus {
            border-color: #d7d7d7 !important;
            box-shadow: 0 0 0 0 rgb(13 110 253 / 25%) !important;
        }

        :focus {
            outline-color: #ff2446;
        }

        .accordion-header {
            margin-bottom: 12px;
        }

        .accordion-button.collapsed {
            border-bottom-width: 1px;
            border-radius: 0.25rem;
        }

        .accordion-body {
            padding: 1rem 1.25rem;
            border-top: 1px solid #80808040;
            margin-bottom: 12px;
            border-bottom: 1px solid #80808040;
        }

        .accordion-item:first-of-type .accordion-button {
            border-radius: 0.25rem;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form theme-form">
                            <h3>Invoice</h3>
                            <ul class="nav nested nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pillsInformationTab" data-bs-toggle="pill"
                                        data-bs-target="#pillsInformation" type="button" role="tab"
                                        aria-controls="pillsInformationTab" aria-selected="true">Information
                                    </button>
                                </li>

                            </ul>

                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade active show" id="pillsInformation" role="tabpanel"
                                    aria-labelledby="pillsInformationTab">

                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Order and Account
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Order Information</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Order ID</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p><a href="{{ route('orderManagement.show',$order->id) }}">#{{ $order->id }}</a></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Order Date</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>{{ $order->created_at }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Order Status</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>
                                                                            @if ($order->order_status == 1)
                                                                                Pending
                                                                            @endif
                                                                            @if ($order->order_status == 2)
                                                                                Dispatched
                                                                            @endif
                                                                            @if ($order->order_status == 3)
                                                                                Delivered
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Channel</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>Default</p>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Account Information</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Customer Name</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>{{ $order->full_name($order->user_id) }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Email</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>{{ $order->user->email }}</p>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Customer Group</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>General</p>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    Address
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        @if (!empty($order->billing_address))
                                                            <div class="col-lg-6">
                                                                <div class="orderInformation">
                                                                    <h6>Billing Address</h6>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="billingInformation">
                                                                                @if (!empty($order->billing_address->address))
                                                                                    <p>{{ $order->billing_address->address }}
                                                                                    </p>
                                                                                @endif
                                                                                @if (!empty($order->billing_address->village))
                                                                                    <p>{{ $order->billing_address->village }}
                                                                                    </p>
                                                                                @endif
                                                                                @if (!empty($order->billing_address->city))
                                                                                    <p>{{ $order->billing_address->city }}
                                                                                    </p>
                                                                                @endif
                                                                                @if (!empty($order->billing_address->country))
                                                                                    <p>{{ $order->billing_address->country }}
                                                                                    </p>
                                                                                @endif
                                                                                @if (!empty($order->billing_address->country))
                                                                                    <p>Contact :
                                                                                        {{ $order->billing_address->contact }}
                                                                                    </p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Shipping Address</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="billingInformation">
                                                                            @if (!empty($order->shipping_address->address))
                                                                                <p>{{ $order->shipping_address->address }}
                                                                                </p>
                                                                            @endif
                                                                            @if (!empty($order->shipping_address->village))
                                                                                <p>{{ $order->shipping_address->village }}
                                                                                </p>
                                                                            @endif
                                                                            @if (!empty($order->shipping_address->city))
                                                                                <p>{{ $order->shipping_address->city }}</p>
                                                                            @endif
                                                                            @if (!empty($order->shipping_address->country))
                                                                                <p>{{ $order->shipping_address->country }}
                                                                                </p>
                                                                            @endif
                                                                            @if (!empty($order->shipping_address->country))
                                                                                <p>Contact :
                                                                                    {{ $order->shipping_address->contact }}
                                                                                </p>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    Payment and Shipping
                                                </button>
                                            </h2>
                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="orderInformation">
                                                                <h6>Payment Information</h6>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Payment Method</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>Cash On Delivery</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <p>Currency</p>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <p>USD</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingFour">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                    aria-expanded="false" aria-controls="collapseFour">
                                                    Products Ordered
                                                </button>
                                            </h2>
                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="table">
                                                        <div class="table-responsive">
                                                            <table>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Product ID</th>
                                                                        <th>SKU</th>
                                                                        <th>Product Name</th>
                                                                        <th>Currency</th>
                                                                        <th>Price</th>
                                                                        {{-- <th>Item Status</th> --}}
                                                                        {{-- <th>Subtotal</th> --}}
                                                                        {{-- <th>Tax Percent</th>
                                                                        <th>Tax Amount</th> --}}
                                                                        {{-- <th>Grand Total</th> --}}
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php
                                                                        $total = 0;
                                                                    @endphp
                                                                    @foreach ($order->products as $product)
                                                                        @php
                                                                            $total += $product->price;
                                                                        @endphp
                                                                        <tr>
                                                                            <td>
                                                                                {{ $product->id ?? '' }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $product->sku ?? '' }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $product->product_name ?? '' }}

                                                                            </td>
                                                                            <td>USD</td>
                                                                            <td>${{ $product->price ?? '' }}</td>
                                                                            {{-- <td><span class="qty-row">
                                                                                Ordered (2)
                                                                            </span> <span class="qty-row">
                                                                                Invoiced (2)
                                                                            </span> <span class="qty-row"></span> <span
                                                                                class="qty-row">
                                                                                Refunded (2)
                                                                            </span> <span class="qty-row"></span></td> --}}
                                                                            {{-- <td>$90,400.00</td>
                                                                        <td>0.0000%</td> --}}
                                                                            {{-- <td>$0.00</td>
                                                                        <td>$90,400.00</td> --}}
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="summary-comment-container">
                                                        <div class="comment-container">
                                                            {{-- <form method="POST" action="{{ route('order.status',['id'=>$order->id]) }}">
                                                                @csrf
                                                                <div class="control-group">
                                                                    <label for="order_status" class="required">Order
                                                                        Status</label>
                                                                    <select id="order_status" name="order_status"
                                                                        class="control">
                                                                        <option value="" disabled="disabled">--Choose Order Status--</option>
                                                                        <option value="1" {{ $order->order_status == 1 ? 'selected' : '' }}>Pending</option>
                                                                        <option value="2" {{ $order->order_status == 2 ? 'selected' : '' }}>Dispatched</option>
                                                                        <option value="3" {{ $order->order_status == 3 ? 'selected' : '' }}>Delivered</option>
                                                                    </select>

                                                                </div>
                                                                <div class="control-group"><label for="comment"
                                                                        class="required">Comment</label>
                                                                    <textarea id="comment" name="comment" data-vv-as="&quot;Comment&quot;" class="control" aria-required="true"
                                                                        aria-invalid="false"></textarea>

                                                                </div>

                                                                <button type="submit" class="btn btn-lg btn-primary">
                                                                    Submit
                                                                </button>
                                                            </form> --}}
                                                            <ul class="comment-list"></ul>
                                                        </div>
                                                        <table class="sale-summary">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Subtotal</td>
                                                                    <td>-</td>
                                                                    <td>${{ $total }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Shipping &amp; Handling</td>
                                                                    <td>-</td>
                                                                    <td>$0.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>-</td>
                                                                    <td>${{ $total }}</td>
                                                                </tr>

                                                                {{-- <tr class="border">
                                                                    <td>Tax</td>
                                                                    <td>-</td>
                                                                    <td>$0.00</td>
                                                                </tr> --}}
                                                                <tr class="bold">
                                                                    <td>Grand Total</td>
                                                                    <td>-</td>
                                                                    <td>${{ $total }}</td>
                                                                </tr>
                                                                {{-- <tr class="bold">
                                                                    <td>Total Paid</td>
                                                                    <td>-</td>
                                                                    <td>$90,400.00</td>
                                                                </tr> --}}
                                                                <tr class="bold">
                                                                    <td>Total Refunded</td>
                                                                    <td>-</td>
                                                                    <td>$00.00</td>
                                                                </tr>
                                                                <tr class="bold">
                                                                    <td>Total Due</td>
                                                                    <td>-</td>
                                                                    <td>$0.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@if (Session::has('order_status'))
<script>
    toastr.success("{{ Session::get('order_status') }}")
</script>
@endif
@if (Session::has('order_status_error'))
<script>
    toastr.error("{{ Session::get('order_status_error') }}")
</script>
@endif
@endpush
