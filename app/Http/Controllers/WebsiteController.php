<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Product;

class WebsiteController extends Controller
{
    public function index(Request $request){
        $products = Product::where('status', 1)->get();
        return view('index');
    }
}
