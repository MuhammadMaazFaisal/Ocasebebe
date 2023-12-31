<footer class="footer bg-light">

    <div class="footer-middle">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-sm-6">

                    <div class="widget">

                        <h4 class="widget-title">QUI SOMMES NOUS ?</h4>

                        <p>

                            Ô’CASE BÉBÉ DAKAR est un magasin où vous pourrez tout trouver pour votre bébé : lit bébé,

                            poussettes, berceaux, siège auto, tire-lait, stérilisateur, biberons, vêtements et tous les

                            produit de puériculture. Notre showroom se trouve à Dakar précisément aux 2 voies Liberté 6

                            en face de la Mosquée ABASS SALL, côte à côte de CORIS BANK.

                        </p>

                        <h4 class="widget-title">HORAIRE D’OUVERTURE</h4>

                        <p class="mb-0">Lundi au Samedi.... 09h00 à 20h00</p>

                        <p>Dimanche. de 10h00 à 20h00</p>

                    </div>

                    <!-- End .widget -->

                </div>

                <!-- End .col-lg-3 -->



                <div class="col-lg-4 col-sm-6">

                    <div class="widget mx-5">

                        <h4 class="widget-title">INFORMATIONS LÉGALES</h4>

                        <ul class="links">

                            <li><a href="{{ route('who-we-are') }}">Pourquoi nous choisir </a></li>

                            <li><a href="{{ route('contact') }}">Contactez-nous</a></li>

                            <li><a href="{{ route('terms-and-conditions') }}">Condition général d'utilisation</a></li>

                            <li><a href="{{ route('payment-terms') }}">Modalité de paiement</a></li>

                            <li><a href="{{ route('delivery-policy') }}">Politique de livraison</a></li>

                            <li><a href="{{ route('faq') }}">FAQ</a></li>

                        </ul>

                        <h4 class="widget-title">RETROUVEZ-NOUS SUR</h4>

                        <div class="social-icons">

                            <a href="https://www.facebook.com/Ocasebebe"

                                class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>

                            <a href="https://twitter.com/bebeocase" class="social-icon social-twitter icon-twitter"

                                target="_blank" title="Twitter"></a>

                            <a href="https://www.instagram.com/ocase_bebe_dakar/"

                                class="social-icon social-instagram icon-instagram" target="_blank"

                                title="Instagram"></a>

                        </div>

                    </div>

                    <!-- End .widget -->

                </div>

                <!-- End .col-lg-3 -->



                <div class="col-lg-4 col-sm-6">

                    <div class="widget">

                        <h4 class="widget-title">SERVICE CLIENT</h4>



                        <ul class="contact-info">

                            <li>

                                <i class="fab fa-whatsapp"></i> <span style="font-weight:700l"><a

                                        href="tel:+221773908583">+221 77 390 85 83</a></span>

                            </li>

                            <li>

                                <i class="fab fa-whatsapp"></i> <span style="font-weight:700l"><a

                                        href="tel:+221772000839">+221 77 200 08 39</a></span>

                            </li>

                            <li>

                                <i class="fab fa-whatsapp"></i> <span style="font-weight:700l"><a

                                        href="tel:+221777306666">+221 77 730 66 66</a></span>

                            </li>

                            <li>

                                <i class="fab fa-whatsapp"></i> <span style="font-weight:700l"><a

                                        href="tel:+221763160539">+221 76 316 05 39</a></span>

                            </li>

                        </ul>

                        <h4 class="widget-title">SERVICE CLIENT</h4>

                        <p class="mb-0">2 voies camp pénal liberté 6 en face de la mosquée Abass Sall Dakar. </p>

                        <p>Cité keur Gorgui en face Auchan près de CBAO.</p>

                    </div>

                    <!-- End .widget -->

                </div>

                <!-- End .col-lg-3 -->

            </div>

            <!-- End .row -->

        </div>

        <!-- End .container -->

    </div>

    <!-- End .footer-middle -->



    <div class="container">

        <div class="footer-bottom">

            <div class="container">

                <div class="footer-left text-center">

                    <span class="footer-copyright">© 2021 Ô’CASE BÉBÉ DAKAR - Tous doits réservés.</span>

                </div>

            </div>

        </div>

        <!-- End .footer-bottom -->

    </div>

    <!-- End .container -->

</footer>

<!-- End .footer -->

</div>

<!-- End .page-wrapper -->



<div class="loading-overlay">

    <div class="bounce-loader">

        <div class="bounce1"></div>

        <div class="bounce2"></div>

        <div class="bounce3"></div>

    </div>

</div>



<div class="mobile-menu-overlay"></div>

<!-- End .mobil-menu-overlay -->



<div class="mobile-menu-container">

    <div class="mobile-menu-wrapper">

        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>


            @php

                $categories = getallcategories();

                $categories_id = [];

                foreach ($categories as $category) {

                    $categories_id[$category->id] = $category->parent_category_name;

                }



            @endphp
        <nav class="mobile-nav">

            <ul class="mobile-menu">

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



            <ul class="mobile-menu">

                <li><a href="{{ route('contact') }}">Contact Us</a></li>

                <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>

                <li><a href="{{ route('cart') }}">Cart</a></li>

                <li><a href="{{ route('login') }}" class="login-link">Log In</a></li>

            </ul>

        </nav>

        <!-- End .mobile-nav -->



        <form class="search-wrapper mb-2" action="{{ route('search') }}" method="GET">

            <input type="search" name="q" id="q" class="form-control mb-0" placeholder="Search..." required />

            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>

        </form>



        <div class="social-icons">

            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">

            </a>

            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">

            </a>

            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">

            </a>

        </div>

    </div>

    <!-- End .mobile-menu-wrapper -->

</div>

<!-- End .mobile-menu-container -->



<div class="sticky-navbar">

    <div class="sticky-info">

        <a href="{{ url('/') }}">

            <i class="icon-home"></i>Home

        </a>

    </div>

    <div class="sticky-info">

        <a href="{{ url('/filter') }}">

            <i class="icon-bars"></i>Categories

        </a>

    </div>

    <div class="sticky-info">

        <a href="{{ route('wishlist') }}">

            <i class="icon-wishlist-2"></i>Wishlist

        </a>

    </div>

    <div class="sticky-info">

        <a href="{{ route('login') }}">

            <i class="icon-user-2"></i> Se connecter

        </a>

    </div>

    <div class="sticky-info">

        <a href="{{ route('cart') }}">

            <i class="icon-shopping-cart position-relative">

                <span class="cart-count badge-circle">{{ getcartcount() }}</span>

            </i>Cart

        </a>

    </div>

</div>



<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>



<!-- Plugins JS File -->

<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/js/optional/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins.min.js') }}"></script>

<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"

    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="

    crossorigin="anonymous" referrerpolicy="no-referrer"></script>





<!-- Main JS File -->

<script src="{{ asset('assets/js/main.min.js') }}"></script>



<script>

    function addWishlistItem(product_id) {

        $.ajax({

            url: "{{ route('add_wishlist') }}",

            type: "GET",

            data: {

                _token: '{{ csrf_token() }}',

                id: product_id,

            },

            success: function(response) {

                if (response.status == 200) {

                    swal({

                        title: "Success!",

                        text: response.message,

                        icon: "success",

                        button: "OK",

                    }).then(function() {

                        location.reload();

                    });

                } else {

                    swal({

                        title: "Error!",

                        text: response.message,

                        icon: "error",

                        button: "OK",

                    }).then(function() {

                        location.reload();

                    });

                }

            }

        });

    }



    $("#add-btn").on("click", function() {



        var stock_count = $("#stock_count")[0].innerText;

        var quantity = $(".horizontal-quantity")[0].value;

        stock_count = parseInt(stock_count);

        quantity = parseInt(quantity);



        if (quantity > stock_count) {



            swal({

                title: "Error!",

                text: "This much quantity is not available",

                icon: "error",

                button: "OK",

            }).then(function() {

                location.reload();

            });

        } else {



            let color_ul = document.querySelector('.config-color-list');

            var color = '';

            if (color_ul) {

                for (let i = 0; i < color_ul.children.length; i++) {

                    if (color_ul.children[i].classList.contains('active')) {

                        color = color_ul.children[i].getAttribute('data-id');

                    }

                }

            }

            let length_ul = document.querySelector('.config-lengths');

            var length = '';

            if (length_ul) {

                for (let i = 0; i < length_ul.children.length; i++) {

                    if (length_ul.children[i].classList.contains('active')) {

                        length = length_ul.children[i].getAttribute('data-id');

                    }

                }

            }

            var quantity = $(".horizontal-quantity")[0].value;

            var product_id =

                @if (isset($product))

                    "{{ $product->id }}"

                @else

                    0

                @endif ;



            $.ajax({

                url: "{{ route('add_to_cart') }}",

                type: "POST",

                data: {

                    _token: '{{ csrf_token() }}',

                    id: product_id,

                    quantity: quantity,

                    color_id: color,

                    length: length

                },



                success: function(response) {

                    if (response.status == 403) {

                        swal({

                            title: "Warning!",

                            text: response.message,

                            icon: "warning",

                            button: "OK",

                        }).then(function() {

                            window.location.href = "{{ route('login') }}";

                        });

                    }



                    if (response.status == 501) {

                        swal({

                            title: "Warning!",

                            text: response.message,

                            icon: "warning",

                            button: "OK",

                        }).then(function() {

                            window.location.href = "{{ route('login') }}";

                        });

                    }



                    if (response.status == 200) {

                        swal({

                            title: "Success!",

                            text: response.message,

                            icon: "success",

                            button: "OK",

                        }).then(function() {

                            location.reload();

                        });



                    } else {

                        swal({

                            title: "Cart",

                            text: response.message,

                            icon: "error",

                            button: "OK",

                        }).then(function() {

                            location.reload();

                        });

                    }

                }

            });

        }

    });





    function delete_Item(cart_id) {

        $.ajax({

            url: "{{ route('remove_cart_item') }}",

            type: "GET",

            data: {

                _token: '{{ csrf_token() }}',

                cart_id: cart_id,

            },

            success: function(response) {



                if (response.status == 200) {

                    swal({

                        title: "Success!",

                        text: response.message,

                        icon: "success",

                        button: "OK",

                    }).then(function() {

                        location.reload();

                    });



                } else {

                    swal({

                        title: "Error!",

                        text: "Something went wrong",

                        icon: "error",

                        button: "OK",

                    });

                }

            }

        });



    }

    @if (session('status'))

        swal({

            title: "{{ session('status') }}",

            text: "{{ session('message') }}",

            icon: "{{ session('status') }}",

            button: "OK",

        });
    
    @endif

</script>












</body>



</html>

