@include('layouts.head')
@include('layouts.navbar')

<main class="main main-test">
    <div class="container checkout-container">
        <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
            <li>
                <a href="cart.html">Shopping Cart</a>
            </li>
            <li class="active">
                <a href="checkout.html">Checkout</a>
            </li>
            <li class="disabled">
                <a href="#">Order Complete</a>
            </li>
        </ul>
        <form  id="checkout-form">
            <div class="row">
                <div class="col-lg-7">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Billing details</h2>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input type="text" class="form-control" required name="name" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" required name="email" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" />
                            </div>
                            <!-- <div class="form-group">
                                        <label>Tel</label>
                                        <input type="text" class="form-control" />
                                    </div> -->

                            <!-- <div class="select-custom">
                                        <label>Country / Region
                                            <abbr class="required" title="required">*</abbr></label>
                                        <select name="orderby" class="form-control">
                                            <option value="" selected="selected">Vanuatu
                                            </option>
                                            <option value="1">Brunei</option>
                                            <option value="2">Bulgaria</option>
                                            <option value="3">Burkina Faso</option>
                                            <option value="4">Burundi</option>
                                            <option value="5">Cameroon</option>
                                        </select>
                                    </div> -->

                            <!-- <div class="form-group mb-1 pb-2">
                                        <label>Street address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" placeholder="House number and street name" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Apartment, suite, unite, etc. (optional)" required />
                                    </div>
 -->
                            <!-- <div class="form-group">
                                        <label>Town / City
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" required />
                                    </div>

                                    <div class="select-custom">
                                        <label>State / County <abbr class="required" title="required">*</abbr></label>
                                        <select name="orderby" class="form-control">
                                            <option value="" selected="selected">NY</option>
                                            <option value="1">Brunei</option>
                                            <option value="2">Bulgaria</option>
                                            <option value="3">Burkina Faso</option>
                                            <option value="4">Burundi</option>
                                            <option value="5">Cameroon</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Postcode / Zip
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" required />
                                    </div> -->

                            <!-- <div class="form-group">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Email address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" class="form-control" required />
                                    </div> -->

                            <!-- <div class="form-group mb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="create-account" />
                                            <label class="custom-control-label" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree" for="create-account">Create an
                                                account?</label>
                                        </div>
                                    </div>

                                    <div id="collapseThree" class="collapse">
                                        <div class="form-group">
                                            <label>Create account password
                                                <abbr class="required" title="required">*</abbr></label>
                                            <input type="password" placeholder="Password" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mt-0">
                                            <input type="checkbox" class="custom-control-input" id="different-shipping" />
                                            <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" for="different-shipping">Ship to a
                                                different
                                                address?</label>


                                        </div>
                                    </div> -->

                            <!-- <div id="collapseFour" class="collapse">
                                        <div class="shipping-info">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First name <abbr class="required"
                                                                title="required">*</abbr></label>
                                                        <input type="text" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last name <abbr class="required"
                                                                title="required">*</abbr></label>
                                                        <input type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Company name (optional)</label>
                                                <input type="text" class="form-control">
                                            </div>

                                            <div class="select-custom">
                                                <label>Country / Region <span class="required">*</span></label>
                                                <select name="orderby" class="form-control">
                                                    <option value="" selected="selected">Vanuatu</option>
                                                    <option value="1">Brunei</option>
                                                    <option value="2">Bulgaria</option>
                                                    <option value="3">Burkina Faso</option>
                                                    <option value="4">Burundi</option>
                                                    <option value="5">Cameroon</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-1 pb-2">
                                                <label>Street address <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" class="form-control" placeholder="House number and street name" required />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Town / City <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" class="form-control" required />
                                            </div>

                                            <div class="select-custom">
                                                <label>State / County <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <select name="orderby" class="form-control">
                                                    <option value="" selected="selected">NY</option>
                                                    <option value="1">Brunei</option>
                                                    <option value="2">Bulgaria</option>
                                                    <option value="3">Burkina Faso</option>
                                                    <option value="4">Burundi</option>
                                                    <option value="5">Cameroon</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Postcode / ZIP <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" class="form-control" required />
                                            </div>
                                        </div>
                                    </div> -->

                            <!-- <div class="form-group">
                                        <label class="order-comments">Order notes (optional)</label>
                                        <textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                                    </div> -->

                        </li>
                    </ul>
                </div>
                <!-- End .col-lg-8 -->

                <div class="col-lg-5">
                    <div class="order-summary">
                        <h3>YOUR ORDER</h3>

                        <table class="table table-mini-cart">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cart_items as $item)
                                <tr>
                                    <td class="product-col">
                                        <h3 class="product-title">
                                           {{ $item->product_name }} ×
                                            <span class="product-qty">{{ $item->quantity }}</span>
                                        </h3>
                                    </td>

                                    <td class="price-col">
                                        <span>{{ $item->price }} CFA</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <td>
                                        <h4>Subtotal</h4>
                                    </td>

                                    <td class="price-col">
                                        <span>{{ $total }} CFA</span>
                                    </td>
                                </tr>
                                <tr class="order-shipping">
                                    <td class="text-left" colspan="2">
                                        <h4 class="m-b-sm">Shipping</h4>

                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio d-flex">
                                                <input type="radio" class="custom-control-input" name="radio" checked />
                                                <label class="custom-control-label">Local Pickup</label>
                                            </div>
                                            <!-- End .custom-checkbox -->
                                        </div>
                                        <!-- End .form-group -->

                                        {{-- <div class="form-group form-group-custom-control mb-0">
                                            <div class="custom-control custom-radio d-flex mb-0">
                                                <input type="radio" name="radio" class="custom-control-input">
                                                <label class="custom-control-label">Flat Rate</label>
                                            </div>
                                            <!-- End .custom-checkbox -->
                                        </div> --}}
                                        <!-- End .form-group -->
                                    </td>

                                </tr>

                                <tr class="order-total">
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <b class="total-price"><span>{{ $total }} CFA</span></b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="payment-methods">
                            <h4 class="">Payment methods</h4>
                            <div class="form-group form-group-custom-control my-0">
                                <div class="custom-control custom-radio d-flex my-2">
                                    <input type="radio" class="custom-control-input" value="Cash on Delivery" name="payment" checked />
                                    <label class="custom-control-label">Cash on Delivery</label>
                                </div>
                                <!-- End .custom-checkbox -->
                            </div>
                            <!-- End .form-group -->

                            <div class="form-group form-group-custom-control my-0">
                                <div class="custom-control custom-radio d-flex my-2">
                                    <input type="radio" name="payment" value="Quickpay" class="custom-control-input">
                                    <label class="custom-control-label">Quickpay</label>
                                </div>
                                <!-- End .custom-checkbox -->
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark btn-place-order">
                            Place order
                        </button>
                    </div>
                    <!-- End .cart-summary -->
                </div>
        </form>
        <!-- End .col-lg-4 -->
    </div>
    <!-- End .row -->
    </div>
    <!-- End .container -->
</main>
<!-- End .main -->
@include('layouts.footer')
<script>
    $(document).ready(function() {
        $('#checkout-form').submit(function(e) {
            e.preventDefault();
            var formdata = new FormData(this);
            formdata.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: "{{ route('shipping-cart')}}",
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    data=JSON.parse(data);
                    if (data.status == 200) {
                       swal({
                            title: "Success!",
                            text: data.message,
                            icon: "success",
                            button: "OK!",
                        }).then((value) => {
                            window.location.href = "{{ route('home') }}";
                        });
                    } else {
                        swal({
                            title: "Error!",
                            text: "Something went wrong",
                            icon: "error",
                            button: "OK!",
                        });
                    }
                }
            });
        });
    });
</script>
s