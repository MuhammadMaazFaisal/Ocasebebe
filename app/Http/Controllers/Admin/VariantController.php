<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Variant;
use App\Models\Admin\Attribute;
use App\Models\Admin\AttributeValue;

use App\Http\Requests\Variant as RequestsVariant;

class VariantController extends Controller
{

    function __construct()
    {
 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $variants = Attribute::with('get_attr')->get();
        // return $variants;
        // foreach($variants as $val){

        //     foreach ($val->get_attr as $attr){
        //         return $attr;

        //     }
        // }

        return view('admin_dashboard.variants.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.variants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsVariant $request)
    {

        $variant = $request->validated();

        $variant = new Attribute();
        $variant->attribute_name = $request->attribute_name;
        $variant->status = 1;
        $variant->save();

        $notification = array('message' => 'Attribute Added Successfully! ', 'alert-type' => 'success');
        return redirect()->route('variants.index')->with($notification);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $variants = Attribute::find($id);
        return view('admin_dashboard.variants.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


         $variants = Attribute::find($id);
         $variants->attribute_name = $request->attribute_name;
         $variants->save();
         $notification = array('message' => 'Attribute Updated Successfully! ', 'alert-type' => 'success');
         return redirect()->route('variants.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variant = Attribute::where('id',$id)->first();
        $attr_values  = AttributeValue::where('attribute_id',$variant->id)->first();
        if(($attr_values)){
            $attr_values->delete();
        }
        $variant->delete();
        $notification = array('message' => 'Attribute Deleted Successfully! ', 'alert-type' => 'success');
        return redirect()->route('variants.index')->with($notification);

    }

    public function status(Request $request,$id){
        $variants_status = Attribute::find($id);
        if($variants_status->status == 0){
            $variants_status->status = 1;
        }else {
            $variants_status->status = 0;
        }
        $variants_status->save();
        $notification = array('message' => 'Attribute Status Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('variants.index')->with($notification);
    }
}
