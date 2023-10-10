<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BackendModels\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\BackendModels\Product;
use App\Models\BackendModels\Length;
use App\Models\BackendModels\Attribute;
use App\Models\BackendModels\AttributeValue;
use App\Models\BackendModels\SubCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\BackendModels\MainCategory;
use App\Models\BackendModels\ParentCategory;
use App\Models\BackendModels\ProductAttribute;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin_dashboard.product.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Product::get();
        $last_data_object = collect($data)->last();
        $parent_categories = ParentCategory::get();
        $attributes = Attribute::where('id', 1)->with('get_attr')->first();
        $length = Length::where('status','1')->get();

        return view('admin_dashboard.product.create', get_defined_vars());
    }


/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::where('id', $id)->with('product_attribute', 'get_main_category')->first();
        // return json_decode($products->product_attribute->attribute_value_id);
        $parent_categories = ParentCategory::get();
        $main_categories = maincategory::get();
        // return $products->product_attributes[0]->product_attribute_id;
        // return $attributes = ProductAttribute::where('product_id', $id)->get();
        $attribute_lists = AttributeValue::where('attribute_id', 1)->get();
        $length = Length::where('status','1')->get();

        return view('admin_dashboard.product.edit', get_defined_vars());
    }

    public function updateproductdata(Request $request, $id)
    {

        $product_validation = Product::find($id);

        $validated = $request->validate([
            'product_name' => 'required',
            // 'color' => 'required',
            'parent_category_id' => 'required',
            'regular_price' => 'required',
            'quantity' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'length_id' => 'required',['length_id.required'=>'length field is required']
        ]);


        if (empty($product_validation->image)) {
            $variants_products['image'] = "required|mimes:png,jpg,jpeg,webp|max:500000";
        }
        if (empty($product_validation->image)) {
            $variants_products['multiple_image*.'] = "required|mimes:png,jpg,jpeg,webp|max:500000";
        }


        $discount_status = null;

        if (!empty($request->sale_start) && !empty($request->sale_end)) {
            $now = strtotime(now());
            $sale_start = Carbon::create(date('Y', strtotime($request->sale_start)), date('m', strtotime($request->sale_start)), date('d', strtotime($request->sale_start)));
            $sale_end = Carbon::create(date('Y', strtotime($request->sale_end)), date('m', strtotime($request->sale_end)), date('d', strtotime($request->sale_end)));

            if ($request->sale_price != null) {
                $discount_status = true;
            }
        }



        // return $request->all();
        $product = Product::find($id);
        $product->length_id = json_encode($request->length_id);
        $product->parent_category_id = $request->parent_category_id;
        $product->main_category_id = $request->main_category_id;
        // $product->length_id = $request->length_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name, "-");
        $product->price = $request->regular_price;
        $product->sale_price = $request->sale_price;


        if ($request->sale_price != '') {
            $product->discounted_price = $request->sale_price;
            $product->discount = ($request->regular_price - $request->sale_price);
            $product->discount_percent = number_format((($request->regular_price - $request->sale_price) / $request->regular_price) * 100, 2);
            $product->sale_start = $request->sale_start ?? null;
            $product->sale_end = $request->sale_end ?? null;
            $product->discount_status = 1;
        } else {

            $product->sale_price = null;
            $product->discounted_price = null;
            $product->discount = null;
            $product->discount_percent = null;
            $product->discount_status = null;
            $product->sale_start = null;
            $product->sale_end = null;
        }




        $product->total_price = $request->total_price;
        // $product->price = $request->price;
        // $product->sku = $request->sku;
        $product->brand_id = $request->brand_id;
        $product->quantity = $request->quantity;
        $product->remaining_quantity = $request->quantity;
        $product->status = 1;
        $product->description = $request->description;
        $product->short_description = $request->short_description;




        // single image
        if ($request->image) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $filename);
            $product->image = $filename;
        }


        if ($request->hasfile('multiple_image')) {
            $images_extract = [$product->image];
            foreach ($request->file('multiple_image') as $key => $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('products'), $name);
                array_push($images_extract, $name);
            }
            $product->multiple_image = json_encode($images_extract);
        }

        $product->save();

        if (!empty($request->color)) {
            $attribute_value = AttributeValue::whereIn('id', $request->color)->get();
            $attr_id =  $attribute_value->pluck('id');
            $attr_value = $attribute_value->pluck('attribute_value');


            $product_attribute = ProductAttribute::where('product_id', $product->id)->first();
            $product_attribute->product_id = $product->id;
            $product_attribute->product_attribute_id = 1;
            $product_attribute->attribute_value_id = json_encode($attr_id);
            $product_attribute->attribute_value = json_encode($attr_value);
            $product_attribute->save();
            // }
        }


        $notification = array('message' => 'Product added successfully! ', 'alert-type' => 'success');
        return redirect()->route('product.index')->with($notification);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
            'multiple_image' => 'required',
            'product_name' => 'required|unique:products,product_name',
            // 'color' => 'required',
            'parent_category_id' => 'required',
            'regular_price' => 'required',
            'quantity' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'length_id' => 'required',['length_id.required'=>'length field is required']


        ]);


        $discount_status = null;

        if (!empty($request->sale_start) && !empty($request->sale_end)) {
            $now = strtotime(now());
            $sale_start = Carbon::create(date('Y', strtotime($request->sale_start)), date('m', strtotime($request->sale_start)), date('d', strtotime($request->sale_start)));
            $sale_end = Carbon::create(date('Y', strtotime($request->sale_end)), date('m', strtotime($request->sale_end)), date('d', strtotime($request->sale_end)));

            if ($request->sale_price != null) {
                $discount_status = true;
            }
        }


        // return $request->all();
        $product = new Product();
        $product->length_id = json_encode($request->length_id);
        $product->parent_category_id = $request->parent_category_id;
        // $product->length_id = $request->length_id;
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name, "-");
        $product->price = $request->regular_price;
        $product->sale_price = $request->sale_price;


        if ($request->sale_price != '') {
            $product->discounted_price = $request->sale_price;
            $product->discount = ($request->regular_price - $request->sale_price);
            $product->discount_percent = number_format((($request->regular_price - $request->sale_price) / $request->regular_price) * 100, 2);
            $product->sale_start = $request->sale_start ?? null;
            $product->sale_end = $request->sale_end ?? null;
            $product->discount_status = 1;
        } else {

            $product->sale_price = null;
            $product->discounted_price = null;
            $product->discount = null;
            $product->discount_percent = null;
            $product->discount_status = null;
            $product->sale_start = null;
            $product->sale_end = null;
        }




        $product->total_price = $request->total_price;
        // $product->price = $request->price;
        // $product->sku = $request->sku;
        $product->brand_id = $request->brand_id;
        $product->quantity = $request->quantity;
        $product->remaining_quantity = $request->quantity;
        $product->status = 1;
        $product->description = $request->description;
        $product->short_description = $request->short_description;




        // single image
        if ($request->image) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $filename);
            $product->image = $filename;
        }


        if ($request->hasfile('multiple_image')) {
            $images_extract = [$product->image];
            foreach ($request->file('multiple_image') as $key => $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('products'), $name);
                array_push($images_extract, $name);
            }
            $product->multiple_image = json_encode($images_extract);
        }
        // $product->length
        $product->save();

        if (!empty($request->color)) {
            $attribute_value = AttributeValue::whereIn('id', $request->color)->get();
            $attr_id =  $attribute_value->pluck('id');
            $attr_value = $attribute_value->pluck('attribute_value');
            // for ($i=0; $i < count($request->color); $i++) {

            $product_attribute = new ProductAttribute();
            $product_attribute->product_id = $product->id;
            $product_attribute->product_attribute_id = $request->color_id;
            $product_attribute->attribute_value_id = json_encode($attr_id);
            $product_attribute->attribute_value = json_encode($attr_value);
            $product_attribute->save();
            // }
        }


        $notification = array('message' => 'Product added successfully! ', 'alert-type' => 'success');
        return redirect()->route('product.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateproduct(Request $request)
    {

        $id = $request->edit_data;
        // dd($id);
        $edit_product = Product::where('id', $id)->first();
        $edit_product->parent_category_id = $request->parent_category_id;
        $edit_product->main_category_id = $request->main_category_id;
        $edit_product->sub_category_id = $request->sub_category_id;
        $edit_product->product_name = $request->product_name;
        $edit_product->slug = Str::slug($request->product_name, "-");
        $edit_product->discount = $request->discount;
        $edit_product->total_price = $request->total_price;
        $edit_product->price = $request->price;
        $edit_product->sku = $request->sku;
        $edit_product->brand_id = $request->brand_id;

        $edit_product->status = 1;
        $edit_product->description = $request->description;
        $edit_product->short_description = $request->short_description;

        $edit_product->save();

        // for stock
        // return response()->json([
        //     'status' => 200,
        //     'get_products_attributes' => $get_products_attributes
        // ]);
        // $attributes = Attribute::where('product_id',$edit_product->id)->first();
        // dd($attributes);
        $attribute = array(['attribute' => $request->attribute]);
        foreach ($request->all() as $key => $value) {

            for ($i = 0; $i < $request->list_count; $i++) {
                if ($key == 'attribute' . $i) {

                    array_push($attribute, [$key => $value]);
                }
            }
        }

        $attribute_values = array(['attribute_value' => $request->attribute_value]);
        foreach ($request->all() as $key => $value) {

            for ($i = 0; $i < $request->list_count; $i++) {
                if ($key == 'attribute_value' . $i) {

                    array_push($attribute_values, [$key => $value]);
                }
            }
        }

        function array_flatten($array)
        {
            if (!is_array($array)) {
                return false;
            }
            $result = array();
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $result = array_merge($result, array_flatten($value));
                } else {
                    $result = array_merge($result, array($key => $value));
                }
            }
            return $result;
        }


        function array_flatten_2($array)
        {
            if (!is_array($array)) {
                return false;
            }
            $result = array();
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $result = array_merge($result, array_flatten_2($value));
                } else {
                    $result = array_merge($result, array($key => $value));
                }
            }
            return $result;
        }

        $data = array_flatten($attribute);
        $array_values = array_flatten_2($attribute_values);

        $ids = [];
        foreach ($data as $key => $value) {
            $attributes = new Attribute();
            $attributes->product_id = $edit_product->id;
            $attributes->attribute = $value;
            $attributes->save();

            array_push($ids, $attributes->id);
        }



        $get_products_attributes = [];
        for ($x = 0; $x < count($ids); $x++) {

            $attr_values_data = '';

            if ($x == 0) {
                $attr_values_data = $array_values['attribute_value'];
            } else {
                $c = $x - 1;
                $attr_values_data = $array_values['attribute_value' . $c];
            }


            $explode_attr_val = explode(',', $attr_values_data);
            $find_record = Attribute::find($ids[$x]);
            for ($j = 0; $j < count($explode_attr_val); $j++) {
                $create_new = new Attribute();
                $create_new->product_id = $find_record->product_id;
                $create_new->attribute = $find_record->attribute;
                $create_new->attribute_value = $explode_attr_val[$j];
                $create_new->save();

                array_push($get_products_attributes, $create_new->toArray());
            }
            $find_record->delete();
        }
        $get_products_attributes =  Attribute::where('product_id', $edit_product->id)->get();
        // dd($get_products_attributes);
        return response()->json([
            'get_products_attributes' => $get_products_attributes,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function maincategory(Request $request)
    {
        $maincategory = MainCategory::where('parent_category_id', $request->id)->get();
        if (count($maincategory) > 0) {
            return response()->json([
                'status' => 200,
                'maincategory' => $maincategory
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function subcategory(Request $request)
    {
        $subcategory = SubCategory::where('main_category_id', $request->id)->get();
        if (count($subcategory) > 0) {
            return response()->json([
                'status' => 200,
                'subcategory' => $subcategory
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function brand(Request $request)
    {
        $brand = Brand::where('main_category_id', $request->id)->get();
        if (count($brand) > 0) {
            return response()->json([
                'status' => 200,
                'brand' => $brand
            ]);
        } else {
            return response()->json([
                'status' => 404,
            ]);
        }
    }

    public function status(Request $request, $id)
    {
        $product_status = Product::find($id);
        if ($product_status->status == 0) {
            $product_status->status = 1;
        } else {
            $product_status->status = 0;
        }
        $product_status ->save();
        $notification = array('message' => 'Product Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('product.index')->with($notification);
    }



    // /save stock
    public function savestock(Request $request, $id)
    {
        // dd($request->all());
        $id = $request->id;
        $qunatity = Attribute::where('id', $id)->first();
        $qunatity->stock = $request->stock;
        $qunatity->save();
        return response()->json([
            'status' => 200,
            'message' => 'stock saved'
        ]);
    }

    // save tags
    public function savetags(Request $request, $id)
    {
        // dd($request->all());
        $id = $request->id;
        $product_tags = Product::where('id', $id)->first();
        $product_tags->tags = $request->tags_value;
        $product_tags->save();
        return response()->json([
            'status' => 200,
            'message' => 'Tags saved'
        ]);
        $get_products = Product::latest()->first();
        return response()->json([
            'status' => 201,
            'get_products' => $get_products
        ]);
    }

    //  get last inserted  product id for saving tags
    public function getproduct(Request $request)
    {
        $get_products = Product::latest()->first();
        $get_products->tags = $request->tags;
        $get_products->save();
        return response()->json([
            'status' => 200,
            'get_products' => $get_products
        ]);
    }

    public function multipleimage(Request $request)
    {
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //    'image' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json(
        //         ['status' => 400, 'errors' => $validator->errors()->toArray()]
        //     );
        // }else {

        $id = $request->multiple_image_id;
        $multiple = Product::where('id', $id)->first();
        File::delete(public_path('products/' . $multiple->multiple_image));

        $images = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('products'), $name);
                $images[] = $name;
            }
        }
        $multiple->multiple_image = json_encode($images);
        $multiple->save();
        return response()->json([
            'status' => 200,
            'message' => 'Images saved successfully'
        ]);
        // }


    }
    public function singleimage(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'single_image' => 'required',
        //  ]);

        //  if ($validator->fails()) {
        //      return response()->json(
        //          ['status' => 400, 'errors' => $validator->errors()->toArray()]
        //      );
        //  }else {
        $id = $request->main_image_id;
        //  dd($id);
        $single = Product::where('id', $id)->first();
        File::delete(public_path('products/' . $single->image));
        if ($request->single_image) {
            $filename = time() . '.' . $request->single_image->extension();
            $request->single_image->move(public_path('products'), $filename);
            $single->image = $filename;
        }
        $single->save();
        return response()->json([
            'status' => 200,
            'message' => 'Product Main Image saved successfully'
        ]);
        //  }
    }

    public function destroy(Request $request, $id)
    {
        // return $id;
        $id = $id;
        $image_delete = Product::find($id);

        if(count(json_decode($image_delete->multiple_image)) > 0){
            for ($i=0; $i < count(json_decode($image_delete->multiple_image)); $i++) {

                File::delete(public_path('products/' . json_decode($image_delete->multiple_image)[$i]));
            }
        }
        File::delete(public_path('products/' . $image_delete->image));
        $product_delete  = Product::where('id', $id)->first();
        $product_delete->delete();
        $product_delete = ProductAttribute::where('product_id', $product_delete->id)->delete();
        $notification = array('message' => 'Product Deleted Successfully ! ', 'alert-type' => 'success');
        return redirect()->route('product.index')->with($notification);
    }
    public function updatestock(Request $request, $id)
    {
        $id = $request->id;
        $qunatity = Attribute::where('id', $id)->first();
        $qunatity->stock = $request->stock;
        $qunatity->save();
        return response()->json([
            'status' => 200,
            'message' => 'stock saved'
        ]);
    }



    public function remove_image(Request $request){
        // return $request->all();
        $update = null;
        $image = $request->img;
        if($request->product_type == 1){
            $del_image = Product::find($request->id);

            $images = json_decode($del_image->multiple_image);
            $newArr = array_filter($images, function($val) use($image) {

                return $val !== $image;

            });

            $array = [];
            foreach($newArr as $item){
                array_push($array, $item);
            }


            // $del_image->image = $array[0];
            $del_image->multiple_image = $array;
            $update = $del_image->save();
        }


        if($update){
            return response()->json([
            'status' => 200,
            'msg' => 'Image Deleted Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'msg' => 'Some thing went wrong',
            ]);
        }

    }


public function length()
{
    $lengths = Length::with('products')->get();
    return view('products.index', compact('lengths'));
}
}
