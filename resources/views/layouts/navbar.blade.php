<body>

    <div class="page-wrapper">

        <div class="top-notice bg-primary text-white">

            <div class="container text-center">

                <h5 class="d-inline-block">Bienvenue dans votre showroom Ô’CASE BÉBÉ. Nous sommes ouvert du Lundi au

                    Dimanche de 09H à 20H.</h5>

                <button title="Close (Esc)" type="button" class="mfp-close">×</button>

            </div>

            <!-- End .container -->

        </div>

        <!-- End .top-notice -->



        <header class="header">

            <div class="header-top">

                <div class="container">

                    <div class="d-flex justify-content-between w-100">

                        <div class="header-left w-50">

                            <ul class="mb-0">

                                <li><a href="{{ route('login') }}"><i class="icon-user-2"></i> Se connecter</a></li>

                            </ul>

                        </div>

                        <div

                            class="header-right header-dropdowns ml-0 ml-sm-auto w-sm-100 w-50 text-right justify-content-end">





                            <!-- Socials -->



                            <div class="social-icons">

                                <a href="https://www.facebook.com/Ocasebebe"

                                    class="social-icon social-facebook icon-facebook" target="_blank"></a>

                                <a href="https://www.instagram.com/ocase_bebe_dakar/"

                                    class="social-icon social-twitter icon-twitter" target="_blank"></a>

                                <a href="https://twitter.com/bebeocase"

                                    class="social-icon social-instagram icon-instagram" target="_blank"></a>

                            </div>

                            <!-- End .social-icons -->

                        </div>

                    </div>



                    <!-- End .header-left -->





                    <!-- End .header-right -->

                </div>

                <!-- End .container -->

            </div>

            <!-- End .header-top -->



            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">

                <div class="container">

                    <div class="header-left col-lg-2 w-auto pl-0">

                        <button class="mobile-menu-toggler text-primary mr-2" type="button">

                            <i class="fas fa-bars"></i>

                        </button>

                        <a href="{{ route('home') }}" class="logo">

                            <img src="{{ asset('assets/images/logo.png') }}" width="90" height="44"

                                alt="Porto Logo">

                        </a>

                    </div>

                    <!-- End .header-left -->



                    <div class="header-right w-lg-max">

                        <div

                            class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">

                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>

                            <form action="{{ route('search') }}" method="GET">

                                <div class="header-search-wrapper">

                                    <input type="search" class="form-control" name="q" id="q"

                                        placeholder="Rechercher un article, une catégorie" required>



                                    <!-- End .select-custom -->

                                    <button class="btn icon-magnifier p-0" title="search" type="submit"> Recherche

                                    </button>

                                </div>

                                <!-- End .header-search-wrapper -->

                            </form>

                        </div>

                        <!-- End .header-search -->



                        <a href="{{ route('wishlist') }}" class="header-icon" title="wishlist"><i

                                class="icon-wishlist-2"></i></a>



                        <div class="dropdown cart-dropdown">

                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle"

                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"

                                data-display="static">

                                <i class="minicart-icon"></i>

                                <span class="cart-count badge-circle">{{ getcartcount() }}</span>

                            </a>



                            <div class="cart-overlay"></div>



                            <div class="dropdown-menu mobile-cart">

                                <a href="#" title="Close (Esc)" class="btn-close">×</a>



                                <div class="dropdownmenu-wrapper custom-scrollbar">

                                    <div class="dropdown-cart-header">Shopping Cart</div>

                                    <!-- End .dropdown-cart-header -->

                                    @php

                                        $cart_products = getcartproducts();

                                    @endphp





                                    <div class="dropdown-cart-products">

                                        @foreach ($cart_products as $cart_product)

                                            <div class="product">

                                                <div class="product-details">

                                                    <h4 class="product-title">

                                                        <a href="{{ route('product.details', $cart_product->product->id) }}">

                                                            {{ $cart_product->product->product_name }}

                                                    </h4>



                                                    <span class="cart-product-info">

                                                        <span

                                                            class="cart-product-qty">{{ $cart_product->quantity }}</span>

                                                        ×

                                                        @if ($cart_product->product->discount_price == null)

                                                            {{ $cart_product->product->price }}

                                                        @else

                                                            {{ $cart_product->product->discount_price }}

                                                        @endif

                                                    </span>

                                                </div>

                                                <!-- End .product-details -->



                                                <figure class="product-image-container">

                                                    <a href="#" class="product-image">

                                                        <img src="{{ asset('products/' . $cart_product->product->image) }}"

                                                            alt="product" width="80" height="80">

                                                    </a>



                                                    <a href="#" onclick="delete_Item({{ $cart_product->id }})"

                                                        class="btn-remove" title="Remove Product"><span>×</span></a>

                                                </figure>

                                            </div>

                                        @endforeach

                                        <!-- End .product -->

                                        <!-- End .product -->

                                    </div>

                                    <!-- End .cart-product -->



                                    <div class="dropdown-cart-total">

                                        <span>SUBTOTAL:</span>



                                        <span class="cart-total-price float-right">${{ getcarttotal() }}</span>

                                    </div>

                                    <!-- End .dropdown-cart-total -->



                                    <div class="dropdown-cart-action">

                                        <a href="{{ route('cart') }}" class="btn btn-dark btn-block">Checkout</a>

                                    </div>

                                    <!-- End .dropdown-cart-total -->

                                </div>

                                <!-- End .dropdownmenu-wrapper -->

                            </div>

                            <!-- End .dropdown-menu -->

                        </div>

                        <!-- End .dropdown -->

                    </div>

                    <!-- End .header-right -->

                </div>

                <!-- End .container -->

            </div>

            <!-- End .header-middle -->

            @php

                $categories = getallcategories();

                $categories_id = [];

                foreach ($categories as $category) {

                    $categories_id[$category->id] = $category->parent_category_name;

                }



            @endphp



            <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">

                <div class="container">

                    <nav class="main-nav w-100">

                        <ul class="menu">

                            <li class="active">

                                <a href="{{ url('/filter') }}">Tous nos articles</a>

                            </li>

                            <li>

                                <a href="#">Puériculture</a>

                                <ul>

                                    <li><a href="{{ route('category', 1) }}">{{ $categories_id[1] }}</a></li>

                                    <li><a href="{{ route('category', 2) }}">{{ $categories_id[2] }}</a></li>

                                    <li><a href="{{ route('category', 3) }}">{{ $categories_id[3] }}</a></li>

                                    <li><a href="{{ route('category', 4) }}">{{ $categories_id[4] }}</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="#">Vêtement</a>

                                <ul>

                                    <li><a href="{{ route('category', 6) }}">{{ $categories_id[6] }}</a></li>

                                    <li><a href="{{ route('category', 7) }}">{{ $categories_id[7] }}</a></li>

                                    <li><a href="{{ route('category', 8) }}">{{ $categories_id[8] }}</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="#">Chaussures</a>

                                <ul>

                                    <li><a href="{{ route('category', 9) }}">{{ $categories_id[9] }}</a></li>

                                    <li><a href="{{ route('category', 10) }}">{{ $categories_id[10] }}</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="#">Repas Bébé</a>

                                <ul>

                                    <li><a href="{{ route('category', 11) }}">{{ $categories_id[11] }}</a></li>

                                    <li><a href="{{ route('category', 12) }}">{{ $categories_id[12] }}</a></li>

                                    <li><a href="{{ route('category', 13) }}">{{ $categories_id[13] }}</a></li>

                                    <li><a href="{{ route('category', 14) }}">{{ $categories_id[14] }}</a></li>

                                    <li><a href="{{ route('category', 15) }}">{{ $categories_id[15] }}</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="#">Hygiènes et soins</a>

                                <ul>

                                    <li><a href="{{ route('category', 16) }}">{{ $categories_id[16] }}</a></li>

                                    <li><a href="{{ route('category', 17) }}">{{ $categories_id[17] }}</a></li>

                                    <li><a href="{{ route('category', 18) }}">{{ $categories_id[18] }}</a></li>

                                    <li><a href="{{ route('category', 19) }}">{{ $categories_id[19] }}</a></li>

                                    <li><a href="{{ route('category', 20) }}">{{ $categories_id[20] }}</a></li>

                                    <li><a href="{{ route('category', 21) }}">{{ $categories_id[21] }}</a></li>

                                    <li><a href="{{ route('category', 22) }}">{{ $categories_id[22] }}</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="#">Jouet et Cadeaux</a>

                                <ul>

                                    <li><a href="{{ route('category', 23) }}">{{ $categories_id[23] }}</a></li>

                                    <li><a href="{{ route('category', 24) }}">{{ $categories_id[24] }}</a></li>

                                    <li><a href="{{ route('category', 25) }}">{{ $categories_id[25] }}</a></li>

                                    <li><a href="{{ route('category', 26) }}">{{ $categories_id[26] }}</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="#">Univers Maman</a>

                                <ul>

                                    <li><a href="{{ route('category', 27) }}">{{ $categories_id[27] }}</a></li>

                                    <li><a href="{{ route('category', 28) }}">{{ $categories_id[28] }}</a></li>

                                    <li><a href="{{ route('category', 29) }}">{{ $categories_id[29] }}</a></li>

                                    <li><a href="{{ route('category', 30) }}">{{ $categories_id[30] }}</a></li>

                                    <li><a href="{{ route('category', 31) }}">{{ $categories_id[31] }}</a></li>

                                </ul>

                            </li>

                            <li>

                                <a href="{{ route('category', 32) }}">{{ $categories_id[32] }}</a>

                            </li>



                        </ul>

                    </nav>

                </div>

                <!-- End .container -->

            </div>

            <!-- End .header-bottom -->

        </header>

        <!-- End .header -->

