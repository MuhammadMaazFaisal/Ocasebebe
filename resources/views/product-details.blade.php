@include('layouts.head')
@include('layouts.navbar')

<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
            </ol>
        </nav>

        <div class="product-single-container product-single-default">
            <div class="cart-message d-none">
                <strong class="single-cart-notice">“{{ $product->product_name }}”</strong>
                <span>has been added to your cart.</span>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    <div class="product-slider-container">
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            @if ($product->discount_price)
                                <div class="product-label label-sale">
                                    {{ (1 - $product->discount_price / $product->price) * 100 }}%
                                </div>
                            @endif
                        </div>

                        <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                            <div class="product-item">
                                <img class="product-single-image" src={{ asset('products/' . $product->image) }}
                                    data-zoom-image={{ asset('products/' . $product->image) }} width="468"
                                    height="468" alt="product" />
                            </div>

                            @foreach (json_decode($product->multiple_image) as $image)
                                <div class="product-item">
                                    <img class="product-single-image" src={{ asset('products/' . $image) }}
                                        data-zoom-image={{ asset('products/' . $image) }} width="468" height="468"
                                        alt="product" />
                                </div>
                            @endforeach
                        </div>
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>

                    <div class="prod-thumbnail owl-dots">


                        <div class="owl-dot">
                            <img src={{ asset('products/' . $product->image) }} width="110" height="110"
                                alt="product-thumbnail" />
                        </div>
                        @foreach (json_decode($product->multiple_image) as $image)
                            <div class="owl-dot">
                                <img src={{ asset('products/' . $image) }} width="110" height="110"
                                    alt="product-thumbnail" />
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End .product-single-gallery -->

                <div class="col-lg-7 col-md-6 product-single-details">
                    <h1 class="product-title">
                        {{ $product->name }}
                    </h1>

                    {{-- <div class="product-nav">
                        <div class="product-prev">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                            src="{{ asset('assets/images/products/product-3.jpg') }}"
                                            style="padding-top: 0px;">

                                        <span>Circled Ultimate 3D Speaker</span>
                                    </span>
                                </span>
                            </a>
                        </div>

                        <div class="product-next">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150"
                                            src="{{ asset('assets/images/products/product-4.jpg') }}"
                                            style="padding-top: 0px;">

                                        <span>Blue Backpack for the Young</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div> --}}

                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:{{ $review_avg * 20 }}%"></span>
                            <!-- End .ratings -->
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <!-- End .product-ratings -->

                        <a href="#" class="rating-link">( {{ $review_count }} Reviews )</a>
                    </div>
                    <!-- End .ratings-container -->

                    <hr class="short-divider">

                    <div class="price-box">
                        @if ($product->discount_price)
                            <span class="old-price"> {{ $product->price }} FCFA </span>
                            <span class="product-price"> {{ $product->discount_price }} FCFA </span>
                        @else
                            <span class="product-price"> {{ $product->price }} FCFA </span>
                        @endif
                    </div>
                    <!-- End .price-box -->

                    <div class="product-desc">
                        <p>
                            {{ $product->short_description }}
                        </p>
                    </div>
                    <div class="product-filters-container custom-product-filters pt-0 pb-2 mb-0">
                        @if (count(json_decode($product_attributes)) > 0)
                            <div class="product-single-filter">
                                <label>Color:</label>

                                <ul class="config-size-list config-color-list config-filter-list">

                                    @foreach (json_decode($product_attributes) as $attribute)
                                        <li class="" data-id="{{ $attribute->id }}">
                                            <a href="javascript:;" class="filter-color border-0"
                                                style="background-color: {{ $attribute->color_code }};">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (count(json_decode($lengthnames)) > 0)
                            <div class="product-single-filter">
                                <label>Size:</label>

                                <ul class="config-size-list config-lengths">
                                    @foreach (json_decode($lengthnames) as $lengthname)
                                        <li data-id="{{ $lengthname->id }}"><a href="javascript:;"
                                                class="d-flex align-items-center justify-content-center">{{ $lengthname->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="product-single-filter">
                            <label></label>
                            <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                        </div>
                        <!---->
                    </div>
                    <!-- End .product-desc -->

                    <ul class="single-info-list">
                        <li>
                            CATEGORY: <strong><a href="#"
                                    class="product-category">{{ $category->parent_category_name }}</a></strong>
                        </li>
                        <li>

                        </li>
                    </ul>


                    <div class="product-action">
                        <div class="product-single-qty">
                            <input class="horizontal-quantity form-control" type="text">
                        </div>
                        <!-- End .product-single-qty -->

                        <a href="javascript:;" id="add-btn" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add
                            to
                            Cart</a>
                        <a href="{{ route('cart') }}" class="btn btn-gray view-cart d-none">View cart</a>
                        <div class="login-form-container">
                            <h4>
                                <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne" class="btn btn-primary p-3 btn-toggle">Commander en 1
                                    clic</button>
                            </h4>

                            <div id="collapseOne" class="collapse">
                                <div class="login-section feature-box">
                                    <div class="feature-box-content">
                                        <form id="lead-form">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="mb-0 pb-1">Nom <span
                                                                class="required">*</span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="mb-0 pb-1">Email <span
                                                                class="required">*</span></label>
                                                        <input type="email" name="email" class="form-control"
                                                            required />
                                                    </div>
                                                </div>


                                            </div>

                                            <button type="submit" class="btn">Annuler</button>
                                            <button type="submit"
                                                class="btn btn-primary bg-primary">Commander</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-success"><i class="fab fa-whatsapp"></i> Commander avec
                            WhatsApp</a>
                    </div>
                    <!-- End .product-action -->

                    <hr class="divider mb-0 mt-0">

                    <div class="product-single-share mb-3">
                        <label class="sr-only">Share:</label>

                        <div class="social-icons mr-2">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                title="Linkedin"></a>
                            <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                title="Google +"></a>
                            <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                title="Mail"></a>
                        </div>
                        <!-- End .social-icons -->

                        <a href="#" onclick="addWishlistItem({{ $product->id }})"
                            class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                class="icon-wishlist-2"></i><span>Add to
                                Wishlist</span></a>
                    </div>
                    <!-- End .product single-share -->
                </div>
                <!-- End .product-single-details -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                        role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content"
                        role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content"
                        role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews
                        ({{ $review_count }})</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-custom" data-toggle="tab" href="#product-custom-content"
                        role="tab" aria-controls="product-custom-content" aria-selected="false">Custom Tab</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                    aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        {{ $product->description }}
                    </div>
                    <!-- End .product-desc-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-size-content" role="tabpanel"
                    aria-labelledby="product-tab-size">
                    <div class="product-size-content">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/images/products/single/body-shape.png') }}"
                                    alt="body shape" width="217" height="398">
                            </div>
                            <!-- End .col-md-4 -->

                            <div class="col-md-8">
                                <table class="table table-size">
                                    <thead>
                                        <tr>
                                            <th>SIZE</th>
                                            <th>CHEST(in.)</th>
                                            <th>WAIST(in.)</th>
                                            <th>HIPS(in.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>XS</td>
                                            <td>34-36</td>
                                            <td>27-29</td>
                                            <td>34.5-36.5</td>
                                        </tr>
                                        <tr>
                                            <td>S</td>
                                            <td>36-38</td>
                                            <td>29-31</td>
                                            <td>36.5-38.5</td>
                                        </tr>
                                        <tr>
                                            <td>M</td>
                                            <td>38-40</td>
                                            <td>31-33</td>
                                            <td>38.5-40.5</td>
                                        </tr>
                                        <tr>
                                            <td>L</td>
                                            <td>40-42</td>
                                            <td>33-36</td>
                                            <td>40.5-43.5</td>
                                        </tr>
                                        <tr>
                                            <td>XL</td>
                                            <td>42-45</td>
                                            <td>36-40</td>
                                            <td>43.5-47.5</td>
                                        </tr>
                                        <tr>
                                            <td>XXL</td>
                                            <td>45-48</td>
                                            <td>40-44</td>
                                            <td>47.5-51.5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-size-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                    aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <h3 class="reviews-title">1 review for {{ $product->product_name }}</h3>

                        <div class="comment-list">
                            @foreach ($reviews as $review)
                                <div class="comments my-5">
                                    <figure class="img-thumbnail mt-1">
                                        <img src="{{ asset('assets/images/blog/user.png') }}" alt="author"
                                            width="60" height="60">
                                    </figure>

                                    <div class="comment-block">
                                        <div class="comment-header">
                                            <div class="comment-arrow"></div>

                                            <div class="ratings-container float-sm-right">
                                                <div class="product-ratings">
                                                    <span class="ratings"
                                                        style="width:{{ $review->rating * 20 }}%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>

                                            <span class="comment-by">
                                                <strong>{{ $review->name }}</strong>
                                            </span>
                                        </div>

                                        <div class="comment-content">
                                            <p>{{ $review->comments }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="divider"></div>

                        <div class="add-product-review">
                            <h3 class="review-title">Add a review</h3>

                            <form action="#" id="review-form" class="comment-form m-0">
                                <div class="rating-form">
                                    <label for="rating">Your rating <span class="required">*</span></label>
                                    <span class="rating-stars">
                                        <a class="star-1" href="#">1</a>
                                        <a class="star-2" href="#">2</a>
                                        <a class="star-3" href="#">3</a>
                                        <a class="star-4" href="#">4</a>
                                        <a class="star-5" href="#">5</a>
                                    </span>

                                    <select name="rating" id="rating" required="" style="display: none;">
                                        <option value="">Rate…</option>
                                        <option value="5">Perfect</option>
                                        <option value="4">Good</option>
                                        <option value="3">Average</option>
                                        <option value="2">Not that bad</option>
                                        <option value="1">Very poor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Your review <span class="required">*</span></label>
                                    <textarea name="review" cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                </div>
                                <!-- End .form-group -->


                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Name <span class="required">*</span></label>
                                            <input type="text" name="name" class="form-control form-control-sm"
                                                required>
                                        </div>
                                        <!-- End .form-group -->
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                        <!-- End .add-product-review -->
                    </div>
                    <!-- End .product-reviews-content -->
                </div>
                <!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-custom-content" role="tabpanel"
                    aria-labelledby="product-tab-custom">
                    <div class="mb-2 pb-2">Custom Tab Content</div>
                </div>
                <!-- End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .product-single-tabs -->

        @if (count($related_products) > 0)
            <div class="products-section pt-0">
                <h2 class="section-title">Related Products</h2>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                    @foreach ($related_products as $related_product)
                        <div class="product-default">
                            <figure>
                                <a href="{{ route('product.details', ['id' => $related_product->id]) }}">
                                    <img src={{ asset('products/' . $related_product->image) }} width="280"
                                        height="280" alt="product">
                                    <img src={{ asset('products/' . $related_product->image) }} width="280"
                                        height="280" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">
                                        {{ (1 - $related_product->discount_price / $related_product->price) * 100 }}%
                                    </div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="{{ route('category/' . $category->category_id) }}"
                                        class="product-category">{{ $category->parent_category_name }}</a>
                                </div>
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('product.details', ['id' => $related_product->id]) }}">{{ $related_product->product_name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings"
                                            style="width:{{ $related_product->avg_rating * 20 }}%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    @if ($related_product->discount_price)
                                        <del class="old-price"> {{ $related_product->price }} FCFA </del>
                                        <span class="product-price"> {{ $related_product->discount_price }} FCFA
                                        </span>
                                    @else
                                        <span class="product-price"> {{ $related_product->price }} FCFA </span>
                                    @endif
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" onclick="addWishlistItem({{ $related_product->id }})"
                                        title="Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    <a href="{{ route('product.details', ['id' => $related_product->id]) }}"
                                        class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="{{ route('product.details', ['id' => $related_product->id]) }}"
                                        class="btn-quickview"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                    <!-- End .products-slider -->
                </div>
        @endif
        <!-- End .products-section -->
        <!-- End .row -->
    </div>
    <!-- End .container -->
</main>
<!-- End .main -->
@include('layouts.footer')

<script>
    $(document).ready(function() {
        $('#lead-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('product_id', {{ $product->id }});
            formData.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('add.lead') }}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        swal({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            button: "OK!",
                        }).then((value) => {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: "Error!",
                            text: response.message,
                            icon: "error",
                            button: "OK!",
                        }).then((value) => {
                            window.location.reload();
                        });
                    }
                }
            });
        });
        $('#review-form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            formData.append('product_id', {{ $product->id }});
            formData.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "{{ route('add.review') }}",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        swal({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            button: "OK!",
                        }).then((value) => {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: "Error!",
                            text: response.message,
                            icon: "error",
                            button: "OK!",
                        }).then((value) => {
                            window.location.reload();
                        });
                    }
                }
            });
        });
    });
</script>
