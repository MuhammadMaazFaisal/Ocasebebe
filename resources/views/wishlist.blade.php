@include('layouts.head')
@include('layouts.navbar')

<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Wishlist
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>Wishlist</h1>
        </div>
    </div>

    <div class="container">
        <div class="wishlist-title">
            <h2 class="p-2">My wishlist</h2>
        </div>
        <div class="wishlist-table-container">
            <table class="table table-wishlist mb-0">
                <thead>
                    <tr>
                        <th class="thumbnail-col"></th>
                        <th class="product-col">Product</th>
                        <th class="price-col">Price</th>
                        <th class="action-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wishlist_items as $wishlist_item)
                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{ route('product.details', $wishlist_item->product->id) }}"
                                        class="product-image">
                                        <img src="{{ asset('products/' . $wishlist_item->product->image) }}"
                                            alt="product">
                                    </a>

                                    <a href="{{ route('remove_wishlist', $wishlist_item->product->id) }}"
                                        class="btn-remove icon-cancel" title="Remove Product"></a>
                                </figure>
                            </td>
                            <td>
                                <h5 class="product-title">
                                    <a
                                        href="{{ route('product.details', $wishlist_item->product->id) }}">{{ $wishlist_item->product->product_name }}</a>
                                </h5>
                            </td>
                            <td class="price-box">
                                @if ($wishlist_item->product->discount_price)
                                    <span class="old-price">{{ $wishlist_item->product->price }} CFA</span>
                                    <span class="product-price">{{ $wishlist_item->product->discount_price }} CFA</span>
                                @else
                                    <span class="product-price">{{ $wishlist_item->product->price }}</span>
                                @endif
                            <td class="action">
                                <button class="btn btn-dark product-type-simple btn-shop">
                                    <a href="{{ route('product.details', $wishlist_item->product->id) }}"> View
                                        Product</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- End .cart-table-container -->
    </div><!-- End .container -->
</main><!-- End .main -->

@include('layouts.footer')
