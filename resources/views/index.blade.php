@include('layouts.head')

@include('layouts.navbar')



<main class="main">

    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"

        data-owl-options="{

				'loop': false

			}">

        <div class="home-slide home-slide1 banner">

            <img class="slide-bg" src="{{ asset('banner/' . $banners[0]->image) }}" width="1903"

                height="499" alt="slider image">

            <div class="container d-flex align-items-center">

                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">

                    <h3 class="m-b-3 text-white">{{$banners[0]->title}}</h3>

                    <h4 class="text-transform-none m-b-3 text-white">{{$banners[0]->description}}

                    </h4>

                    <h5 class="d-inline-block mb-0">

                    </h5>

                    <a href="{{$banners[0]->button_link}}" class="btn btn-primary btn-lg">{{$banners[0]->button_title}}

                    </a>

                </div>

                <!-- End .banner-layer -->

            </div>

        </div>

        <!-- End .home-slide -->



        <div class="home-slide home-slide2 banner banner-md-vw">

            <img class="slide-bg" style="background-color: #ccc;" width="1903" height="499"

                src="{{ asset('banner/' . $banners[1]->image) }}" alt="slider image">

            <div class="container d-flex align-items-center">

                <div class="banner-layer d-flex justify-content-center appear-animate"

                    data-animation-name="fadeInUpShorter">

                    <div class="mx-auto">

                        <h3 class="m-b-3 text-white">{{$banners[1]->title}}</h3>

                        <h4 class="text-transform-none m-b-3 text-white">

                            {{$banners[1]->description}}

                        </h4>

                        <h5 class="d-inline-block mb-0">

                        </h5>

                        <a href="{{$banners[1]->button_link}}" class="btn btn-primary btn-lg">

                        {{$banners[1]->button_title}}

                        </a>

                    </div>

                </div>

                <!-- End .banner-layer -->

            </div>

        </div>

        <!-- End .home-slide -->

        <div class="home-slide home-slide1 banner">

            <img class="slide-bg" src="{{ asset('banner/' . $banners[2]->image) }}" width="1903"

                height="499" alt="slider image">

            <div class="container d-flex align-items-center">

                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">

                    <h3 class="m-b-3">{{$banners[2]->title}}</h3>

                    <h4 class="text-transform-none m-b-3">

                        {{$banners[2]->description}}

                    </h4>

                    <h5 class="d-inline-block mb-0">

                    </h5>

                    <a href="{{$banners[2]->button_link}}" class="btn btn-primary btn-lg">

                    {{$banners[2]->button_title}}

                    </a>

                </div>

                <!-- End .banner-layer -->

            </div>

        </div>

        <!-- End .home-slide -->

    </div>

    <!-- End .home-slider -->



    <div class="container">



        <div class="banners-container mb-2">

            <div class="banners-slider owl-carousel owl-theme" data-owl-options="{

						'dots': false

					}">

                <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate"

                    style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">

                    <figure class="w-100">

                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-1.png') }}" alt="banner"

                            width="380" height="175" />

                    </figure>

                    <div class="banner-layer">

                        <h3 class="m-b-2 mb-3">{{ $banners[3]->title }}</h3>

                        <a href="{{$banners[3]->button_link}}" class="btn btn-sm btn-primary">{{ $banners[3]->button_title }}</a>

                    </div>

                </div>

                <!-- End .banner -->



                <div class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate"

                    data-animation-name="fadeInUpShorter" data-animation-delay="200">

                    <figure class="w-100">

                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-2.jpg') }}"

                            style="background-color: #ccc;" alt="banner" width="380" height="175" />

                    </figure>

                    <div class="banner-layer text-center">

                        <div class="row align-items-lg-center">

                            <div class="col-lg-12 text-lg-right">

                                <h3>{{ $banners[4]->title }}</h3>

                                <h4 class="pb-4 pb-lg-0 mb-0 text-body">{{ $banners[4]->description }}</h4>

                            </div>

                            <div class="col-lg-5 text-lg-left px-0 px-xl-3">

                                <a href="{{$banners[4]->button_link}}" class="btn btn-sm btn-dark">{{ $banners[4]->button_title }}</a>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- End .banner -->



                <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate"

                    style="background-color: #ccc;" data-animation-name="fadeInRightShorter" data-animation-delay="500">

                    <figure class="w-100">

                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-3.png') }}" alt="banner"

                            width="380" height="175" />

                    </figure>

                    <div class="banner-layer">

                        <h3 class="m-b-2">{{ $banners[5]->title }}</h3>

                        <a href="{{$banners[5]->button_link}}" class="btn btn-sm btn-dark">{{ $banners[5]->button_title }}</a>

                    </div>

                </div>

                <!-- End .banner -->

            </div>

        </div>

    </div>

    <!-- End .container -->



    <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate"

        data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories

    </h2>

    <div class="container">

        <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">

            @foreach ($categories as $category)

                <div class="category category-default category-absolute appear-animate" data-animation-delay="200"

                    data-animation-name="fadeInUpShorter">

                    <a href="{{ route('category', ['id' => $category->id]) }}">

                        <figure style="height:275px">

                            <img src="{{ asset('categories/' . $category->image) }}" alt="category"

                                style="height:180px;width:210px;" />

                        </figure>

                        <div class="category-content">

                            <h4>{{ $category->parent_category_name }}</h4>

                            <span><mark class="count">{{ $category->products->count() }}</mark> products</span>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>



    <div class="container">

        <div class="info-boxes-slider owl-carousel owl-theme mt-3 mb-2"

            data-owl-options="{

                    'dots': false,

                    'loop': false,

                    'responsive': {

                        '576': {

                            'items': 2

                        },

                        '992': {

                            'items': 3

                        }

                    }

                }">

            <div class="info-box info-box-icon-left">

                <i class="icon-shipping"></i>



                <div class="info-box-content">

                    <h4>FREE SHIPPING &amp; RETURN</h4>

                    <p class="text-body">Free shipping on all orders over 99 CFA.</p>

                </div>

                <!-- End .info-box-content -->

            </div>

            <!-- End .info-box -->



            <div class="info-box info-box-icon-left">

                <i class="icon-money"></i>



                <div class="info-box-content">

                    <h4>MONEY BACK GUARANTEE</h4>

                    <p class="text-body">100% money back guarantee</p>

                </div>

                <!-- End .info-box-content -->

            </div>

            <!-- End .info-box -->



            <div class="info-box info-box-icon-left">

                <i class="icon-support"></i>



                <div class="info-box-content">

                    <h4>ONLINE SUPPORT 24/7</h4>

                    <p class="text-body">Lorem ipsum dolor sit amet.</p>

                </div>

                <!-- End .info-box-content -->

            </div>

            <!-- End .info-box -->

        </div>

    </div>



    <section class="new-products-section">

        <div class="container">

            <h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>



            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2"

                data-owl-options="{

						'dots': false,

						'nav': true,

						'responsive': {

							'992': {

								'items': 4

							},

							'1200': {

								'items': 5

							}

						}

					}">

                @foreach ($new_products as $new_product)

                    <div class="product-default appear-animate mb-3" data-animation-name="fadeInRightShorter">

                        <figure>

                            <a href="{{ route('product.details', ['id' => $new_product->id]) }}">

                                <img src="{{ asset('products/' . $new_product->image) }}" width="280"

                                    height="280" alt="product" style="height: 200px">

                                <img src="{{ asset('products/' . $new_product->image) }}" width="280"

                                    height="280" alt="product" style="height: 200px">

                            </a>

                        </figure>

                        <div class="product-details">

                            <div class="category-list">

                                <a href="{{ route('category', ['id' => $category->id]) }}"

                                    class="product-category">{{ $new_product->category->parent_category_name }}</a>

                            </div>

                            <h3 class="product-title">

                                <a

                                    href="{{ route('product.details', ['id' => $new_product->id]) }}">{{ $new_product->product_name }}</a>

                            </h3>

                            <div class="ratings-container">

                                <div class="product-ratings">

                                    <span class="ratings" style="width:{{ $new_product->avg_rating * 20 }}%"></span>

                                    <!-- End .ratings -->

                                    <span class="tooltiptext tooltip-top"></span>

                                </div>

                                <!-- End .product-ratings -->

                            </div>

                            <!-- End .product-container -->

                            <div class="price-box">

                                <span class="product-price">

                                    @if ($new_product->discount_price == null)

                                        {{ $new_product->price }}

                                    @else

                                        {{ $new_product->discount_price }}

                                    @endif

                                    CFA

                                </span>

                            </div>

                            <!-- End .price-box -->

                            <div class="product-action">

                                <a href="#" onclick="addWishlistItem({{ $new_product->id }})"

                                    class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>

                                <a href="{{ route('product.details', ['id' => $new_product->id]) }}"

                                    class="btn-icon btn-add-cart"><i

                                        class="fa fa-arrow-right"></i><span>View</span></a>

                                <a href="{{ route('product.details', ['id' => $new_product->id]) }}"

                                    class="btn-quickview" title="Quick View"><i

                                        class="fas fa-external-link-alt"></i></a>

                            </div>

                        </div>

                        <!-- End .product-details -->

                    </div>

                @endforeach

            </div>

            <!-- End .featured-proucts -->



            <div class="banner banner-big-sale appear-animate" data-animation-delay="200"

                data-animation-name="fadeInUpShorter"

                style="background: #2A95CB center/cover url('assets/images/demoes/demo4/banners/banner-4.jpg');">

                <div class="banner-content row align-items-center mx-0">

                    <div class="col-md-9 col-sm-8">

                        <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">

                            <b class="d-inline-block mr-3 mb-1 mb-md-0">{{ $banners[6]->title }}</b> 

                            {{ $banners[6]->description }}

                        </h2>

                    </div>

                    <div class="col-md-3 col-sm-4 text-center text-sm-right">

                        <a class="btn btn-light btn-white btn-lg" href="{{$banners[6]->button_link}}">{{ $banners[6]->button_title }}</a>

                    </div>

                </div>

            </div>



        </div>

    </section>

    <!-- End .feature-boxes-container -->

    <section class="testimonial-section testimonial-bg bg-gray">

        <div class="container">

            <div class="owl-carousel owl-theme owl-dots-simple mb-4 mb-lg-0 appear-animate owl-loaded owl-drag animated fadeInRightShorter appear-animation-visible"

                data-owl-options="{

                'loop': false,

                'dots': false,

                'margin': 20,

                'responsive': null

            }"

                data-animation-name="fadeInRightShorter" data-animation-delay="200"

                style="animation-duration: 1000ms;">





                <div class="owl-stage-outer">

                    <div class="owl-stage"

                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2400px;">

                        <div class="owl-item active" style="width: 1180px; margin-right: 20px;">

                            <div class="testimonial testimonial-type1 blockquote-both inner-blockquote owner-center">

                                <div class="testimonial-owner px-5">

                                    <div class="text-center">

                                        <figure>

                                            <img src="{{ asset('assets/images/elements/testimonial/client1.png') }}"

                                                width="62" height="62" alt="client">

                                        </figure>

                                        <blockquote class="text-gray">

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit

                                                vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur

                                                adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>

                                        </blockquote>

                                        <strong class="testimonial-title text-center">John Smith</strong>

                                        <span>CEO &amp; Founder - Okler</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="owl-item" style="width: 1180px; margin-right: 20px;">

                            <div class="testimonial testimonial-type1 blockquote-both inner-blockquote owner-center">

                                <div class="testimonial-owner px-5">

                                    <div class="text-center">

                                        <figure>

                                            <img src="{{ asset('assets/images/elements/testimonial/client1.png') }}"

                                                width="62" height="62" alt="client">

                                        </figure>

                                        <blockquote class="text-gray">

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit

                                                vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur

                                                adipiscing elit. Donec hendrerit vehicula est, in consequat. Donec

                                                hendrerit

                                                vehicula est, in consequat. Donec hendrerit vehicula est, in consequat.

                                            </p>

                                        </blockquote>

                                        <strong class="testimonial-title">John Smith</strong>

                                        <span>CEO &amp; Founder - Okler</span>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="owl-nav disabled"><button type="button" title="nav" role="presentation"

                        class="owl-prev"><i class="icon-angle-left"></i></button><button type="button"

                        title="nav" role="presentation" class="owl-next"><i

                            class="icon-angle-right"></i></button></div>

                <div class="owl-dots"><button role="button" title="dot"

                        class="owl-dot active"><span></span></button><button role="button" title="dot"

                        class="owl-dot"><span></span></button></div>

            </div>

        </div>

    </section>



    <section class="blog-section pb-0">

        <div class="container">

            <div class="brands-slider owl-carousel owl-theme images-center appear-animate"

                data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{

					'margin': 0}">

                <img src="{{ asset('assets/images/brands/b1.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b2.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b3.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b4.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b5.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b6.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b7.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b8.png') }}" width="130" height="56" alt="brand">

                <img src="{{ asset('assets/images/brands/b9.png') }}" width="130" height="56" alt="brand">

            </div>

            <!-- End .brands-slider -->



            <hr class="mt-4 m-b-5">

            <!-- End .row -->



            <div class="product-widgets-container row pb-2">

                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate animated fadeInLeftShorter appear-animation-visible"

                    data-animation-name="fadeInLeftShorter" data-animation-delay="200"

                    style="animation-duration: 1000ms;">

                    <h4 class="section-sub-title">Featured Products</h4>

                    @foreach ($featured_products as $product)

                        <div class="product-default left-details product-widget">

                            <figure>

                                <a href="{{ route('product.details', ['id' => $product->id]) }}">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                </a>

                            </figure>



                            <div class="product-details">

                                <h3 class="product-title"> <a

                                        href="{{ route('product.details', ['id' => $product->id]) }}">

                                        {{ $product->product_name }} </a>

                                </h3>



                                <div class="ratings-container">

                                    <div class="product-ratings">

                                        <span class="ratings" style="width:{{ $product->avg_rating * 20 }}%"></span>

                                        <!-- End .ratings -->

                                        <span class="tooltiptext tooltip-top"></span>

                                    </div>

                                    <!-- End .product-ratings -->

                                </div>

                                <!-- End .product-container -->



                                <div class="price-box">

                                    <span class="product-price">

                                        @if ($new_product->discount_price == null)

                                            {{ $new_product->price }}

                                        @else

                                            {{ $new_product->discount_price }}

                                        @endif

                                        CFA

                                    </span>

                                </div>

                                <!-- End .price-box -->

                            </div>

                            <!-- End .product-details -->

                        </div>

                    @endforeach

                </div>



                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate animated fadeInLeftShorter appear-animation-visible"

                    data-animation-name="fadeInLeftShorter" data-animation-delay="500"

                    style="animation-duration: 1000ms;">

                    <h4 class="section-sub-title">Top Recommandés</h4>

                    @foreach ($recommended_products as $product)

                        <div class="product-default left-details product-widget">

                            <figure>

                                <a href="{{ route('product.details', ['id' => $product->id]) }}">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                </a>

                            </figure>



                            <div class="product-details">

                                <h3 class="product-title"> <a

                                        href="{{ route('product.details', ['id' => $product->id]) }}">

                                        {{ $product->product_name }} </a>

                                </h3>



                                <div class="ratings-container">

                                    <div class="product-ratings">

                                        <span class="ratings" style="width:{{ $product->avg_rating * 20 }}%"></span>

                                        <!-- End .ratings -->

                                        <span class="tooltiptext tooltip-top"></span>

                                    </div>

                                    <!-- End .product-ratings -->

                                </div>

                                <!-- End .product-container -->



                                <div class="price-box">

                                    <span class="product-price">

                                        @if ($new_product->discount_price == null)

                                            {{ $new_product->price }}

                                        @else

                                            {{ $new_product->discount_price }}

                                        @endif

                                        CFA

                                    </span>

                                </div>

                                <!-- End .price-box -->

                            </div>

                            <!-- End .product-details -->

                        </div>

                    @endforeach

                </div>



                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate animated fadeInLeftShorter appear-animation-visible"

                    data-animation-name="fadeInLeftShorter" data-animation-delay="800"

                    style="animation-duration: 1000ms;">

                    <h4 class="section-sub-title">Les plus Vendus</h4>

                    @foreach ($bestselling_products as $product)

                        <div class="product-default left-details product-widget">

                            <figure>

                                <a href="{{ route('product.details', ['id' => $product->id]) }}">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                </a>

                            </figure>



                            <div class="product-details">

                                <h3 class="product-title"> <a

                                        href="{{ route('product.details', ['id' => $product->id]) }}">

                                        {{ $product->product_name }} </a>

                                </h3>



                                <div class="ratings-container">

                                    <div class="product-ratings">

                                        <span class="ratings" style="width:{{ $product->avg_rating * 20 }}%"></span>

                                        <!-- End .ratings -->

                                        <span class="tooltiptext tooltip-top"></span>

                                    </div>

                                    <!-- End .product-ratings -->

                                </div>

                                <!-- End .product-container -->



                                <div class="price-box">

                                    <span class="product-price">

                                        @if ($new_product->discount_price == null)

                                            {{ $new_product->price }}

                                        @else

                                            {{ $new_product->discount_price }}

                                        @endif

                                        CFA

                                    </span>

                                </div>

                                <!-- End .price-box -->

                            </div>

                            <!-- End .product-details -->

                        </div>

                    @endforeach

                </div>



                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate animated fadeInLeftShorter appear-animation-visible"

                    data-animation-name="fadeInLeftShorter" data-animation-delay="1100"

                    style="animation-duration: 1000ms;">

                    <h4 class="section-sub-title">En Soldes</h4>

                    @foreach ($sale_products as $product)

                        <div class="product-default left-details product-widget">

                            <figure>

                                <a href="{{ route('product.details', ['id' => $product->id]) }}">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                    <img src="{{ asset('products/' . $product->image) }}" width="84"

                                        height="84" alt="product" style="height: 84px">

                                </a>

                            </figure>



                            <div class="product-details">

                                <h3 class="product-title"> <a

                                        href="{{ route('product.details', ['id' => $product->id]) }}">

                                        {{ $product->product_name }} </a>

                                </h3>



                                <div class="ratings-container">

                                    <div class="product-ratings">

                                        <span class="ratings" style="width:{{ $product->avg_rating * 20 }}%"></span>

                                        <!-- End .ratings -->

                                        <span class="tooltiptext tooltip-top"></span>

                                    </div>

                                    <!-- End .product-ratings -->

                                </div>

                                <!-- End .product-container -->



                                <div class="price-box">

                                    <span class="product-price">

                                        @if ($new_product->discount_price == null)

                                            {{ $new_product->price }}

                                        @else

                                            {{ $new_product->discount_price }}

                                        @endif

                                        CFA

                                    </span>

                                </div>

                                <!-- End .price-box -->

                            </div>

                            <!-- End .product-details -->

                        </div>

                    @endforeach



                </div>

            </div>

        </div>

    </section>

</main>

<!-- End .main -->

<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form"

    style="background: #f1f1f1 no-repeat center/cover url(assets/images/newsletter_popup_bg.webp)">

    <div class="newsletter-popup-content">

        <img src="{{ asset('assets/images/logo.png') }}" width="111" height="44" alt="Logo"

            class="logo-newsletter">

        <h2>Inscrivez-vous à notre newsletter</h2>



        <p>

            Recevez nos avantages, nos offres et nos actualités avant tous le monde !



        </p>



        <form action="#">

            <div class="input-group">

                <input type="email" class="form-control" id="newsletter-email" name="newsletter-email"

                    placeholder="Saisissez votre adresse e-mail*" required />

                <input type="submit" class="btn btn-primary" value="Je m'inscris" />

            </div>

        </form>

        <div class="newsletter-subscribe">

            <div class="custom-control custom-checkbox">

                <input type="checkbox" class="custom-control-input" value="0" id="show-again" />

                <label for="show-again" class="custom-control-label">

                    Ne plus afficher cette popup

                </label>

            </div>

        </div>

    </div>

    <!-- End .newsletter-popup-content -->



    <button title="Close (Esc)" type="button" class="mfp-close">

        ×

    </button>

</div>

<!-- End .newsletter-popup -->

@include('layouts.footer')

