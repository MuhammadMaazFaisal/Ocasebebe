@include('layouts.head')
@include('layouts.navbar')
<style>
    .bg-color {
        background-color: #f38181;
    }

    /* Common styles for both widgets */
    .color-btn1 label {
        display: block;
        position: relative;
        border-radius: 3px;
    }

    .size-btn1 label {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        font-weight: 600;
        background-color: lightgrey;
        border-radius: 3px;
    }

    /* Color widget */
    .color-btn1 input[type="checkbox"]:checked+label::before {
        content: '✔';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-weight: bold;
    }

    /* Size widget */
    .size-btn1 input[type="checkbox"]:checked+label {
        background-color: #f38181;
    }

    /* Hide default checkbox */
    .cat-list .cat-sublist input[type="checkbox"] {
        display: none;
    }

    /* Style the label with a pseudo element for the tick mark */
    .cat-list .cat-sublist input[type="checkbox"]+label::after {
        content: "";
        display: none;
        width: 11px;
        height: 11px;
        border: 1px solid #000;
        margin-left: 5px;
        vertical-align: middle;
    }

    /* Display the tick mark when checked */
    .cat-list .cat-sublist input[type="checkbox"]:checked+label::after {
        display: inline-block;
        content: "✔";
        text-align: center;
        line-height: 10px;
        font-size: 10px;
        color: green;
        border-radius: 2px;
    }

    .single-li input[type="checkbox"]:checked+label::after {
        display: inline-block;
        content: "✔";
        text-align: center;
        line-height: 10px;
        font-size: 10px;
        color: green;
        border-radius: 2px;
    }

    .single-li input[type="checkbox"] {
        display: none;
    }

    .single-li input[type="checkbox"]+label::after {
        content: "";
        display: none;
        width: 11px;
        height: 11px;
        border: 1px solid #000;
        margin-left: 5px;
        vertical-align: middle;
    }

</style>

<main class="main">
    <div class="category-banner-container bg-gray">
        <div class="category-banner banner text-uppercase" style="background: no-repeat 60%/cover url('{{asset('assets/images/demoes/demo4/slider/slide-3.jpg')}}');">
            <div class="container position-relative">
                <div class="row">
                    <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                        <h3>Electronic<br>Deals</h3>
                        <a href="category.html" class="btn btn-dark">Get Yours!</a>
                    </div>
                    <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                        <div class="coupon-sale-content">
                            <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON
                            </h4>
                            <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b> OFF</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Men</a></li>
                <li class="breadcrumb-item active" aria-current="page">Accessories</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9 main-content">
                {{-- <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle">
                            <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>

                            <div class="select-custom">
                                <select name="orderby" class="form-control">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->


                        </div>
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item layout-modes">
                            <a href="shop.html" class="layout-btn btn-grid active" title="Grid">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="#" class="layout-btn btn-list" title="List">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div>
                    <!-- End .toolbox-right -->
                </nav> --}}

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-6 col-sm-4">
                        <div class="product-default">
                            <figure>
                                <a href="product.html">
                                    <img src="{{asset('products/'.$product->image)}}" width="280" height="280" alt="product" />
                                    <img src="{{asset('products/'.$product->image)}}" width="280" height="280" alt="product" />
                                </a>

                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">{{($product->discount_price*100)/$product->price}}%</div>
                                </div>
                            </figure>

                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <span class="product-category">{{$product->category_name}}</span>
                                    </div>
                                </div>

                                <h3 class="product-title"> <a href="{{route('product.details',$product->id)}}">{{$product->product_name}}</a></h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:{{$product->avg_rating *20}}%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    @if($product->discount_price)
                                    <span class="old-price">{{$product->price}} CFA</span>
                                    <span class="product-price">{{$product->discount_price}} CFA</span>
                                    @else
                                    <span class="product-price">{{$product->price}} CFA</span>
                                    @endif
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="{{route('add_wishlist',$product->id)}}" onclick="addWishlistItem({{$product->id}})" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                    <a href="{{route('product.details',$product->id)}}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="{{route('product.details',$product->id)}}" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    @endforeach
                    <!-- End .col-sm-4 -->

                </div>
                <!-- End .row -->

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="12">12</option>
                                <option value="24">24</option>
                                <option value="36">36</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div>
                    <!-- End .toolbox-item -->

                    <ul class="pagination toolbox-item">
                        <li class="page-item disabled">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><span class="page-link">...</span></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <form action="{{route('filter')}}" method="GET">
                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list">
                                        <li>
                                            <a href="#widget-category-1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="widget-category-1">
                                                Puériculture
                                                <span class="toggle"></span>
                                            </a>
                                            <div class="collapse show" id="widget-category-1">
                                                <ul class="cat-sublist">
                                                    <li><input type="checkbox" id="cat_1" name="categories[]" value=1><label for="cat_1">Balancelles</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_2" name="categories[]" value=2><label for="cat_2">Berceau </label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_3" name="categories[]" value=3><label for="cat_3">Siège auto & Poussette </label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_4" name="categories[]" value=4> <label for="cat_4">Transats</label>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#widget-category-2" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-2">
                                                Vêtement
                                                <span class="toggle"></span>
                                            </a>
                                            <div class="collapse" id="widget-category-2">
                                                <ul class="cat-sublist">
                                                    <li><input type="checkbox" id="cat_6" name="categories[]" value=6><label for="cat_6">Vêtement fille</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_7" name="categories[]" value=7> <label for="cat_7">Vêtement garçon</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_7" name="categories[]" value=8><label for="cat_8">Bonnet chaussette</label>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#widget-category-3" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-3">
                                                Chaussures
                                                <span class="toggle"></span>
                                            </a>
                                            <div class="collapse" id="widget-category-3">
                                                <ul class="cat-sublist">
                                                    <li><input type="checkbox" id="cat_9" name="categories[]" value=9> <label for="cat_9">Chaussure fille</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_10" name="categories[]" value=10> <label for="cat_10">Chaussure garçon</label>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#widget-category-4" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-4">
                                                Repas Bébé
                                                <span class="toggle"></span>
                                            </a>
                                            <div class="collapse" id="widget-category-4">
                                                <ul class="cat-sublist">
                                                    <li><input type="checkbox" id="cat_11" name="categories[]" value=11> <label for="cat_11">Bavoirs</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_12" name="categories[]" value=12> <label for="cat_12">Biberons et accessoires</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_13" name="categories[]" value=13> <label for="cat_13">Chaises Hautes</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_14" name="categories[]" value=14> <label for="cat_13">Sucettes</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_15" name="categories[]" value=15> <label for="cat_15">Stérilisateurs</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#widget-category-5" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-5">
                                                Hygiènes et soins
                                                <span class="toggle"></span>
                                            </a>
                                            <div class="collapse" id="widget-category-5">
                                                <ul class="cat-sublist">
                                                    <li><input type="checkbox" id="cat_16" name="categories[]" value=16> <label for="cat_16">Couches</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_17" name="categories[]" value=17> <label for="cat_17">Lingettes</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_18" name="categories[]" value=18> <label for="cat_18">Matelas et Table à Langer</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_19" name="categories[]" value=19> <label for="cat_19">Sacs à langer</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_20" name="categories[]" value=20> <label for="cat_20">Soins de la peau</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_21" name="categories[]" value=21> <label for="cat_21">Baignoires</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_22" name="categories[]" value=22> <label for="cat_22">Pots et Réducteurs</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#widget-category-6" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-6">
                                                Jouet et Cadeaux
                                                <span class="toggle"></span>
                                            </a>
                                            <div class="collapse" id="widget-category-6">
                                                <ul class="cat-sublist">
                                                    <li><input type="checkbox" id="cat_23" name="categories[]" value=23> <label for="cat_23">Cadeaux de naissance </label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_24" name="categories[]" value=24> <label for="cat_24">Doudous et Peluches</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_25" name="categories[]" value=25> <label for="cat_25">Tapis d’éveil</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_26" name="categories[]" value=26> <label for="cat_26">Youpalas</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#widget-category-7" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-7">
                                                Univers Maman
                                                <span class="toggle"></span>
                                            </a>
                                            <div class="collapse" id="widget-category-7">
                                                <ul class="cat-sublist">
                                                    <li><input type="checkbox" id="cat_27" name="categories[]" value=27><label for="cat_27">Accessoires bébés</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_28" name="categories[]" value=28> <label for="cat_28">Portes Bébé</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_29" name="categories[]" value=29> <label for="cat_29">Slip jetable</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_30" name="categories[]" value=30><label for="cat_30">erviette maternité</label>
                                                    </li>
                                                    <li><input type="checkbox" id="cat_31" name="categories[]" value=31><label for="cat_31">BTire-lait</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="single-li"><input type="checkbox" id="cat_5" name="categories[]" value=5> <label for="cat_5">Tous nos articles</label>
                                        </li>
                                        <li class="single-li"><input type="checkbox" id="cat_32" name="categories[]" value=32><label for="cat_32">Plus</label>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .collapse -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                            </h3>

                            <div class="collapse show" id="widget-body-3">
                                <div class="widget-body pb-0">
                                    <form action="#">
                                        <div class="price-slider-wrapper">
                                            <div id="price-slider"></div>
                                            <!-- End #price-slider -->
                                        </div>
                                        <!-- End .price-slider-wrapper -->

                                        <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="filter-price-text">
                                                Price:
                                                <span id="filter-price-range"></span>
                                            </div>
                                            <!-- End .filter-price-text -->


                                        </div>
                                        <!-- End .filter-price-action -->
                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .collapse -->
                        </div>

                        <!-- Color Section -->
                        <div class="widget widget-color">
                            <h3 class="widget-title">Color</h3>
                            <div class="widget-body pb-0">
                                <ul class="config-swatch-list">
                                    @foreach($attributes as $attribute)
                                    <li class="color-btn1" data-id="{{$attribute->id}}">
                                        <input type="checkbox" name="colors[]" value="{{ $attribute->id }}" id="color-{{ $attribute->id }}" style="display:none;">
                                        <label for="color-{{ $attribute->id }}" style="background-color: {{$attribute->color_code}};height:20px;width:20px;margin-left:7px;margin-right:7px"></label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="widget widget-size">
                            <h3 class="widget-title">Sizes</h3>
                            <div class="widget-body pb-0">
                                <ul class="config-size-list">
                                    @foreach($lengths as $length)
                                    <li class="size-btn1" data-id="{{$length->id}}">
                                        <input type="checkbox" name="sizes[]" value="{{ $length->id }}" id="size-{{ $length->id }}" style="display:none;">
                                        <label for="size-{{ $length->id }}" style="height:22px;width:22px;margin-left:7px;margin-right:7px">{{ $length->name }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End .widget -->
                        <div class="container my-3 d-flex" style="
                            justify-content: center;
                            padding: 10px 52px;
                        ">
                            <button type="submit" class="px-5 btn btn-primary">Filter</button>
                        </div>
                        <input type="hidden" name="min_price" id="min_price" value="">
                        <input type="hidden" name="max_price" id="max_price" value="">
                    </form>



                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured</h3>

                        <div class="widget-body">
                            <div class="owl-carousel widget-featured-products">
                                <div class="featured-col">
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="assets/images/products/small/bp1.png" width="75" height="75" alt="product" />
                                                <img src="assets/images/products/small/bp1.png" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Blue Backpack for
                                                    the Young - S</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
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
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="assets/images/products/small/bp2.png" width="75" height="75" alt="product" />
                                                <img src="assets/images/products/small/bp2.png" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Casual Spring Blue
                                                    Shoes</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
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
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="assets/images/products/small/bp3.png" width="75" height="75" alt="product" />
                                                <img src="assets/images/products/small/bp3.png" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Men Black Gentle
                                                    Belt</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
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
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .featured-col -->

                                <div class="featured-col">
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="assets/images/products/small/bp4.png" width="75" height="75" alt="product" />
                                                <img src="assets/images/products/small/bp4.png" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Ultimate 3D
                                                    Bluetooth Speaker</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
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
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="assets/images/products/small/bp5.png" width="75" height="75" alt="product" />
                                                <img src="assets/images/products/small/bp5.png" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Brown Women Casual
                                                    HandBag</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
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
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="product.html">
                                                <img src="assets/images/products/small/bp6.png" width="75" height="75" alt="product" />
                                                <img src="assets/images/products/small/bp6.png" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">Circled Ultimate
                                                    3D Speaker</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
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
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .featured-col -->
                            </div>
                            <!-- End .widget-featured-slider -->
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-block">
                        <h3 class="widget-title">Custom HTML Block</h3>
                        <h5>This is a custom sub-title.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus </p>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .sidebar-wrapper -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
    <!-- margin -->
</main>
<!-- End .main -->
@include('layouts.footer')
<script>
    var color = document.querySelectorAll('.color-btn');
    for (let i = 0; i < color.length; i++) {
        color[i].addEventListener('click', function(e) {
            e.preventDefault();
            color.forEach(function(e) {
                e.classList.remove('active');
            })
            color[i].classList.toggle('active');
        })
    }
    var size = document.querySelectorAll('.size-btn');
    for (let i = 0; i < size.length; i++) {
        size[i].addEventListener('click', function(e) {
            e.preventDefault();
            size.forEach(function(e) {
                e.classList.remove('active');
            })
            size[i].classList.toggle('active');
            size[i].classList.add('bg-color');
        })
    }
    // call when price change
    function filter() {
        var price_range = $('#filter-price-range').text();
        var starting_price = price_range.split('-')[0];
        var ending_price = price_range.split('-')[1];
        starting_price = starting_price.replace('CFA', '');
        ending_price = ending_price.replace('CFA', '');
        starting_price = parseInt(starting_price);
        ending_price = parseInt(ending_price);
        $('#min_price').val(starting_price);
        $('#max_price').val(ending_price);
    }
    var observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            filter();
        });
    });

    // Configuration of the observer
    var config = {
        attributes: true
        , childList: true
        , subtree: true
    };

    // Pass in the target node and observer config
    observer.observe(document.getElementById('filter-price-range'), config);

    document.addEventListener('DOMContentLoaded', function() {
        // Function to get URL parameters
        function getUrlParameters() {
            var parameters = location.search.replace(/%5B%5D/g, '').substring(1).split('&');
            var categories = [];
            var colors = [];
            var sizes = [];
            var min_price = "";
            var max_price = "";

            for (var i = 0; i < parameters.length; i++) {
                var pair = parameters[i].split('=');
                var key = pair[0];
                var value = decodeURIComponent(pair[1] || '');

                switch (key) {
                    case "categories":
                        categories.push(value);
                        break;
                    case "colors":
                        colors.push(value);
                        break;
                    case "sizes":
                        sizes.push(value);
                        break;
                    case "min_price":
                        min_price = value;
                        break;
                    case "max_price":
                        max_price = value;
                        break;
                }
            }

            return {
                categories: categories
                , colors: colors
                , sizes: sizes
                , min_price: min_price
                , max_price: max_price
            };
        }

        // Usage
        var params = getUrlParameters();
        console.log(params.categories);
        console.log(params.colors);
        console.log(params.sizes);
        console.log(params.min_price);
        console.log(params.max_price);


        for (var i = 0; i < params.categories.length; i++) {
            var category = params.categories[i];
            var id="cat_" + category;
            var checkbox = document.getElementById('cat_' + category);
            checkbox.checked = true;
        }
        for (var i = 0; i < params.colors.length; i++) {
            var color = params.colors[i];
            var id="color-" + color;
            var checkbox = document.getElementById('color-' + color);
            checkbox.checked = true;
        }
        for (var i = 0; i < params.sizes.length; i++) {
            var size = params.sizes[i];
            var id="size-" + size;
            var checkbox = document.getElementById('size-' + size);
            checkbox.checked = true;
        }

    });

</script>
