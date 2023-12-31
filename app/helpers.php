<?php



use App\Models\Cart;

use App\Models\Admin\Product;

use App\Models\Admin\Order;

use App\Models\Admin\ParentCategory;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use App\Models\Leads;



function getcartproducts()

{



        $cart_products = Cart::with('product')->where('session_id', Session::getId())->get();

        return $cart_products;

}



function getcarttotal()

{

    $cart_products = Cart::with('product')->where('session_id', Session::getId())->get();

    $total = 0;

    foreach ($cart_products as $cart_product) {

        if ($cart_product->product->discount_price) {

            $total += $cart_product->product->discount_price * $cart_product->quantity;

        } else {

            $total += $cart_product->product->price * $cart_product->quantity;

        }

    }

    return $total;

}



function getallcategories()

{

    $categories = ParentCategory::all();

    return $categories;

}



function getcartcount()

{

    $cart_products = Cart::with('product')->where('session_id', Session::getId())->get();

    return count($cart_products);

}



function getearnings()
{
    $order = Leads::all();
    return count($order);
}



function gettotalproducts()

{

    $product = Product::all()->where('status', 1);

    return count($product);

}



function gettotalorders()

{

    $order = Order::all();

    return count($order);

}



function gettotalusers()

{

    $user = User::all()->where('role', 2);

    return count($user);

}



function email($data)

{

    $url = 'https://api.brevo.com/v3/smtp/email';

    $apiKey = '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';

    $data = [

        'sender' => [

            'name' => "Ô'CASE BÉBÉ",

            'email' => 'ocasebebe@gmail.com'

        ],

        'to' => [

            ['email' => $data['email']],

        ],

        'htmlContent' => $data['html'],

        'subject' => $data['subject'],

    ];



    $headers = [

        'Accept: application/json',

        'Content-Type: application/json',

        "api-key: $apiKey"

    ];



    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POST, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);

    // dd($response);

    curl_close($ch);

}

