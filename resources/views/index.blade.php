@include('layouts.head')
@include('layouts.navbar')

<main class="main">
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
        data-owl-options="{
				'loop': false
			}">
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="{{ asset('assets/images/demoes/demo4/slider/slide-1.jpg') }}" width="1903"
                height="499" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h3 class="m-b-3 text-white">Jouets enfants <br>fille & garçon</h3>
                    <h4 class="text-transform-none m-b-3 text-white">Une large sélection de produits au meilleur prix.
                    </h4>
                    <h5 class="d-inline-block mb-0">
                    </h5>
                    <a href="#" class="btn btn-primary btn-lg">Achetez maintenant</a>
                </div>
                <!-- End .banner-layer -->
            </div>
        </div>
        <!-- End .home-slide -->

        <div class="home-slide home-slide2 banner banner-md-vw">
            <img class="slide-bg" style="background-color: #ccc;" width="1903" height="499"
                src="{{ asset('assets/images/demoes/demo4/slider/slide-2.jpg') }}" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer d-flex justify-content-center appear-animate"
                    data-animation-name="fadeInUpShorter">
                    <div class="mx-auto">
                        <h3 class="m-b-3 text-white">Siège Auto Isofix Kidstar</h3>
                        <h4 class="text-transform-none m-b-3 text-white">Un design élégant et des accessoires innovants
                            pour la croissance.</h4>
                        <h5 class="d-inline-block mb-0">
                        </h5>
                        <a href="#" class="btn btn-primary btn-lg">Achetez maintenant</a>
                    </div>
                </div>
                <!-- End .banner-layer -->
            </div>
        </div>
        <!-- End .home-slide -->
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="{{ asset('assets/images/demoes/demo4/slider/slide-3.jpg') }}" width="1903"
                height="499" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h3 class="m-b-3">Berceau Bébé <bR>Évolutif</h3>
                    <h4 class="text-transform-none m-b-3">Un beau lit à barreaux, pour accueillir le bébé dès les
                        premières nuits.</h4>
                    <h5 class="d-inline-block mb-0">
                    </h5>
                    <a href="#" class="btn btn-primary btn-lg">Achetez maintenant</a>
                </div>
                <!-- End .banner-layer -->
            </div>
        </div>
        <!-- End .home-slide -->
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="{{ asset('assets/images/demoes/demo4/slider/slide-4.jpg') }}" width="1903"
                height="499" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h3 class="m-b-3">Accessoires <br>pour Bébé</h3>
                    <h4 class="text-transform-none m-b-3">Obtenez les produits les plus sur pour le soins.</h4>
                    <h5 class="d-inline-block mb-0">
                    </h5>
                    <a href="#" class="btn btn-dark btn-lg">Shop Now!</a>
                </div>
                <!-- End .banner-layer -->
            </div>
        </div>
        <!-- End .home-slide -->
    </div>
    <!-- End .home-slider -->

    <div class="container">
        <!-- <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
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
                            <p class="text-body">Free shipping on all orders over $99.</p>
                        </div>
                    </div>

                    <div class="info-box info-box-icon-left">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div>
                    </div>

                    <div class="info-box info-box-icon-left">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div> -->
        <!-- End .info-boxes-slider -->

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
                        <h3 class="m-b-2 mb-3">Nouvel Arrivage</h3>
                        <a href="#" class="btn btn-sm btn-primary">Parcouir les produits</a>
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
                                <h3>offres promotionnelles</h3>
                                <h4 class="pb-4 pb-lg-0 mb-0 text-body">À partir de 99 CFA</h4>
                            </div>
                            <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                <a href="#" class="btn btn-sm btn-dark">Parcouir les produits</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->

                <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate"
                    style="background-color: #ccc;" data-animation-name="fadeInRightShorter"
                    data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-3.png') }}" alt="banner"
                            width="380" height="175" />
                    </figure>
                    <div class="banner-layer">
                        <h3 class="m-b-2">Offre spéciale</h3>
                        <a href="#" class="btn btn-sm btn-dark">Commandez maintenant</a>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
        </div>
    </div>
    <!-- End .container -->
    <section class="featured-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">LES ESSENTIELS POUR VOTRE BÉBÉ</h2>
            <div class="row">
                <div class="col-md-2">
                    <div class="product-default appear-animate mb-3" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="#">
                                <img src="{{ asset('assets/images/products/bp1.png') }}" width="280"
                                    height="280" alt="product">
                                <img src="{{ asset('assets/images/products/bp1.png') }}" width="280"
                                    height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="#">Puériculture</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="product-default appear-animate mb-3" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="#">
                                <img src="{{ asset('assets/images/products/bp2.png') }}" width="280"
                                    height="280" alt="product">
                                <img src="{{ asset('assets/images/products/bp2.png') }}" width="280"
                                    height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="#">Vêtement</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="product-default appear-animate mb-3" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="#">
                                <img src="{{ asset('assets/images/products/bp3.png') }}" width="280"
                                    height="280" alt="product">
                                <img src="{{ asset('assets/images/products/bp3.png') }}" width="280"
                                    height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="#">Chaussures</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="product-default appear-animate mb-3" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="#">
                                <img src="{{ asset('assets/images/products/bp4.png') }}" width="280"
                                    height="280" alt="product">
                                <img src="{{ asset('assets/images/products/bp4.png') }}" width="280"
                                    height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="#">Repas Bébé</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="product-default appear-animate mb-3" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="#">
                                <img src="{{ asset('assets/images/products/bp6.png') }}" width="280"
                                    height="280" alt="product">
                                <img src="{{ asset('assets/images/products/bp6.png') }}" width="280"
                                    height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="#">Jouet et Cadeaux</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="product-default appear-animate mb-3" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="#">
                                <img src="{{ asset('assets/images/products/bp7.png') }}" width="280"
                                    height="280" alt="product">
                                <img src="{{ asset('assets/images/products/bp7.png') }}" width="280"
                                    height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title">
                                <a href="#">Univers Maman</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tabs mb-5">



                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-popular8" data-toggle="tab"
                                    href="#popular-content8" role="tab" aria-controls="popular-content8"
                                    aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>TRANSAT</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="recent-tab8" data-toggle="tab" href="#recent-content8"
                                    role="tab" aria-controls="recent-content8"
                                    aria-selected="true">PARAPHARMACIE</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="BIBERON-tab8" data-toggle="tab" href="#BIBERON-content8"
                                    role="tab" aria-controls="BIBERON-content8" aria-selected="true">BIBERON</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="LANGER-tab8" data-toggle="tab" href="#LANGER-content8"
                                    role="tab" aria-controls="LANGER-content8" aria-selected="true">SAC À
                                    LANGER</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="popular-content8" role="tabpanel"
                                aria-labelledby="tab-popular8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="recent-content8" role="tabpanel"
                                aria-labelledby="recent-tab8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="BIBERON-content8" role="tabpanel"
                                aria-labelledby="BIBERON-tab8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="LANGER-content8" role="tabpanel"
                                aria-labelledby="LANGER-tab8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c1.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c2.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c3.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c4.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c5.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c6.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c7.jpg') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="product-default appear-animate mb-3"
                                            data-animation-name="fadeInRightShorter">
                                            <figure>
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                    <img src="{{ asset('assets/images/products/c8.png') }}"
                                                        width="280" height="280" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-list">
                                                    <a href="#" class="product-category">Category</a>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="#">Ultimate 3D Bluetooth Speaker</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:80%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">49.00 CFA</span>
                                                </div>
                                                <!-- End .price-box -->
                                                <div class="product-action">
                                                    <a href="#" class="btn-icon-wish" title="wishlist"><i
                                                            class="icon-heart"></i></a>
                                                    <a href="#" class="btn-icon btn-add-cart"><i
                                                            class="fa fa-arrow-right"></i><span>View</span></a>
                                                    <a href="#" class="btn-quickview" title="Quick View"><i
                                                            class="fas fa-external-link-alt"></i></a>
                                                </div>
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
                                    height="280" alt="product">
                                <img src="{{ asset('products/' . $new_product->image) }}" width="280"
                                    height="280" alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#"
                                    class="product-category">{{ $new_product->category->parent_category_name }}</a>
                            </div>
                            <h3 class="product-title">
                                <a
                                    href="{{ route('product.details', ['id' => $new_product->id]) }}">{{ $new_product->product_name }}</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings"
                                        style="width:{{ $new_product->avg_rating * 20 }}%"></span>
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
                            <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands items up
                            to 70% off
                            <small class="text-transform-none align-middle">Online Purchases Only</small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-4 text-center text-sm-right">
                        <a class="btn btn-light btn-white btn-lg" href="#">View Sale</a>
                    </div>
                </div>
            </div>

            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate"
                data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories
            </h2>

            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                @foreach ($categories as $category)
                    <div class="category category-default category-absolute appear-animate"
                        data-animation-delay="200" data-animation-name="fadeInUpShorter">
                        <a href="#">
                            <figure>
                                <img src="{{ asset('categories/' . $category->image) }}" alt="category"
                                    style="height:180px;width:180px;" />
                            </figure>
                            <div class="category-content">
                                <h4>{{ $category->category_name }}</h4>
                                <span><mark class="count">{{ $category->products->count() }}</mark> products</span>
                            </div>
                        </a>
                    </div>
                @endforeach
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
            {{-- <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
                Articles récents </h2>

            <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn"
                data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
						'dots': false,
						'items': 2,
						'responsive': {
							'0': {
								'items': 1
							},
							'480': {
								'items': 2
							},
							'576': {
								'items': 3
							},
							'768': {
								'items': 4
							}
						}
					}">
                <article class="post">
                    <div class="post-media">
                        <a href="#">
                            <img src="{{ asset('assets/images/blog/home/post1.png') }}" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="#">Soin et Bien être : comment bien choisir sa gamme de toilette pour bébé
                                ?</a>
                        </h2>
                        <div class="post-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non
                                tellus sem. Aenean...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="#" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->

                <article class="post">
                    <div class="post-media">
                        <a href="#">
                            <img src="{{ asset('assets/images/blog/home/post2.jpg') }}" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="#">Le réducteur de toilettes pour bébé</a>
                        </h2>
                        <div class="post-content">
                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="#" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->

                <article class="post">
                    <div class="post-media">
                        <a href="#">
                            <img src="{{ asset('assets/images/blog/home/post3.png') }}" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="#">Le cododo : Bienfaits, précautions et mode d'emploi</a>
                        </h2>
                        <div class="post-content">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="#" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->

                <article class="post">
                    <div class="post-media">
                        <a href="#">
                            <img src="{{ asset('assets/images/blog/home/post4.jpg') }}" alt="Post"
                                width="225" height="280">
                        </a>
                        <div class="post-date">
                            <span class="day">26</span>
                            <span class="month">Feb</span>
                        </div>
                    </div>
                    <!-- End .post-media -->

                    <div class="post-body">
                        <h2 class="post-title">
                            <a href="#">La transition entre l’allaitement maternel et le biberon : le tire
                                lait</a>
                        </h2>
                        <div class="post-content">
                            <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in
                                the 1960s with the release of...</p>
                        </div>
                        <!-- End .post-content -->
                        <a href="#" class="post-comment">0 Comments</a>
                    </div>
                    <!-- End .post-body -->
                </article>
                <!-- End .post -->
            </div> --}}
            {{-- 
            <hr class="mt-0 m-b-5"> --}}

            <div class="brands-slider owl-carousel owl-theme images-center appear-animate"
                data-animation-name="fadeIn" data-animation-duration="500" data-owl-options="{
					'margin': 0}">
                <img src="{{ asset('assets/images/brands/b1.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b2.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b3.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b4.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b5.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b6.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b7.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b8.png') }}" width="130" height="56"
                    alt="brand">
                <img src="{{ asset('assets/images/brands/b9.png') }}" width="130" height="56"
                    alt="brand">
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
                                        height="84" alt="product">
                                    <img src="{{ asset('products/' . $product->image) }}" width="84"
                                        height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a
                                        href="{{ route('product.details', ['id' => $product->id]) }}">
                                        {{ $product->product_name }} </a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings"
                                            style="width:{{ $product->avg_rating * 20 }}%"></span>
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
                                        height="84" alt="product">
                                    <img src="{{ asset('products/' . $product->image) }}" width="84"
                                        height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a
                                        href="{{ route('product.details', ['id' => $product->id]) }}">
                                        {{ $product->product_name }} </a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings"
                                            style="width:{{ $product->avg_rating * 20 }}%"></span>
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
                                        height="84" alt="product">
                                    <img src="{{ asset('products/' . $product->image) }}" width="84"
                                        height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a
                                        href="{{ route('product.details', ['id' => $product->id]) }}">
                                        {{ $product->product_name }} </a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings"
                                            style="width:{{ $product->avg_rating * 20 }}%"></span>
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
                                        height="84" alt="product">
                                    <img src="{{ asset('products/' . $product->image) }}" width="84"
                                        height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a
                                        href="{{ route('product.details', ['id' => $product->id]) }}">
                                        {{ $product->product_name }} </a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings"
                                            style="width:{{ $product->avg_rating * 20 }}%"></span>
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
