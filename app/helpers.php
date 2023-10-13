<?php

use App\Models\Cart;
use App\Models\Admin\Product;
use Illuminate\Support\Facades\Auth;

function getcartproducts()
{
    $user_id = Auth::user()->id;
    $cart_products = Cart::with('product')->where('user_id', $user_id)->get();
    return $cart_products;
}

function getcarttotal()
{
    $user_id = Auth::user()->id;
    $cart_products = Cart::with('product')->where('user_id', $user_id)->get();
    $total = 0;
    foreach ($cart_products as $cart_product) {
        $total += $cart_product->product->price * $cart_product->quantity;
    }
    return $total;
}

function getcartcount()
{
    $user_id = Auth::user()->id;
    $cart_products = Cart::with('product')->where('user_id', $user_id)->get();
    return count($cart_products);
}
