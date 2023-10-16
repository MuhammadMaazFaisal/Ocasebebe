@extends('admin_dashboard.layouts.master')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
<style>
    .close-modal-btn {
        position: absolute;
        right: -1%;
        top: -4%;
        z-index: 1;
    }

    .close-modal-btn button {
        background-color: transparent;
        border: none;
        color: #fff;
        font-size: 30px;
    }

    .close-modal-btn button i {
        /* background: rgb(207, 1, 1); */
        border-radius: 50%;
        background: #fff;
        color: #371514;
    }

    .customer_records,
    .remove {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #ff1491de;
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

    .table-responsive table {
        width: 100%;
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
        background-color: #ff1491de !important;
        border-color: #ff1491de !important;
    }

    input.inputField {
        width: 100%;
        border: none;
        border: 1px solid #cbcbcb !important;
        outline: none;
    }

    button.submitBtn {
        border: none;
        background-color: #ff1491de;
        margin-top: 16px;
        padding: 8px 16px;
        border-radius: 5px;
        width: 100px;
        color: #fff;
    }

    .cancelTextBox {
        text-align: end;
    }

    textarea.inputMessages {
        width: 240px;
        height: 100px;
        resize: none;
        border: 1px solid #999;
        outline: none;
    }

    .video-modal-box video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .video-modal-box {
        width: 100%;
        height: 600px;
        position: relative;
    }

    @font-face {
        font-family: Roboto-Regular;
        src: url("{{ asset('assets/fonts/Roboto-Regular.ttf') }}");
    }

    @font-face {
        font-family: PlayfairDisplay-SemiBold;
        src: url("../fonts/PlayfairDisplay-SemiBold.ttf");
    }

    @font-face {
        font-family: Roboto-Light;
        src: url("../fonts/Roboto-Light.ttf");
    }

    @font-face {
        font-family: Roboto-Bold;
        src: url("../fonts/Roboto-Bold.ttf");
    }

    @font-face {
        font-family: Roboto-Medium;
        src: url("../fonts/Roboto-Medium.ttf");
    }

    @font-face {
        font-family: Allura-Regular;
        src: url("../fonts/Allura-Regular.ttf");
    }

    @font-face {
        font-family: PlayfairDisplay-SemiBold;
        src: url("../fonts/PlayfairDisplay-SemiBold.ttf");
    }

    @font-face {
        font-family: montserratBold;
        src: url("./../fonts/Montserrat-Bold.ttf");
    }

    @font-face {
        font-family: montserratExtraBold;
        src: url("./../fonts/Montserrat-ExtraBold.ttf");
    }

    @font-face {
        font-family: goBold;
        src: url("./../fonts/Gobold-Bold.otf");
    }

    /* .table th {
                                                        width: 200px;
                                                    }

                                                    .table th,
                                                    .table td {
                                                        padding: 8px 4px;
                                                        text-align: center;
                                                    }

                                                    .accordion-button:not(.collapsed) {
                                                        color: #ff1491de;
                                                        background-color: #f0f0f0;
                                                        border-radius: 0.25rem;
                                                    }

                                                    .accordion-button:focus {
                                                        border-color: #d7d7d7 !important;
                                                        box-shadow: 0 0 0 0 rgb(13 110 253 / 25%) !important;
                                                    }

                                                    :focus {
                                                        outline-color: #ff1491de;
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

                                                    .notificationDetails p {
                                                        line-height: 1.1;
                                                    }
                                                .inputMessage {
                                                    resize: none;
                                                    height: 150px;
                                                }

                                                .inputMessage {
                                                    width: 100%;
                                                    margin: 6px 0px;
                                                    padding: 10px 12px;
                                                    outline: none;
                                                    border: 1px solid #999999;
                                                    background-color: #ffffff;
                                                    color: #000000;
                                                }

                                                .invoice-email {
                                                    display: flex;
                                                    align-items: baseline;
                                                    margin-left: 20px;
                                                }
                                                .remove-btn-css {
                                                    border: none;
                                                    background: transparent;
                                                    color: #4d4d4d;
                                                    font-family: montserratRegular;
                                                    font-size: 15px;
                                                }
                                                .print-btn-css i {
                                                    font-size: 30px;
                                                    color: #ff1491de;

                                                }
                                                .login-sec-box h1.invoice-no-heading {
                                                    font-size: 30px;
                                                    color: #646364;
                                                    font-weight: bolder;
                                                }
                                                .login-sec-box label, .login-btn span, .login-sec-box h1 {
                                                    color: #989898;
                                                    font-size: 15px;
                                                    margin-bottom: 5px !important;
                                                }
                                                .invoice-email {
                                                    display: flex;
                                                    align-items: baseline;
                                                    margin-left: 20px;
                                                }
                                                .cstm-invoice-tabel {
                                                    width: 100%;
                                                    overflow: auto !important;
                                                }
                                                .mt0 {
                                                    margin-top: 10px !important;
                                                }
                                                .mt4 {
                                                    margin-top: 54px !important;
                                                }
                                                .cstm-invoice-tabel .tabel, th {
                                                    border: 2px solid #dae1e7 !important;
                                                    font-weight: bolder !important;

                                                }
                                                td {
                                                    color: #646364 !important;
                                                    font-size: 15px !important;
                                                    border: 2px solid #dae1e7 !important;
                                                }
                                                .table-striped>tbody>tr:nth-of-type(odd) {
                                                    --bs-table-accent-bg: var(--bs-table-striped-bg);
                                                    color: var(--bs-table-striped-color);
                                                }
                                                .tabel-line {
                                                    border-bottom: 2px solid #989898;
                                                    min-width: 60%;
                                                    max-width: 100%;
                                                    padding: 1px;
                                                    margin: 0px;
                                                    margin-left: 1rem;
                                                }
                                                .mt2 {
                                                    margin-top: 34px !important;
                                                }
                                                .mt1 {
                                                    margin-top: 24px !important;
                                                }
                                                .background-color-total {
                                                            background-color: #fff;
                                                            color: #646364;
                                                 }
                                                 .emailSendButton {
                                                    width: 140px;
                                                    border: none;
                                                    padding: 8px 12px;
                                                    background-color: #ff1491de;
                                                    color: #ffffff;
                                                    border-radius: 6px;
                                                }
                                                .buttons {
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: end;
                                                    gap: 12px;
                                                }
                                                .table {
                                                    margin-bottom: 0px;
                                                    overflow: auto;
                                                }

                                                @media print {

                                                        .noPrint {
                                                            display: none;
                                                        }

                                                        @page {
                                                            margin-top: 0;
                                                            margin-bottom: 0;
                                                        }
                                                        .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
                                                            width: 100%;
                                                            margin-top: 0px;
                                                    margin-left: 0px;
                                                }
                                                .tabel-line {
                                                    min-width: 20%;
                                                    max-width: 40%;
                                                    padding: 1px;
                                                    margin: 0px;
                                                    margin-left: 1rem;
                                                }
                                                    } */

    .invoice-email {
        display: flex;
        align-items: baseline;
        margin-left: 20px;
    }

    .remove-btn-css {
        border: none;
        background: transparent;
        color: #4d4d4d;
        font-family: montserratRegular;
        font-size: 15px;
    }

    .print-btn-css i {
        font-size: 30px;
        color: #ff1491de;

    }

    .login-sec-box h1.invoice-no-heading {
        font-size: 30px;
        color: #646364;
        font-weight: bolder;
    }

    .login-sec-box label,
    .login-btn span,
    .login-sec-box h1 {
        color: #989898;
        font-size: 15px;
        margin-bottom: 5px !important;
    }

    .invoice-email {
        display: flex;
        align-items: baseline;
        margin-left: 20px;
    }

    .cstm-invoice-tabel {
        width: 100%;
        overflow: auto !important;
    }

    .mt0 {
        margin-top: 10px !important;
    }

    .mt4 {
        margin-top: 54px !important;
    }

    /* .cstm-invoice-tabel .tabel .tableHeading tr th {
                                                    border: 2px solid #dae1e7 !important;
                                                    font-weight: bolder !important;
                                                } */
    .tableHeading tr th {
        border: 2px solid #dae1e7 !important;
        font-weight: bolder !important;
    }

    #invoiceTbody tr th {
        border: 2px solid #dae1e7 !important;
        font-weight: bolder !important;

    }

    #invoiceTbody tr td {
        color: #646364 !important;
        font-size: 15px !important;
        border: 2px solid #dae1e7 !important;
    }

    .table-striped>#invoiceTbody>tr:nth-of-type(odd) {
        --bs-table-accent-bg: var(--bs-table-striped-bg);
        color: var(--bs-table-striped-color);
    }

    .tabel-line {
        border-bottom: 2px solid #989898;
        min-width: 60%;
        max-width: 100%;
        padding: 1px;
        margin: 0px;
        margin-left: 1rem;
    }

    .mt2 {
        margin-top: 34px !important;
    }

    .mt1 {
        margin-top: 24px !important;
    }

    .background-color-total {
        background-color: #fff;
        color: #646364;
    }

    .emailSendButton {
        width: 140px;
        border: none;
        padding: 8px 12px;
        background-color: #ff1491de;
        color: #ffffff;
        border-radius: 6px;
    }

    .buttons {
        display: flex;
        align-items: center;
        justify-content: end;
        gap: 12px;
    }

    .table {
        margin-bottom: 0px;
        overflow: auto;
    }

    @media print {

        .noPrint {
            display: none;
        }

        @page {
            margin-top: 0;
            margin-bottom: 0;
        }

        .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
            width: 100%;
            margin-top: 0px;
            margin-left: 0px;
        }

        .tabel-line {
            min-width: 20%;
            max-width: 40%;
            padding: 1px;
            margin: 0px;
            margin-left: 1rem;
        }

    }

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body ">
                    <h3 class="noPrint">Order Information</h3>

                    <div class="form theme-form">
                        <ul class="nav nested nav-pills mb-3 " id="pills-tab" role="tablist">

                            <li class="nav-item noPrint" role="presentation">
                                <button class="nav-link active" id="pillsInformationTab" data-bs-toggle="pill" data-bs-target="#pillsInformation" type="button" role="tab" aria-controls="pillsInformationTab" aria-selected="true">Information
                                </button>
                            </li>
                            <li class="nav-item noPrint" role="presentation">
                                <button class="nav-link" id="pillsInvoicesOneTab" value="{{ $order->id }}" data-bs-toggle="pill" data-bs-target="#pillsInvoicesOne" type="button" role="tab" aria-controls="pillsInvoicesOneTab" aria-selected="false">Invoice</button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade active show" id="pillsInformation" role="tabpanel" aria-labelledby="pillsInformationTab">

                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Order and Account
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
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
                                                                    <p>#{{ $order->id }}</p>
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

                                                                        Place On

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
                                                                    <p>{{ $order->customer_name }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Email</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>{{ $order->customer_email }}</p>
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Address
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="orderInformation">
                                                            <h6>Shipping Address</h6>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="billingInformation">
                                                                        {{ $order->customer_address }}
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Payment and Shipping
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
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
                                                                    <p>{{ $order->payment_method }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <p>Currency</p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p>CFA</p>
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
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Products Ordered
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="table">
                                                    <div class="table-responsive">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>Quantity</th>
                                                                    <th>Legnth</th>
                                                                    <th>Unit Cost</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($orderitems as $item)
                                                                <tr>
                                                                    <td>{{ $item->product_name }}</td>
                                                                    <td>{{ $item->product_quantity }}</td>
                                                                    <td>length
                                                                    <td>
                                                                        @if ($item->product_discount_price)
                                                                        ${{ number_format($item->product_discount_price, 2) }}
                                                                        @else
                                                                        ${{ number_format($item->product_price, 2) }}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if ($item->product_discount_price)
                                                                        ${{ number_format($item->product_discount_price * $item->product_quantity, 2) }}
                                                                        @else
                                                                        ${{ number_format($item->product_price * $item->product_quantity, 2) }}
                                                                        @endif
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

                                </div>



                               

                            </div>
                             {{-- pillsInvoicesOne --}}
                                <div class="tab-pane fade" id="pillsInvoicesOne" role="tabpanel" aria-labelledby="pillsInvoicesOneTab">

                                    <div class="buttons">
                                        <button class="remove-btn-css noPrint" onclick="window.print();">
                                            <div class="red-back-btn print-btn-css">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="container">
                                        <div class="home-third-section-content text-center mt2">
                                            <h1>Order Detail</h1>
                                            <div class="backButtonBox">
                                                <div class="order-number-text text-end">
                                                    <p>Order #{{ $order->id }}</p>
                                                    <span>On: {{ date('Y-m-d', strtotime($order->created_at)) }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="dashboard-form-input">
                                            <table style="height:100%;width:100%; margin:auto;">
                                                <tr>
                                                    <th style="padding-bottom: 0px; border-bottom: 2px solid #66666666666657;">
                                                    </th>


                                                </tr>
                                                <tr>
                                                    <th style="padding-bottom: 0px; display: flex; justify-content: space-between;">
                                                        <p style="
                                                                width: 33%;
                                                                font-family: Roboto-Regular;
                                                                font-size: 24px;
                                                                color: #666666;
                                                                text-align: left;
                                                                display: flex;
                                                                align-items: baseline;
                                                                justify-content: space-between;
                                                                ">
                                                            <span for="" style="width: 100%;">Personal
                                                                Info:</span>
                                                        </p>

                                                    </th>
                                                </tr>
                                                <tr style="
                                                        width: 100%;
                                                    ">
                                                    <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 100%;margin: auto;">
                                                        <p style="
                                                                font-family: Roboto-Regular;
                                                                font-size: 15px;
                                                margin:0px;
                                                                color: #666666;
                                                                text-align: left;
                                                                display: flex;
                                                                align-items: baseline;
                                                                ">
                                                            <span for="" style="font-weight:bolder;margin-right: 7px">Name: </span>
                                                            <span for="" style="font-weight: 400;">{{ $order->customer_name }}</span>
                                                        </p>



                                                    </th>
                                                </tr>
                                                <tr style="
                                                        width: 100%;
                                                    ">
                                                    <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 100%;margin: auto;">
                                                        <p style="
                                                                    font-family: Roboto-Regular;
                                                                    font-size: 15px;
                                                    margin:0px;
                                                                    color: #666666;
                                                                    text-align: left;
                                                                    display: flex;
                                                                    align-items: baseline;
                                                                    ">
                                                            <span for="" style="font-weight:bolder;margin-right: 7px">Email: </span>
                                                            <span for="" style="font-weight: 400;">{{ $order->customer_email }}</span>

                                                        </p>

                                                    </th>
                                                </tr>
                                                <tr style="
                                                            width: 100%;
                                                        ">
                                                    <th style="padding-bottom: 0px;display: flex;justify-content: space-between;width: 100%;margin: auto;">
                                                        <p style="
                                                                font-family: Roboto-Regular;
                                                                font-size: 15px;
                                            margin:0px;
                                                                color: #666666;
                                                                /* margin: auto; */
                                                                text-align: left;
                                                                display: flex;
                                                                align-items: baseline;
                                                                ">
                                                            <span for="" style="font-weight:bolder;margin-right: 7px">Shipping Address: </span>
                                                            <span for="" style="font-weight: 400;">{{ $order->customer_address}}</span>
                                                        </p>


                                                    </th>
                                                </tr>
                                                <tr>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="table" style="margin-top:10px;">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Quantity</th>
                                                        <th>Legnth</th>
                                                        <th>Unit Cost</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orderitems as $item)
                                                    <tr>
                                                        <td>{{ $item->product_name }}</td>
                                                        <td>{{ $item->product_quantity }}</td>
                                                        <td>length
                                                        <td>
                                                            @if ($item->product_discount_price)
                                                            ${{ number_format($item->product_discount_price, 2) }}
                                                            @else
                                                            ${{ number_format($item->product_price, 2) }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($item->product_discount_price)
                                                            ${{ number_format($item->product_discount_price * $item->product_quantity, 2) }}
                                                            @else
                                                            ${{ number_format($item->product_price * $item->product_quantity, 2) }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="
                                                            padding-top: 40px;
                                                            display: flex;
                                                            justify-content: end;
                                                            width: 94%;
                                                        ">
                                                        <p style="
                                                                    width: 30%;
                                                                    margin: 0;
                                                                    font-family: Roboto-Regular;
                                                                    font-size: 16px;
                                                                    color: #666666;
                                                                    text-align: left;
                                                                    display: flex;
                                                                    align-items: end;
                                                                    justify-content: space-between;
                                                                    ">
                                                            <span for="" style="width: 50%;text-align: left;font-weight:bolder;"> No.
                                                                of Items :</span>
                                                            <span for="" style="width: 50%;font-weight: 300;">{{ $order->quantity }}</span>
                                                        </p>
                                                    </th>


                                                </tr>
                                                <tr>
                                                    <th style="
                                                                padding-top: 4px;
                                                                display: flex;
                                                                justify-content: end;
                                                                width: 94%;
                                                            ">
                                                        <p style="
                                                            width: 30%;
                                                            font-family: Roboto-Regular;
                                                            font-size: 16px;
                                                            margin: 0;
                                                            color: #666666;
                                                            text-align: left;
                                                            display: flex;
                                                            align-items: end;
                                                            justify-content: space-between;
                                                            ">
                                                            <span for="" style="width: 50%;text-align: left;font-weight:bolder;">Total Price :</span>
                                                            <span for="" style="width: 50%;font-weight: 300;">{{ $order->total_price }} CFA</span>
                                                        </p>
                                                    </th>


                                                </tr>
                                                <tr>
                                            <tbody>
                                        </table>
                                    </div>

                                </div>
                                {{-- end --}}
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
