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
        $product = Product::find($request->id);
        if ($product->discount_price == null) {
            $price = $product->price;
        } else {
            $price = $product->discount_price;
        };
        $addcart = new Cart();
        if (Auth::check()) {
            $addcart->user_id = Auth::user()->id;
        } 
        $addcart->session_id = Session::getId();
        $addcart->product_id = $request->id;
        $addcart->quantity =  $request->quantity;
        if ($request->color_id != null) {
            $addcart->attribute_id =  $request->color_id;
        } else {
            $addcart->attribute_id =  null;
        }
        $addcart->price =  $price;
        if ($request->length != null) {
            $addcart->length_id =  $request->length;
        } else {
            $addcart->length_id =  null;
        }
        $addcart->save();

        $cart_counts = Cart::where('session_id', Session::getId())->count();

        $data = [
            'status' => 200,
            'message' => 'Product Added To Cart!',
            'cart_swal', true,
            'cart_counts' => $cart_counts
        ];


        return response()->json($data);
    }


    public function quantity_cart_item(Request $request)
    {

        $product = Cart::where('session_id', Session::getId())->where('product_id', $request->id)->first();
        $product->quantity = $request->quantity;

        if ($product->update()) {
            $cart_items = Cart::where('session_id', Session::getId())->get();
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
