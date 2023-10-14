<?php

use App\Models\Cart;
use App\Models\Admin\Product;
use App\Models\Admin\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

function getcartproducts()
{
    if (Auth::check()) {
        $user_id = Auth::user()->id;
        $cart_products = Cart::with('product')->where('user_id', $user_id)->get();
        return $cart_products;
    } else {
        return [];
    }
}

function getcarttotal()
{
    if (!Auth::check()) {
        return 0;
    }
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
    if (!Auth::check()) {
        return 0;
    }
    $user_id = Auth::user()->id;
    $cart_products = Cart::with('product')->where('user_id', $user_id)->get();
    return count($cart_products);
}

function getearnings(){
    $order=Order::all();
    $total=0;
    foreach($order as $orders){
        $total+=$orders->total;
    }
    return $total;
}

function gettotalproducts(){
    $product=Product::all()->where('status',1);
    return count($product);
}

function gettotalorders(){
    $order=Order::all();
    return count($order);
}

function gettotalusers(){
    $user=User::all()->where('role',2);
    return count($user);
}