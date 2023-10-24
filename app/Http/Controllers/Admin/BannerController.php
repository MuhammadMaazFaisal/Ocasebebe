<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Banner;
use Illuminate\Support\Facades\File;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners  = Banner::all();
        return view('admin_dashboard.banners.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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

        $banners = Banner::find($id);
        // return $banners;
        return view('admin_dashboard.banners.edit',compact('banners'));
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
        $validation_rule = [
            'title' => 'required',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $banners = Banner::find($id);
        if ($request->hasFile('image')) {
            File::delete(public_path('banner/'. $banners->image));
        }

        $banners->title = $request->title;
        $banners->section = $request->section;
        $banners->button_title = $request->button_title;
        $banners->button_link = $request->button_link;
        $banners->description = $request->description;


        if($request->image){
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('banner'), $filename);
            $banners->image = $filename;
        }


        $banners->save();
        $notification = array('message' => 'Page Content Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->route('banner.index')->with($notification);
    }
}
