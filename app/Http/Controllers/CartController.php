<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\AttributeValue;
use App\Models\Admin\Product;
use App\Models\Admin\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartController extends Controller
{

    public function add_to_cart(Request $request)
    {

        $alread_in_carts = Cart::where('user_id', Auth::id())->where('product_id', $request->id)->get();
        if (count($alread_in_carts) > 0) {
            return response()->json([
                'status' => 404,
                'message' => "Sorry!, You can't add, This item already added to cart !"
            ]);
        }
        $product = Product::find($request->id);
        if ($product->discount_price == null) {
            $price = $product->price;
        } else {
            $price = $product->discount_price;
        };
        $addcart = new Cart();
        $addcart->user_id = Auth::user()->id;
        $addcart->product_id = $request->id;
        $addcart->quantity =  $request->quantity;
        $addcart->attribute_id =  $request->color_id;
        $addcart->price =  $price;
        $addcart->length_id =  $request->length;
        $addcart->save();

        $cart_counts = Cart::where('user_id', Auth::user()->id)->count();

        $data = [
            'status' => 200,
            'message' => 'Product Added To Cart!',
            'cart_swal', true,
            'cart_counts' => $cart_counts
        ];


        return response()->json($data);
    }
    public function add_cart(Request $request)
    {
        // dd("abc");
        if (!Auth::check()) {
            $notification = array('login' => 'Please Login first !', 'alert-type' => 'success');
            return redirect()->route('user.sign_in')->with($notification);
        }
        if (Auth::user()->is_guest == 1) {
            $cart_items = Cart::where('user_id', Auth::user()->id)->with('product')->where('session', Session::getId())->get();
        } else {
            $cart_items = Cart::where('user_id', Auth::user()->id)->with('product')->get();
        }

        $total_item_in_cart = count($cart_items);
        $total_price = 0;
        $after_coupon_apply_total_price = 0;
        if (count($cart_items) > 0) {
            foreach ($cart_items as $cart_item) {
                // check discount and calculate total price
                if (!empty($cart_item->discount)) {
                    $total_price += ($cart_item->quantity * $cart_item->discounted_price);
                } else {
                    $total_price += ($cart_item->quantity * $cart_item->price);
                }
            }
        }
        $after_coupon_apply_total_price = $total_price;
        // total price
        $coupon_data = [];
        if (Session::has('coupon_data')) {
            $coupon_data = Session::get('coupon_data');
            // dd($coupon_data['after_coupon_apply_total_price']);
            $after_coupon_apply_total_price = $coupon_data['after_coupon_apply_total_price'];
        }

        // dd($coupon_data);


        return view("website.add-cart", get_defined_vars());
    }
    public function add_to_cart_old(Request $request)
    {

        $alread_in_carts = Cart::where('user_id', Auth::id())->where('product_id', $request->id)->get();
        if (count($alread_in_carts) > 0) {
            return response()->json([
                'status' => 404,
                'message' => "Sorry!, You can't add, This item already added to cart !"
            ]);
        }


        $cart = null;
        $product_id = null;
        $price = null;
        $cart = Product::where('id', $request->id)->first();


        if (Auth::check() && Auth::user()->role == 1) {
            return response()->json([
                'status' => 501,
                'message' => "Sorry! You are logged in as admin that's why you can't !"
            ]);
        }


        if (Auth::check()) {

            // check in cart if already exist
            $check_wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $request->id)->first();
            if (!empty($check_wishlist)) {
                $check_wishlist->delete();
            }


            $item_in_cart =  Cart::where('product_id', $request->id)->where('color_id', $request->color_id)->where('user_id', Auth::id())->first();
            // check product in cart if already exist
            if (empty($item_in_cart)) {
                if (!empty(Cart::where('product_id', $request->id)->where('color_id', $request->color_id)->where('user_id', Auth::id())->first())) {
                    return response()->json([
                        'status' => 404,
                        'message' => 'This item already added to cart !'
                    ]);
                }
            }


            // check quantity available or not
            if (!empty($request->quantity) && $request->quantity > $cart->quantity) {
                // return $cart->stock;

                // Out of stock
                if ($cart->quantity <= 0 || empty($cart->quantity)) {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Sorry!, Item is out of stock!'
                    ]);
                } else {

                    return response()->json([
                        'status' => 404,
                        'message' => 'Our available stock quantity is ' . $cart->quantity . ', You can buy only ' . $cart->quantity . ' or less'
                    ]);
                }
            }


            $color_id = null;
            $color_code = null;
            if ($request->color_id) {
                $color_attribute = AttributeValue::find($request->color_id);
                $color_id = $color_attribute->id;
                $color_code = $color_attribute->color_code;
            }

            $addcart = new Cart();
            $addcart->user_id = Auth::user()->id;
            $addcart->product_id = $cart->id;
            if (!empty($request->quantity)) {
                $addcart->quantity = $request->quantity;
                $addcart->price = $cart->price;
                // according to discount prices set
                if ($cart->discount_status == 1) {
                    $addcart->discount = $cart->discount;
                    $addcart->discounted_price = $cart->discounted_price;
                    $addcart->total = $cart->discounted_price * $request->quantity;
                } else {
                    $addcart->total = $cart->regular_price * $request->quantity;
                }
            }
            // check if order not exist then create order id and add it product
            // empty($order) ? $addcart->order_id = $new_order->id : $addcart->order_id = $order->id;
            $addcart->attribute =  $color_id;
            $addcart->attribute_value =  $color_code;
            $addcart->save();



            // remove Item from wishlish
            $removeItemWishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($removeItemWishlist) {
                $removeItemWishlist->delete();
            }


            $data = [
                'status' => 200,
                'message' => 'Product Added To Cart!',
                'cart_swal', true,
            ];

            // if request from whishlist
            if ($request->wishlist_request || $request->user_dashboard_request) {
                $cart_counts = Cart::where('user_id', Auth::user()->id)->count();

                $wishlist_items = Wishlist::where('user_id', Auth::user()->id)->with('product')->get();
                $total_item_in_wishlist = count($wishlist_items);
                $total_price = 0;
                $total_price_after_coupon_apply = 0;

                if (count($wishlist_items) > 0) {
                    foreach ($wishlist_items as $wishlist_item) {

                        // check discount and calculate total price
                        if (!empty($wishlist_item->discount)) {
                            $total_price += ($wishlist_item->quantity * $wishlist_item->discounted_price);
                        } else {
                            $total_price += ($wishlist_item->quantity * $wishlist_item->price);
                        }
                    }
                }

                // cart counts
                $item_count_in_cart = Cart::where('user_id', Auth::id())->count();

                if (empty($wishlist_items)) {
                    $wishlist_items = [];
                }

                $data['html'] = $request->wishlist_request ? view('website.common.wishlist-items', get_defined_vars())->render() : view('user_dashboard.wishlist', get_defined_vars())->render();
                $data['total_item_in_wishlist'] = $total_item_in_wishlist;
                $data['item_count_in_cart'] = $item_count_in_cart;
            }

            return response()->json($data);
        }



        return response()->json([
            'status' => 404,
            'message' => 'Please Login First !'
        ]);
    }


    public function quantity_cart_item(Request $request)
    {

        $product = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
        $product->quantity = $request->quantity;

        if ($product->update()) {
            $cart_items = Cart::where('user_id', Auth::id())->get();
            $total_price = 0;
            if (count($cart_items) > 0) {
                foreach ($cart_items as $cart_item) {
                    if ($cart_item->discount_price != null) {
                        $total_price += ($cart_item->quantity * $cart_item->discount_price);
                    } else {
                        $total_price += ($cart_item->quantity * $cart_item->price);
                    }
                }
            }



            return response()->json([
                'status' => 200,
                'message' => 'Quantity updated successfully !',
                'total_price' => $total_price,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Quantity not updated !',
            ]);
        }
    }

    public function remove_quantity_cart_item(Request $request)
    {


        $inside_cart = Cart::find($request->cart_id);
        $cart = Product::find($inside_cart->product_id);
        // check quantity available or not
        if (!empty($request->quantity) && $request->quantity > $cart->quantity) {
            // return $cart->stock;

            // Out of stock
            if ($cart->quantity <= 0 || empty($cart->quantity)) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Sorry!, Item is out of stock!'
                ]);
            } else {

                return response()->json([
                    'status' => 404,
                    'message' => 'Our available stock quantity is ' . $cart->quantity . ', You can buy only ' . $cart->quantity . ' or less'
                ]);
            }
        }

        $inside_cart->quantity = $request->quantity;
        $inside_cart->update();

        if (Auth::user()->is_guest == 1) {
            $cart_items = Cart::where('user_id', Auth::user()->id)->where('session', Session::getId())->with('product')->get();
        } else {
            $cart_items = Cart::where('user_id', Auth::user()->id)->with('product')->get();
        }
        $total_item_in_cart = count($cart_items);
        $total_price = 0;
        $total_price_after_coupon_apply = 0;

        if (count($cart_items) > 0) {
            foreach ($cart_items as $cart_item) {
                // check discount and calculate total price
                // if (!empty($cart_item->product->discount)) {
                //     $total_price += ($cart_item->quantity * $cart_item->product->discounted_price);
                // } else {
                //     $total_price += ($cart_item->quantity * $cart_item->product->price);
                // }
                if (!empty($cart_item->type == 3)) {
                    $total_price += $cart_item->price;
                } else {

                    if (!empty($cart_item->product->discount)) {
                        $total_price += ($cart_item->quantity * $cart_item->product->discounted_price);
                    } else {
                        $total_price += ($cart_item->quantity * $cart_item->product->price);
                    }
                }
            }
        }


        return response()->json([
            'status' => 200,
            'html' => view('website.common.cart-items', get_defined_vars())->render(),
        ]);
    }

    public function remove_cart_item(Request $request)
    {
        $remove_cart_item = Cart::find($request->cart_id);
        $remove_cart_item->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Item removed from cart successfully !',
        ]);
    }
}
