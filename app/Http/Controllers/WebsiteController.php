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


class WebsiteController extends Controller
{



    public function index()
    {
        $now = Carbon::now();
        $categories=ParentCategory::where('status',1)->get();
        foreach ($categories as $category) {
            $category['products'] = Product::where('parent_category_id', $category->id)->where('status', 1)->get();
        }
        $new_products = Product::where('status', 1)->orderBy('id', 'desc')->get()->take(8);
        foreach ($new_products as $new_product) {
            $new_product['avg_rating'] = Review::where('product_id', $new_product->id)->avg('rating');
            $new_product['category'] = ParentCategory::where('id', $new_product->parent_category_id)->first();
        }
        $products=Product::where('status',1)->get();
        foreach ($products as $product) {
            $product['avg_rating'] = Review::where('product_id', $product->id)->avg('rating');
            $product['category'] = ParentCategory::where('id', $product->parent_category_id)->first();
        }
        $sale_products = Product::where('status', 1)->where('discount_price', '!=', null)->orderBy('id', 'desc')->get()->take(3);
        foreach ($sale_products as $sale_product) {
            $sale_product['avg_rating'] = Review::where('product_id', $sale_product->id)->avg('rating');
        }
        $featured_products=Product::where('status', 1)->inRandomOrder()->take(3)->get();
        foreach ($featured_products as $featured_product) {
            $featured_product['avg_rating'] = Review::where('product_id', $featured_product->id)->avg('rating');
        }
        $recommended_products=Product::where('status', 1)->inRandomOrder()->take(3)->get();
        foreach ($recommended_products as $recommended_product) {
            $recommended_product['avg_rating'] = Review::where('product_id', $recommended_product->id)->avg('rating');
        }
        $bestselling_products=Product::where('status', 1)->inRandomOrder()->take(3)->get();
        foreach ($bestselling_products as $bestselling_product) {
            $bestselling_product['avg_rating'] = Review::where('product_id', $bestselling_product->id)->avg('rating');
        }

        return view("index", get_defined_vars());
    }

    public function our_products(Request $request)
    {
        $banners = Banner::get();
        $attribute_value = AttributeValue::orderBy('id', 'desc')->get();
        $category = ParentCategory::orderBy('id', 'desc')->get();


        $product_list = productList();
        $banners = Banner::get();
        $attribute_value = AttributeValue::orderBy('id', 'desc')->get();
        $category = ParentCategory::orderBy('id', 'desc')->get();

        $request;
        $conditions = array('min' => $request->min, 'max' => $request->max);
        $conditions = array_filter($conditions);

        if ($request->min) {
            $min = $request->min;
        } else {
            $min = "";
        }

        if ($request->on_sale) {
            if ($request->max) {
                $max = $request->max;
            } else {

                $max = Product::max('sale_price');
            }
            $on_sale = $request->on_sale;
        } else {
            if ($request->max) {
                $max = $request->max;
            } else {
                $max = Product::max('price');
            }
            $on_sale = $request->on_sale;
        }
        if ($request->accessories) {
            $accessories = $request->accessories;
        } else {
            $accessories = [];
        }
        if ($request->color) {
            $color = $request->color;
        } else {
            $color = [];
        }
        if ($request->rating) {
            $rating = $request->rating;
        } else {
            $rating = "";
        }
        // if ($request->length_min) {
        //     $length_min = $request->length_min;
        // } else {
        //     $length_min = "";
        // }
        // if ($request->length_max) {
        //     $length_max = $request->length_max;
        // } else {
        //     $length_max = Product::max('length');
        // }
        if ($request->in_stock) {
            $in_stock = $request->in_stock;
        } else {
            $in_stock = $request->in_stock;
        }


        if (request()->path() == 'filter-products') {

            $product_list = Product::OrderBy('id', 'desc')
                ->where(function ($product_list) use ($min, $on_sale, $max) {
                    // min and max filter
                    if ($min && $on_sale) {
                        $product_list->whereBetween('sale_price', [$min, $max]);
                    }
                    if ($min && $on_sale == false) {
                        $product_list->whereBetween('price', [$min, $max]);
                    }
                    // min and max filter end
                })->where(function ($product_list) use ($on_sale) {
                    if ($on_sale) {
                        $product_list->where('discount_status', 1);
                    }
                })->where(function ($product_list) use ($accessories) {
                    if ($accessories) {
                        $product_list->whereIn('parent_category_id', $accessories);
                    }
                })->with('product_attribute', function ($product_list) use ($color) {
                    if ($color) {
                        foreach ($color as $key => $value) {
                            return $product_list->whereJsonContains('attribute_value_id', (int)$value);
                        }
                    }
                })->when($color, function ($query) use ($color) {
                    $query->wherehas('product_attribute', function ($product_list) use ($color) {
                        if ($color) {
                            foreach ($color as $key => $value) {
                                return $product_list->whereJsonContains('attribute_value_id', (int)$value);
                            }
                        }
                    });
                })->with('get_ratings', function ($product_list) use ($rating) {
                    if ($rating) {
                        return $product_list->where('rating', '>=', $rating);
                        // return $product_list->whereJsonContains('attribute_value_id',$color);
                    }
                })->when($rating > 0, function ($query) use ($rating) {
                    $query->wherehas('get_ratings', function ($product_list) use ($rating) {
                        if ($rating) {
                            return $product_list->where('rating', '>=', $rating);
                        }
                    });
                    // COMMENT BECAUSE SHOWING ERROR!!!
                    // })->where(function ($product_list) use ($length_min, $length_max) {
                    //     if ($length_min) {
                    //         return $product_list->whereBetween('length', [$length_min, $length_max]);
                    //     }
                })->where(function ($product_list) use ($in_stock) {
                    if ($in_stock) {
                        return $product_list->where('remaining_quantity', '>', 0);
                    }
                })->get();
        }
        return view('website.products', get_defined_vars());
    }

    public function shippingcart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with("message", "Please login first !");
        }

        if (Auth::check() && Auth::user()->role == 1) {
            return redirect()->back()->with("message", "Admin is not allowed to purchase!");
        }


        $check_carts = Cart::where('user_id', Auth::id())->get();
        if (count($check_carts) == 0) {
            return redirect()->back()->with("message", "Sorry!, You can not checkout without add item in cart.");
        }


        // $user_address = UserAddress::where('user_id', Auth::id())->first();
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
        $shipping_state = Shipping_price::get();


        // check validation
        if (
            empty($user_address->first_name) ||
            empty($user_address->last_name) ||
            empty($user_address->full_name) ||
            empty($user_address->email) ||
            empty($user_address->contact) ||
            empty($user_address->mailling_address) ||
            empty($user_address->shipping_address) ||
            empty($user_address->country_id) ||
            empty($user_address->state_id) ||
            empty($user_address->city_id) ||
            empty($user_address->zip_code)
        ) {
            $is_validated = false;
        } else {
            $is_validated = true;
        }


        if (Auth::user()->is_guest == 1) {
            $cart_items = Cart::where('user_id', Auth::user()->id)->where('session', Session::getId())->with('product', 'attributeValue', 'video', 'education')->get();
        } else {
            $cart_items = Cart::where('user_id', Auth::user()->id)->with('product', 'attributeValue', 'video', 'education')->get();
        }


        $cart_items;
        $total_item_in_cart = count($cart_items);
        // $cart_item->pluck('')

        $total_price = 0;
        $total_price_after_coupon_apply = 0;
        if (count($cart_items) > 0) {
            foreach ($cart_items as $cart_item) {

                // check discount and calculate total price
                // if (!empty($cart_item->discount)) {
                //     $total_price += ($cart_item->quantity * $cart_item->discounted_price);
                // } else {
                //     $total_price += ($cart_item->quantity * $cart_item->price);
                // }
                if (!empty($cart_item->type == 1 || $cart_item->type == 2 || $cart_item->type == 3)) {
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

        // if (!empty($user_address->state_id)) {
        //     $shipping_price = Shipping_price::where('state_id', $user_address->state_id)->value('price');
        //     if ($shipping_price !== null) {
        //         $total_price += $shipping_price;
        //     }
        // }
        // $client = new Client();


        // $response = Http::withHeaders([
        //     'Authorization' => 'Bearer d828ad31e5e2a4985ea44fe289ef1bbe68744e3e19ee5266eb'
        // ])->get('https://sandbox-api.paddle.com/products');

        $payload = [
            'vendor_id' => env('PADDLE_VENDOR_ID'),
            'vendor_auth_code' => env('PADDLE_VENDOR_AUTH_CODE'),
            'product_id' => 'pro_01hcatzd9pddggv444kg1vvfv9',  // Replace with your actual product ID
            'customer_email' => 'customer@example.com',  // Replace with the actual customer email
            // Add other optional parameters here
        ];
        // $products = json_decode($response->getBody(), true);
        // dd($products);
        // $user1 = auth()->user();
        // $checkout = $user1->newSubscription('default', 'pro_01hc0hfmjwrnadvt1e9njnrt5t')->create();
        $after_coupon_apply_total_price = $total_price;
        // dd('$');

        $paylink = Auth::user()->charge(20, "ChatApp Education",[ 'webhook_url' => 'https://d132-101-53-236-9.ngrok-free.app/Edify-with-Integrations/webhooks/paddle' ]);
       
        
        return view('website.shipping-cart', get_defined_vars());
    }

    public function productdetails(Request $request, $id)
    {

        $id;

        $product = Product::where('id', $id)->first();
        // dd(Product);
        $length = Length::where('status', '1')->get();
        // $product_list = productList();


        // product attribute
        $product_attributes = ProductAttribute::where('product_id', $id)->first();
        if (!empty($product_attributes->attribute_value_id)) {
            $prod_attr = AttributeValue::whereIn('id', json_decode($product_attributes->attribute_value_id))->get();
            $product_attributes = $prod_attr;
        }


        $lengthnames = [];
        if (!empty($product->length_id)) {
            $length_id = json_decode($product->length_id);
            $lengthnames = Length::whereIn('id', $length_id)->get();
        }

        $category=ParentCategory::where('id',$product->parent_category_id)->first();
        $related_products = Product::where('parent_category_id', $product->parent_category_id)->where('id', '!=', $product->id)->get()->take(4);
        for ($i = 0; $i < count($related_products); $i++) {
            $related_products[$i]['avg_rating'] = Review::where('product_id', $related_products[$i]->id)->avg('rating');
        }




        // total count of person who add current item in cart
        // $people_add_item_in_carts = Cart::where('product_id', $productShow->id)->count();
        $reviews = Review::where('product_id', $product->id)->with('get_user')->where('status', 1)->get();
        // $ratings = Review::where('product_id', $productShow->id)->where('status', 1)->get();
        // $avg = $ratings->average('rating');
        $review_count = Review::where('product_id', $product->id)->count();
        $review_avg = Review::where('product_id', $product->id)->avg('rating');

        // $review_avg = round($review_avg);
        // $is_buy_product = BillingInfo::where('user_id', Auth::id())->where('product_id', $productShow->id)->get();
           
        return view('product-details', get_defined_vars());
    }

    public function termscondition()
    {
        $terms_conditons = TermsCondition::first();
        return view('website.terms-conditions', get_defined_vars());
    }

    public function successstory()
    {
        $success_story = Banner::get();
        return view('website.success-story', get_defined_vars());
    }

    public function allvideos()
    {
        $videos_innerpage = Video::where('status', 1)->get();
        return view('website.404', get_defined_vars());
    }

    public function educationvideo()
    {
        $page_content = Banner::get();

        $education_video = Education::where('status', 1)->get();
        return view('website.education', get_defined_vars());
    }

    public function customer_photos()
    {
        $customer_photos = CustomerPhoto::where('status', 1)->get();
        return view("website.customer-photos", get_defined_vars());
    }

    public function sign_in()
    {
        return view("website.sign-in");
    }

    public function userlogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $credentials = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
            'role' => 2,
        ]);

        $user_status = User::where('email', $request->email)->first();

        if (User::where('email', $request->email)->exists()) {
            if ($credentials) {
                if (Auth::check() && Auth::user()->role == 2) {
                    $notification = ['login' => 'Login Successfully ! '];

                    if ($request->is_html2_login) {

                        return redirect()->route('user.profile')->with($notification);
                    } else {

                        $notification = ['login' => 'Login Successfully ! '];
                        return back()->with($notification);
                    }
                } else {
                    $notification = ['admin' => 'You are not allowed to login here ! '];
                    return redirect()->route('sign-in')->with($notification);
                }
            }
            if ($user_status->status == 0) {
                $notification = ['inactive' => 'Your account is not approved from the admin side!'];
                return redirect()->route('sign-in')->with($notification);
            } else {
                $notification = ['invalid' => 'Invalid Credentials ! '];
                return redirect()->route('sign-in')->with($notification);
            }
        } else {
            $notification = ['notregistered' => 'You are not registered in Edify Elite Extensions ! '];
            return redirect()->route('sign-in')->with($notification);
        }
    }

    public function guestlogin(Request $request)
    {

        $credentials = Auth::attempt([
            'email' => 'guest@gmail.com',
            'password' => 'Pass@123',
            'is_guest' => 1,
            'role' => 2,
        ]);

        if ($credentials) {
            if (Auth::check() && Auth::user()->role == 2) {

                $notification = ['login' => 'Signed in as Guest ! '];
                return redirect()->route('home')->with($notification);
            } else {
                $notification = ['admin' => 'You are not allowed to login here ! '];
                return redirect()->route('sign-in')->with($notification);
            }
        }
    }


    public function product_user_login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
            'password' => 'required', Password::min(8)->mixedCase()->numbers()->symbols(),
        ]);


        $credentials = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
            'role' => 2,
        ]);


        $user_status = User::where('email', $request->email)->first();
        if (User::where('email', $request->email)->exists()) {
            if ($credentials) {
                if (Auth::check() && Auth::user()->role == 2) {
                    $notification = array('login' => 'Login Succesfully ! ');

                    if ($request->slug) {
                        return response()->json(['status' => 200, 'message' => 'You are successfully login']);
                    }
                } else {
                    return response()->json([
                        'status' => 403,
                        'message' => 'You are not allowed to login here!'
                    ]);
                }
            }

            if ($user_status->status == 0) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Your account is not approve from admin side  ! '
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Invalid Credentials!'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'You are not registered in Edify Elite Extension!'
            ]);
        }
    }

    public function forget(Request $request)
    {

        $validated = $request->validate(['email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',]);

        if (Auth::check() && Auth::user()->role == 1) {
            $notification = array('admin' => 'You are logged in as admin please logout first ! ',);
            return redirect()->route('forget_password')->with($notification);
        }


        $user = User::where('email', $request->email)->first();
        if (!empty($user)) {
            if ($user->status == 0) {
                $notification = array('inactive' => 'Your account is not approve from admin side ! ',);
                return back()->with($notification);
            }
        }

        $token = Str::random(64);
        DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]);

        if (!empty($user)) {
            $check_admin = User::where('email', $request->email)->first();
            if ($check_admin->role == 1) {
                $notification = array('reset' => 'You can not reset password from here !',);

                return redirect()->route('forget_password')->with($notification);
            }

            $message = "Wait for admin approval";
            $token;
            $urlhtml = view('emails.reset_mail', get_defined_vars())->render();
            $subject = "Reset Password Email From Edify";
            $data = ['email' => $request->email, 'subject' => $subject, 'html' => $urlhtml];
            email($data);

            // $data = ['email' => $request->email, 'name' => $user->name,];
            // $email_user = $request->email;
            // Mail::send(
            //     'emails.reset_mail',
            //     ['token' => $token, 'data' => $data],
            //     function ($message) use ($email_user) {
            //         $message->to($email_user, 'Reset Password')->subject('Reset Password');
            //     }
            // );

            // Session::put('user_email', $request->email);
            $notification = array('emailsent' => 'We have sent you an email to reset password ! ',);
            return back()->with('We have sent you an email to reset password !');
        } else {
            $notification = array('invalid' => 'This email does not exist !',);
            return back()->with($notification);
        }
    }

    public function updatenewpassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|max:100',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])->latest()
            ->first();
        // return $updatePassword;
        if (!$updatePassword) {
            $notification = array('token' => ' Invalid Token ! ');
            return back()->with($notification);
        } else {
            $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);
            DB::table('password_resets')->where(['email' => $request->email])->delete();
            // Session::forget('user_email');
            $notification = array('updated' => 'Password Updated Successfull ! ',);
            return back()->with($notification);
        }
    }

    public function sign_up()
    {

        return view("website.sign-up");
    }

    public function user_register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:35',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email|max:100',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],
            'cosmetology_license_number' => 'required',
            'professional_details' => 'required',
            'date' => 'required',
        ]);
        // $result = helper('myHelperFunction', 'abc');

        // dd($request->all());
        $validated = $request->validate(['first_name' => 'required|max:35', 'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email|max:100', 'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()],]);

        $check_user = User::where('email', $request->email)->first();
        if (!empty($check_user)) {
            $notification = array('message' => 'User with this email already exist! ', 'alert-type' => 'error');
            return back()->with($notification);
        }

        // for break date
        $dateofbirth = $request->date;
        $date = Carbon::parse($dateofbirth);
        $day = $date->day;
        $month = $date->month;
        $year = $date->year;
        // end

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->month = $month;
        $user->day = $day;
        $user->year = $year;
        $user->cosmetology_license_number = $request->cosmetology_license_number;
        $user->professional_details = $request->professional_details;
        // if($request->extension_certification_image){
        //     $filename = time() . '.' . $request->extension_certification_image->extension();
        //     $request->extension_certification_image->move(public_path('profiles'), $filename);
        //     $user->extension_certification_image = $filename;
        //   }
        if ($request->hasfile('extension_certification_image')) {
            $file = $request->file('extension_certification_image');
            $extension = $file->getClientOriginalExtension();
            $filename_header = uniqid() . "." . $extension;
            $filename_header = $file->move('uploads/extension_certification_image/', $filename_header);
            $user->extension_certification_image = config('app.url') . '/' . $filename_header;
        }
        $user->role = 2;
        $user->status = 0;
        $user->save();


        $message = "Wait for admin approval";
        $urlhtml = view('emails.sign_up', get_defined_vars())->render();
        $subject = "SignUp Email From Edify";
        $data = ['email' => $request->email, 'subject' => $subject, 'html' => $urlhtml];
        email($data);

        $notification = array('signup' => "Thank you for submitting your account information. Our team will review your request and approve your account as soon as possible.You will receive an email notification once your account has been approved!", 'alert-type' => 'success');
        return redirect()->route('sign-in')->with($notification);
    }
    public function add_cart(Request $request)
    {

        if (!Auth::check()) {
            $notification = array('login' => 'Please Login first !', 'alert-type' => 'success');
            return back()->with($notification);
        }
        $cart_items = Cart::where('user_id', Auth::id())->get();
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
            return redirect()->route('sign-in')->with($notification);
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

    public function product(Request $request, $slug = null)
    {
        $slug = $slug;
        $product = Product::where(
            'slug',
            $slug
        )->with('product_attribute')->with('get_parent_category', 'get_main_category')->first();
        // return $product;
        if (!$product) {
            return view('website.404');
        }

        // product attribute
        $product_attributes = [];
        if (!empty($product->product_attribute->attribute_value_id)) {
            $prod_attr = AttributeValue::whereIn('id', json_decode($product->product_attribute->attribute_value_id))->get();
            $product_attributes = $prod_attr;
        }


        // total count of person who add current item in cart
        $people_add_item_in_carts = Cart::where('product_id', $product->id)->count();
        $reviews = Review::where('product_id', $product->id)->get();
        $ratings = Review::where('product_id', $product->id)->where('status', 1)->get();
        $avg = $ratings->average('rating');
        $review_count = Review::where('product_id', $product->id)->count();
        // $total_average_count = Product
        return view("website.products", get_defined_vars());
    }

    public function checkout()
    {
        return view("website.checkout");
    }

    public function payment()
    {
        return view("website.payment");
    }

    public function how_it_works()
    {
        $faqs = Faq::whereStatus(1)->get();

        // page_id 2 -> How It works
        $banners = Banner::where('page_id', 2)->get();
        $page_contents = PageContent::where('page_id', 2)->get();

        return view("website.how-it-work", get_defined_vars());
    }

    public function custom_experience()
    {
        $custom_experiences = CustomExperience::all();
        return view("website.custom-experience", get_defined_vars());
    }

    public function create_your_own_lip()
    {
        return view("website.create-your-own-lip");
    }

    public function custom_lip()
    {
        return view("website.custom-lips");
    }

    public function brand_ambassador()
    {
        $brand_ambassadors = BrandAmbassador::whereStatus(1)->get();

        return view("website.brand-ambassador", get_defined_vars());
    }

    public function inquiry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'contact' => 'required|max:20',
            'email' => 'required|max:50',
            'name' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $inquiry = new Inquiry();
            $inquiry->name = $request->name;
            $inquiry->email = $request->email;
            $inquiry->contact = $request->contact;
            $inquiry->message = $request->message;
            $inquiry->save();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'message' => $request->message,
            ];
            $email_admin = "djoy62471@gmail.com";
            // Mail::send(
            //     'frontend.emails.contact_mail',
            //     ['data' => $data],
            //     function ($message) use ($email_admin) {
            //         $message
            //             ->to($email_admin, 'Contact')->subject('Contact');
            //     }
            // );
            // $user_email = $request->email;
            // Mail::send(
            //     'frontend.emails.user_contact',
            //     ['data' => $data],
            //     function ($message) use ($user_email) {
            //         $message
            //             ->to($user_email, 'Contact')->subject('Contact');
            //     }
            // );
            return response()->json([
                'status' => 200,
                'message' => 'Your Inquiry has been sent'
            ]);
        }
    }

    public function about_us()
    {

        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://api.galaxysearchapi.com/PersonSearch');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);

        // $headers = array();
        // $headers[] = 'Accept: application/json';
        // $headers[] = 'Content-Type: application/json';
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $result = curl_exec($ch);

        // if (curl_errno($ch)) {
        //     echo 'Error:' . curl_error($ch);
        // }
        // curl_close($ch);
        // dd($result);

        $page_content = Banner::get();

        return view("website.about-us", get_defined_vars());
    }

    public function newsletter(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(
                ['status' => 400, 'errors' => $validator->errors()->toArray()]
            );
        } else {
            $subscriber = Subscription::where('email', $request->email)->first();
            if ($subscriber) {
                return response()->json(
                    ['status' => 500, 'message' => "You have already subscribed"]
                );
            } else {


                $subscription = new Subscription();
                $subscription->email = $request->email;
                $subscription->status = 1;
                $subscription->save();

                return response()->json([
                    'status' => 200,
                    'message' => 'Your subscription has been sent'
                ]);
            }
        }
    }

    public function refund_policy()
    {
        // page_id 5 -> Refund Policy
        $page_contents = PageContent::where('id', 10)->get();
        return view("website.refund-policy", get_defined_vars());
    }

    public function privacy_policy()
    {
        // id 11 -> Privacy Policy
        $privacy_policy = PrivacyPolicy::first();
        $page_contents = PageContent::where('id', 11)->get();
        return view("website.privacy-policy", get_defined_vars());
    }

    public function shipping_policy()
    {
        //  id 12 -> Shipping Policy
        $page_contents = PageContent::where('id', 12)->get();
        return view("website.shipping-policy", get_defined_vars());
    }

    public function terms_of_service()
    {
        // id 13 -> Terms of Service
        $page_contents = PageContent::where('id', 13)->get();
        return view("website.terms-of-service", get_defined_vars());
    }

    public function do_not_sell_my_personal_information()
    {
        // id 14 -> Do not sell my personal information
        $page_contents = PageContent::where('id', 14)->get();
        return view("website.do-not-sell-my-personal-information", get_defined_vars());
    }

    public function contact_us()
    {
        $banners = Banner::get();
        return view("website.contact-us", get_defined_vars());
    }

    public function forget_password()
    {
        return view("website.forget-password");
    }

    public function reset_password(Request $request, $token)
    {

        return view("website.reset-password", ['token' => $token]);
    }

    function getAmount($input)
    {
        $input = number_format($input);
        $symbol = '';
        $input_count = substr_count($input, ',');
        if ($input_count != '0') {
            if ($input_count == '1') {
                $symbol = 'k';
                return substr($input, 0, -4);
            } else if ($input_count == '2') {
                $symbol = 'm';
                return substr($input, 0, -8) . 'm';
            } else if ($input_count == '3') {
                $symbol = 'b';
                return substr($input, 0, -12) . 'b';
            } else {
                return;
            }
        } else {
            return [$input, $symbol];
        }
    }

    // get all products with average ratings
    public function shop_all_products(Request $request)
    {

        $products = Product::where('status', 1)->with('get_ratings')->withAvg('get_ratings', 'rating')->get();
        return view('website.products', get_defined_vars());
    }
    // get products according to category in navbar
    public function get_category_products(Request $request, $id)
    {
        $parent_category = ParentCategory::where('id', $request->id)->first();
        $products = Product::where('status', 1)->where('parent_category_id', $request->id)->get();
        foreach ($products as $product) {
            $product->avg_rating = Review::where('product_id', $product->id)->avg('rating');
            $product->category_name = $parent_category->name;
        }
        $attributes = AttributeValue::all();
        $lengths = Length::all();
        return view('shop', get_defined_vars());
    }

    public function state(Request $request)
    {

        $statelocation = State::where('country_id', $request->id)->get();
        if (count($statelocation) > 0) {
            return response()->json([
                'status' => 200,
                'states' => $statelocation

            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function city(Request $request)
    {
        $statelocation = City::where('state_id', $request->id)->get();
        if (count($statelocation) > 0) {
            return response()->json([
                'status' => 200,
                'cities' => $statelocation
            ]);
        } else {
            return response()->json(['status' => 404,]);
        }
    }

    public function checkShippingPrice(Request $request)
    {
        $stateId = $request->input('state_id');
        $shippingPrice = Shipping_price::where('state_id', $stateId)->value('price');

        if ($shippingPrice !== null) {
            return response()->json([
                'status' => 200,
                'price' => $shippingPrice
            ]);
        } else {
            return response()->json([
                'status' => 404
            ]);
        }
    }


    public function cash_on_delivery(Request $request)
    {
        //  return "a";

        if (!Auth::check()) {
            return redirect()->back()->with("message", "Please login first !");
        }

        if (Auth::check() && Auth::user()->role == 1) {
            return redirect()->back()->with("message", "Admin is not allowed to purchase!");
        }

        // return $shipping_state = Shipping_price::get();
        $check_carts = Cart::where('user_id', Auth::id())->get();
        if (count($check_carts) == 0) {
            return redirect()->back()->with("message", "Sorry!, You can not direct payment without add item in cart.");
        }
        $validated = $request->validate([
            'first_name' => 'required|max:35',
            'last_name' => 'required|max:35',
            'email' => 'required',
            'contact' => 'required',
            'mailling_address' => 'required|max:250',
            'shipping_address' => 'required|max:250',
            'country' => 'required|max:20',
            'state' => 'required|max:20',
            'city' => 'required|max:20',
            'zip_code' => 'required|max:20',
        ]);

        if (Auth::user()->is_guest == 1) {
            $cart_items = Cart::where('user_id', Auth::id())->where('session', Session::getId())->with('product', 'video', 'education')->get();
        } else {
            $cart_items = Cart::where('user_id', Auth::id())->with('product', 'video', 'education')->get();
        }
        $total_price = 0;
        if (count($cart_items) > 0) {
            foreach ($cart_items as $cart_item) {
                // check discount and calculate total price
                if (!empty($cart_item->type == 1 || $cart_item->type == 2 || $cart_item->type == 3)) {
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

        $shipping_price = $request->input('shipping_price');

        // If shipping price is set, add it to the total price
        if ($shipping_price) {
            $total_price += $shipping_price;
        }


        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_order_price = $total_price;
        $order->order_address_id = 1;
        $order->save();


        $cart_total_price = 0;
        if (count($cart_items) > 0) {
            foreach ($cart_items as $cart_item) {
                if (!empty($cart_item->type == 1 || $cart_item->type == 2 || $cart_item->type == 3)) {
                    $total_price += $cart_item->price;
                } else {

                    if (!empty($cart_item->product->discount)) {
                        $total_price += ($cart_item->quantity * $cart_item->product->discounted_price);
                    } else {
                        $total_price += ($cart_item->quantity * $cart_item->product->price);
                    }
                }

                $billing = new BillingInfo();
                $billing->user_id = Auth::id();
                $billing->order_id = $order->id;
                $billing->product_id = $cart_item->product_id;
                $billing->video_id = $cart_item->video_id;
                $billing->education_id = $cart_item->education_id;
                $billing->attribute = $cart_item->attribute;
                $billing->attribute_value = $cart_item->color_id;
                $billing->price = $cart_item->price;
                $billing->quantity = $cart_item->quantity;
                $billing->discount = $cart_item->discount;
                $billing->discounted_price = $cart_item->discounted_price;
                $billing->cstm_product_fragrance = $cart_item->cstm_product_fragrance;
                $billing->cstm_product_name = $cart_item->cstm_product_name;
                $billing->cstm_intagram_handle = $cart_item->cstm_intagram_handle;
                $billing->cstm_tiktok_handle = $cart_item->cstm_tiktok_handle;

                if (!empty($cart_item->lengthvalue)) {
                    $billing->length = $cart_item->lengthvalue->name;
                } else {
                    $billing->length = null;
                }

                $billing->save();
            }
        }
        // order address
        $order_address = new OrderAddress();
        $order_address->user_id = Auth::id();
        $order_address->order_id = $order->id;
        $order_address->first_name = $request->first_name;
        $order_address->last_name = $request->last_name;
        $order_address->full_name = $request->full_name;
        $order_address->email = $request->email;
        $order_address->contact = $request->contact;

        $order_address->mailling_address = $request->mailling_address;
        $order_address->shipping_address = $request->shipping_address;
        $order_address->country_id = $request->country;
        $order_address->state_id = $request->state;
        $order_address->city_id = $request->city;
        $order_address->zip_code = $request->zip_code;
        $order_address->save();


        // $message = "Wait for admin approval";
        //     // $token;
        $urlhtml = view('emails.invoice', get_defined_vars())->render();
        // dd($urlhtml);
        $subject = "Invoice Email From Edify";
        $data = ['email' => $request->email, 'subject' => $subject, 'html' => $urlhtml];
        // dd($data);
        email($data);
        if (Auth::user()->is_guest == 1) {
            $removeCart = Cart::where('user_id', Auth::id())->where('session', Session::getId());
        } else {
            $removeCart = Cart::where('user_id', Auth::id());
        }
        $removeCart->delete();
        // dd('h');
        $notification = array('order_success' => 'Order has been completed successfully !');
        return redirect()->route('user.order_list')->with($notification);
    }

    public function invoice()
    {
        return view('emails.invoice', get_defined_vars());
    }
}