<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\Faq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Product;
use App\Models\Admin\Length;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Admin\AttributeValue;
use App\Models\Admin\ParentCategory;
use App\Models\Admin\Order;
use App\Models\Admin\ProductAttribute;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Admin\Review;
use App\Models\Admin\OrderDetails;
use App\Models\Leads;
use App\Models\Admin\Banner;

class WebsiteController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $categories = ParentCategory::where('status', 1)->get();
        foreach ($categories as $category) {
            $category['products'] = Product::where('parent_category_id', $category->id)->where('status', 1)->get();
        }
        $new_products = Product::where('status', 1)->orderBy('id', 'desc')->get()->take(8);
        foreach ($new_products as $new_product) {
            $new_product['avg_rating'] = Review::where('product_id', $new_product->id)->avg('rating');
            $new_product['category'] = ParentCategory::where('id', $new_product->parent_category_id)->first();
        }
        $products = Product::where('status', 1)->get();
        foreach ($products as $product) {
            $product['avg_rating'] = Review::where('product_id', $product->id)->avg('rating');
            $product['category'] = ParentCategory::where('id', $product->parent_category_id)->first();
        }
        $sale_products = Product::where('status', 1)->where('discount_price', '!=', null)->orderBy('id', 'desc')->get()->take(3);
        foreach ($sale_products as $sale_product) {
            $sale_product['avg_rating'] = Review::where('product_id', $sale_product->id)->avg('rating');
        }
        $featured_products = Product::where('status', 1)->inRandomOrder()->take(3)->get();
        foreach ($featured_products as $featured_product) {
            $featured_product['avg_rating'] = Review::where('product_id', $featured_product->id)->avg('rating');
        }
        $recommended_products = Product::where('status', 1)->inRandomOrder()->take(3)->get();
        foreach ($recommended_products as $recommended_product) {
            $recommended_product['avg_rating'] = Review::where('product_id', $recommended_product->id)->avg('rating');
        }
        $bestselling_products = Product::where('status', 1)->inRandomOrder()->take(3)->get();
        foreach ($bestselling_products as $bestselling_product) {
            $bestselling_product['avg_rating'] = Review::where('product_id', $bestselling_product->id)->avg('rating');
        }
        $banners = Banner::get();
        return view("index", get_defined_vars());
    }
    public function search(Request $request)
    {
        $search = $request->q;
        $products = Product::where('status', 1)->where('product_name', 'LIKE', '%' . $search . '%')->paginate(12);
        foreach ($products as $product) {
            $product['avg_rating'] = Review::where('product_id', $product->id)->avg('rating');
            $product->category_name = ParentCategory::where('id', $product->parent_category_id)->first()->parent_category_name;
        }
        $featured_products = Product::where('status', 1)->inRandomOrder()->take(12)->get();
        foreach ($featured_products as $featured_product) {
            $featured_product->avg_rating = Review::where('product_id', $featured_product->id)->avg('rating');
        }
        $attributes = AttributeValue::where('status', 1)->get();
        $lengths = Length::where('status', 1)->get();
        return view("shop", get_defined_vars());
    }
    public function filter(Request $request)
    {
        // dd($request->all());
        $productIDs = [];
        // Filtering by Categories
        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $categoryProducts = DB::table('products')
                ->whereIn('parent_category_id', $categories)
                ->pluck('id')
                ->toArray();
            $productIDs[] = $categoryProducts;
        }
        // Filtering by Price
        if ($request->has('min_price') && $request->has('max_price')) {
            $minPrice = $request->input('min_price');
            $maxPrice = $request->input('max_price');
            $priceProducts = DB::table('products')
                ->whereBetween('price', [$minPrice, $maxPrice])
                ->pluck('id')
                ->toArray();
            $productIDs[] = $priceProducts;
        }
        // Filtering by Color (Assuming colors are IDs in attribute_values table)
        if ($request->has('colors')) {
            $c_products = [];
            $colors = $request->input('colors');
            $color_products = ProductAttribute::get();
            foreach ($color_products as $color_product) {
                $color_product->attribute_value_id = json_decode($color_product->attribute_value_id);
                if ($color_product->attribute_value_id != null) {
                    foreach ($color_product->attribute_value_id as $color_product_id) {
                        if (in_array($color_product_id, $colors)) {
                            $c_products[] = $color_product->product_id;
                        }
                    }
                }
            }
            $productIDs[] = $c_products;
        }
        // Filtering by Size (Assuming sizes are length IDs)
        if ($request->has('sizes')) {
            $sizes = $request->input('sizes');
            $s_products = [];
            $size_products = Product::where('status', 1)->get();
            foreach ($size_products as $size_product) {
                $size_product->length_id = json_decode($size_product->length_id);
                if ($size_product->length_id != null) {
                    foreach ($size_product->length_id as $size_product_id) {
                        if (in_array($size_product_id, $sizes)) {
                            $s_products[] = $size_product->id;
                        }
                    }
                }
            }
            $productIDs[] = $s_products;
        }
         // Filtering by Gender
         if ($request->has('gender')){
            $genders=$request->input('gender');
            $gender_products=DB::table('products')
            ->whereIn('gender', $genders)
            ->pluck('id')
            ->toArray();
            $productIDs[] =$gender_products;
         }
        // Find common products from all arrays in $productIDs
        if (count($productIDs) > 1) {
            $commonProductIDs = call_user_func_array('array_intersect', $productIDs);
        } else {
            $commonProductIDs = $productIDs[0] ?? [];
        }
        // Retrieve these products
        $products = Product::where('status', 1)->whereIn('id', $commonProductIDs)->paginate(12);
        if (!($request->has('sizes')) && !($request->has('gender')) && !($request->has('colors')) && !($request->has('categories'))) {
            $products = Product::where('status', 1)->paginate(12);
        }
        foreach ($products as $product) {
            $product->avg_rating = Review::where('product_id', $product->id)->avg('rating');
            $product->category_name = ParentCategory::where('id', $product->parent_category_id)->first()->parent_category_name;
        }
        $attributes = AttributeValue::where('status', 1)->get();
        $lengths = Length::where('status', 1)->get();
        $featured_products = Product::where('status', 1)->inRandomOrder()->take(12)->get();
        foreach ($featured_products as $featured_product) {
            $featured_product->avg_rating = Review::where('product_id', $featured_product->id)->avg('rating');
        }
        // dd($products);
        return view('shop', get_defined_vars());
    }
    public function shippingcart(Request $request)
    {
        $check_carts = Cart::where('session_id', Session::getId())->get();
        if (count($check_carts) == 0) {
            $notification = ['status' => 400, 'message' => 'Cart is empty'];
            return $notification;
        }
        $cart_items = Cart::where('session_id', Session::getId())->get();
        $total_item_in_cart = count($cart_items);
        // $cart_item->pluck('')
        $total_price = 0;
        if (count($cart_items) > 0) {
            foreach ($cart_items as $cart_item) {
                $total_price += $cart_item->price * $cart_item->quantity;
            }
        }
        $order = new Order();
        if (Auth::check()) {
            $order->user_id = Auth::id();
        }
        $order->customer_name = $request->name;
        $order->customer_email = $request->email;
        $order->customer_address = $request->address;
        $order->quantity = count($cart_items);
        $order->total_price = $total_price;
        $order->payment_method = $request->payment;
        $order->save();
        foreach ($cart_items as $cart_item) {
            $product_attributes = ProductAttribute::where('product_id', $cart_item->product_id)->first();
            if (!empty($product_attributes->attribute_value_id)) {
                $prod_attr = AttributeValue::where('status', 1)->whereIn('id', json_decode($product_attributes->attribute_value_id))->get();
                $product_attributes = $prod_attr;
            }
            if ($product_attributes != null) {
                foreach ($product_attributes as $product_attribute) {
                    if ($product_attribute->id == $cart_item->attribute_id) {
                        $attribute_value = $product_attribute->attribute_value;
                    }
                }
            }
            $order_details = new OrderDetails();
            $product = Product::where('status', 1)->where('id', $cart_item->product_id)->first();
            $order_details->order_id = $order->id;
            $order_details->product_id = $cart_item->product_id;
            $order_details->product_name = $product->product_name;
            if ($product_attributes != null) {
                $order_details->product_attribute = $attribute_value;
            }
            if ($product->length_id != null) {
                $order_details->product_length = Length::where('id', $cart_item->length_id)->first()->name;
            }
            $order_details->product_price = $product->price;
            $order_details->product_discount_price = $product->discount_price;
            $order_details->product_quantity = $cart_item->quantity;
            $order_details->product_image = $product->image;
            $order_details->product_description = $product->description;
            $order_details->product_category = $product->parent_category_id;
            if ($order_details->save()) {
                $product->stock = $product->stock - $cart_item->quantity;
                $product->save();
            }
        }
        if (Cart::where('session_id', Session::getId())->delete()) {
            $urlhtml = view('email_templates.order_confirmation')->render();
            $subject = "Order Placed Successfully!";
            $email = $request->email;
            $data = ['email' => $email, 'subject' => $subject, 'html' => $urlhtml];
            email($data);
            return ['status' => 200, 'message' => 'Order Placed Successfully'];
        } else {
            return ['status' => 400, 'message' => 'Something went wrong'];
        }
    }
    public function productdetails(Request $request, $id)
    {
        $id;
        $product = Product::where('status', 1)->where('id', $id)->first();
        // dd(Product);
        $length = Length::where('status', '1')->get();
        // $product_list = productList();
        // product attribute
        $product_attributes = ProductAttribute::where('product_id', $id)->first();
        if (!empty($product_attributes->attribute_value_id)) {
            $prod_attr = AttributeValue::where('status', 1)->whereIn('id', json_decode($product_attributes->attribute_value_id))->get();
            $product_attributes = $prod_attr;
        }
        $lengthnames = [];
        if (!empty($product->length_id)) {
            $length_id = json_decode($product->length_id);
            $lengthnames = Length::whereIn('id', $length_id)->get();
        }
        $category = ParentCategory::where('id', $product->parent_category_id)->first();
        $related_products = Product::where('status', 1)->where('parent_category_id', $product->parent_category_id)->where('id', '!=', $product->id)->get()->take(4);
        for ($i = 0; $i < count($related_products); $i++) {
            $related_products[$i]['avg_rating'] = Review::where('product_id', $related_products[$i]->id)->avg('rating');
        }
        $reviews = Review::where('product_id', $product->id)->with('get_user')->where('status', 1)->get();
        $review_count = Review::where('product_id', $product->id)->where('status', 1)->count();
        $review_avg = Review::where('product_id', $product->id)->avg('rating');
        return view('product-details', get_defined_vars());
    }
    public function add_cart(Request $request)
    {
        $cart_items = Cart::where('session_id', Session::getId())->get();
        if (count($cart_items) == 0) {
            $notification = ['status' => 'error', 'message' => 'Please add product to cart first'];
            return redirect()->route('home')->with($notification);
        }
        $cart_items;
        $total_item_in_cart = count($cart_items);
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
        return view("cart", get_defined_vars());
    }
    public function wishlist()
    {
        if (Auth::check() && Auth::user()->role == 1) {
            $notification = array('error_wishlish' => 'Sorry! You are logged in as admin please logout first', 'alert-type' => 'error');
            return back()->with($notification);
        }
        if (!Auth::check()) {
            $notification = array('login' => 'Please Login first !', 'alert-type' => 'success');
            return redirect()->route('login')->with($notification);
        }
        $wishlist_items = Wishlist::where('user_id', Auth::user()->id)->with('product')->get();
        $total_item_in_wishlist = count($wishlist_items);
        return view("wishlist", get_defined_vars());
    }
    public function add_wishlist(Request $request)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return response()->json([
                'status' => 404,
                'title' => 'Admin',
                'message' => 'Sorry! You are logged in as admin please logout first',
            ]);
        }
        $product = Product::find($request->id);
        if (Auth::id()) {
            // check in cart if already exist
            if (!empty(Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->first())) {
                return response()->json([
                    'status' => 404,
                    'title' => 'Wishlist !',
                    'message' => 'This item already added to wishlist !',
                ]);
            }
            // check if already exist in cart
            if (!empty(Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first())) {
                return response()->json([
                    'status' => 404,
                    'title' => 'Wishlist !',
                    'message' => 'This item already added to cart!',
                ]);
            }
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $product->id;
            $wishlist->save();
            $wishlist_item_counts = Wishlist::where('user_id', Auth::id())->count();
            return response()->json([
                'status' => 200,
                'title' => 'Wishlist !',
                'message' => 'Product Added To Wishlist !',
                'wishlist_item_count' => $wishlist_item_counts
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'title' => 'Login !',
                'message' => 'Please Login First !',
            ]);
        }
    }
    public function remove_wishlist(Request $request, $id)
    {
        $remove_wishlist_item = Wishlist::where('product_id', $id)->first();
        $remove_wishlist_item->delete();
        return redirect()->route('wishlist');
    }
    public function shop(Request $request, $slug = null)
    {
        return view("website.products");
    }
    public function checkout()
    {
        $cart_items = Cart::where('session_id', Session::getId())->get();
        $total = 0;
        foreach ($cart_items as $cart_item) {
            $available_quantity = Product::where('status', 1)->where('id', $cart_item->product_id)->first()->stock;
            if ($available_quantity < $cart_item->quantity) {
                $notification = ['message' => 'Sorry! ' . Product::where('status', 1)->where('id', $cart_item->product_id)->first()->product_name . ' has only ' . $available_quantity . ' quantity available.'];
                return back()->with($notification);
            }
            $total += $cart_item->price * $cart_item->quantity;
            $cart_item['product_name'] = Product::where('status', 1)->where('id', $cart_item->product_id)->first()->product_name;
        }
        return view("checkout", get_defined_vars());
    }
    // get products according to category in navbar
    public function get_category_products(Request $request, $id)
    {
        $parent_category = ParentCategory::where('id', $request->id)->first();
        $products = Product::where('status', 1)->where('parent_category_id', $request->id)->paginate(12);
        foreach ($products as $product) {
            $product->avg_rating = Review::where('product_id', $product->id)->avg('rating');
            $product->category_name = $parent_category->parent_category_name;
        }
        $attributes = AttributeValue::where('status', 1)->get();
        $lengths = Length::where('status', 1)->get();
        $featured_products = Product::where('status', 1)->inRandomOrder()->take(12)->get();
        foreach ($featured_products as $featured_product) {
            $featured_product->avg_rating = Review::where('product_id', $featured_product->id)->avg('rating');
        }
        return view('shop', get_defined_vars());
    }
    function addreview(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required',
            'review' => 'required',
            'product_id' => 'required',
        ]);
        if (!Auth::check()) {
            $notification = array('message' => 'Please login first !', 'status' => 404);
            return $notification;
        }
        $order = Order::where('user_id', Auth::id())->with('order_details')->get();
        $review = Review::where('user_id', Auth::id())->where('product_id', $request->product_id)->first();
        if (count($order) == 0) {
            $notification = array('message' => 'You have not purchased this product !', 'status' => 404);
            return $notification;
        }
        if ($review) {
            $notification = array('message' => 'You have already given review on this product !', 'status' => 404);
            return $notification;
        }
        $review = new Review();
        $review->user_id = Auth::id();
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->comments = $request->review;
        $review->name = $request->name;
        $review->status = 1;
        if ($review->save()) {
            $notification = array('message' => 'Review has been added successfully !', 'status' => 200);
            return $notification;
        } else {
            $notification = array('message' => 'Review has not been added successfully !', 'status' => 404);
            return $notification;
        }
    }
    function addlead(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $lead = new Leads();
        if (Auth::check()) {
            $lead->user_id = Auth::id();
        }
        $lead->session_id = Session::getId();
        $lead->product_id = $request->product_id;
        $lead->name = $request->name;
        $lead->phone = $request->phone;
        if ($lead->save()) {
            $notification = array('message' => 'Your response has been added successfully !', 'status' => 200);
            return $notification;
        } else {
            $notification = array('message' => 'Your response could not be added !', 'status' => 404);
            return $notification;
        }
    }
    public function leads()
    {
        $leads = Leads::with('products')->with('users')->get();
        return view('admin_dashboard.leads.index', get_defined_vars());
    }
    public function forgot_password()
    {
        return view('forgot-password');
    }
    public function update_password()
    {
        return view('update-password');
    }
}
