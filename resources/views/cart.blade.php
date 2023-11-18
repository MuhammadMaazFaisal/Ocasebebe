@include('layouts.head')

@include('layouts.navbar')

<main class="main">

    <div class="container">

        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">

            <li class="active">

                <a href="cart.html">Shopping Cart</a>

            </li>

            <li>

                <a href="checkout.html">Checkout</a>

            </li>

            <li class="disabled">

                <a href="cart.html">Order Complete</a>

            </li>

        </ul>



        <div class="row">

            <div class="col-lg-8">

                <div class="cart-table-container">

                    <table class="table table-cart">

                        <thead>

                            <tr>

                                <th class="thumbnail-col"></th>

                                <th class="product-col">Product</th>

                                <th class="price-col">Price</th>

                                <th class="qty-col">Quantity</th>

                                <th class="text-right">Subtotal</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($cart_items as $cart_item)

                            <tr class="product-row">

                                <td>

                                    <figure class="product-image-container">

                                        <a href="{{ route('product.details', $cart_item->product->id) }}" class="product-image">

                                            <img src="{{ asset('products/' . $cart_item->product->image) }}" alt="product">

                                        </a>



                                        <a href="#" onclick="delete_Item({{ $cart_item->id }})" class="btn-remove icon-cancel" title="Remove Product"></a>

                                    </figure>

                                </td>

                                <td class="product-col">

                                    <h5 class="product-title">

                                        <a href="{{ route('product.details', $cart_item->product->id) }}">{{ $cart_item->product->product_name }}</a>

                                    </h5>

                                </td>

                                <td>

                                    @if ($cart_item->product->discount_price)

                                    {{ $cart_item->product->discount_price }}

                                    @else

                                    {{ $cart_item->product->price }}

                                    @endif

                                    CFA

                                </td>

                                <td>

                                    <div class="product-single-qty">

                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                            <span class="input-group-btn input-group-prepend">
                                                <button class="btn btn-outline btn-down-icon bootstrap-touchspin-down" type="button"></button>
                                            </span>
                                            <input class="horizontal-quantity1 form-control" type="text" value="{{ $cart_item->quantity }}" data-id="{{ $cart_item->product_id }}">
                                            <span class="input-group-btn input-group-append">
                                                <button class="btn btn-outline btn-up-icon bootstrap-touchspin-up" type="button"></button>
                                            </span>
                                        </div>
                                    </div><!-- End .product-single-qty -->











                                </td>

                                <td class="text-right"><span class="subtotal-price">

                                        @if ($cart_item->product->discount_price)

                                        {{ $cart_item->product->discount_price * $cart_item->quantity }}

                                        @else

                                        {{ $cart_item->product->price * $cart_item->quantity }}

                                        @endif CFA

                                    </span></td>

                            </tr>

                            @endforeach

                        </tbody>





                        <tfoot>

                            <tr>

                                <td colspan="5" class="clearfix">

                                    {{-- <div class="float-left">

                                        <div class="cart-discount">

                                            <form action="#">

                                                <div class="input-group">

                                                    <input type="text" class="form-control form-control-sm" placeholder="Coupon Code" required>

                                                    <div class="input-group-append">

                                                        <button class="btn btn-sm" type="submit">Apply

                                                            Coupon</button>

                                                    </div>

                                                </div><!-- End .input-group -->

                                            </form>

                                        </div>

                                    </div><!-- End .float-left -->



                                    <div class="float-right">

                                        <button type="submit" class="btn btn-shop btn-update-cart">

                                            Update Cart

                                        </button>

                                    </div><!-- End .float-right --> --}}

                                </td>

                            </tr>

                        </tfoot>

                    </table>

                </div><!-- End .cart-table-container -->

            </div><!-- End .col-lg-8 -->



            <div class="col-lg-4">

                <div class="cart-summary">

                    <h3>CART TOTALS</h3>



                    <table class="table table-totals">

                        <tbody>

                            <tr>

                                <td>Subtotal</td>

                                <td class="subtotal-price">{{ $total_price }} CFA</td>



                            <tr>

                                <td>Shipping Charges</td>

                                <td>0 CFA</td>

                            </tr>

                        </tbody>



                        <tfoot>

                            <tr>

                                <td>Total</td>

                                <td class="subtotal-price">{{ $total_price }} CFA</td>

                            </tr>

                        </tfoot>

                    </table>



                    <div class="checkout-methods">

                        <a href="{{ route('checkout') }}" class="btn btn-block btn-dark">Proceed to Checkout

                            <i class="fa fa-arrow-right"></i></a>

                    </div>

                </div><!-- End .cart-summary -->

            </div><!-- End .col-lg-4 -->

        </div><!-- End .row -->

    </div><!-- End .container -->



    <div class="mb-6"></div><!-- margin -->

</main><!-- End .main -->



@include('layouts.footer')

<script>
    function update_quantity(element) {

        console.log("element");

        var id = element.getAttribute('data-id');

        var quantity = element.value;

        $.ajax({

            url: "{{ route('quantity_cart_item') }}",

            method: "get",

            data: {

                id: id,

                quantity: quantity

            },

            success: function(data) {

                if (data.status == 200) {

                    total = document.getElementsByClassName('subtotal-price');

                    for (let i = 0; i < total.length; i++) {

                        total[i].innerHTML = data.total_price + " CFA";

                    }

                }

            }

        })



    }

    document.addEventListener('DOMContentLoaded', function() {
        var touchspinUp = document.querySelector('.bootstrap-touchspin-up');
        var touchspinDown = document.querySelector('.bootstrap-touchspin-down');
        var touchspinInput = document.querySelector('.horizontal-quantity1');

        touchspinUp.addEventListener('click', function() {
            var currentValue = parseInt(touchspinInput.value, 10);
            var maxValue = 100; // Set your maximum value here
            if (currentValue < maxValue) {
                touchspinInput.value = currentValue + 1;
                update_quantity(touchspinInput);
            }
        });

        touchspinDown.addEventListener('click', function() {
            var currentValue = parseInt(touchspinInput.value, 10);
            if (currentValue > 0) { // Prevents the value from going below 0
                touchspinInput.value = currentValue - 1;
                update_quantity(touchspinInput);
            }
        });
    });

</script>

@if (session('message'))

<script>
    swal({

        title: "Error!",

        text: "{{ session('message') }}",

        icon: "error",

        button: "OK",

    })

</script>

@endif
