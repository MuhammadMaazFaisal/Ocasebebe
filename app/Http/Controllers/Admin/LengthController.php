<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Length as RequestsLength;
use App\Models\Admin\Length;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class LengthController extends Controller
{
   public function index()
   {
       $length = Length::all();

    return view('admin_dashboard.length.index', compact('length'));
   }

   public function create()
   {
    return view('admin_dashboard.length.create');
   }
   public function store(RequestsLength $request)
   {
    // dd($request->all());
       $validatedData = $request->validated();


    $existingRecord = Length::where('name', $validatedData['name'])->first();
    if ($existingRecord) {
        $notification = ['message' => 'Length Already Exists!', 'alert-type' => 'error'];
        return redirect()->back()->with($notification);
    }


       $length = new Length();
       $length->name = $validatedData['name'];
       $length->status = 1;
       $length->save();

       $notification = ['message' => 'Length Added Successfully!', 'alert-type' => 'success'];
       return redirect()->route('admin.length')->with($notification);
   }

public function edit($id)
{

$length = Length::find($id);
return view('admin_dashboard.length.edit', compact('length'));
}

public function update(RequestsLength $request, $id)
{
    $validatedData = $request->validated();

    $length = Length::find($id);
    $length->name = $validatedData['name'];
    $length->status = 1;
    $length->update();

    $notification = ['message' => 'Length Updated Successfully!', 'alert-type' => 'success'];
    return redirect()->route('admin.length')->with($notification);
}

public function destroy($id)
    {
        $length = Length::find($id);

        if ($length) {
            $length->delete();
            $notification = ['message' => 'Length delete Successfully!', 'alert-type' => 'success'];
            return redirect()->route('admin.length')->with($notification);
        }
        $notification = ['message' => 'Length delete Successfully!', 'alert-type' => 'success'];
        return redirect()->route('admin.length')->with($notification);
    }

public function status(Request $request, $id) {
    $length_status = Length::find($id);
    if ($length_status->status == 0) {
        $length_status->status = 1;
    } else {
        $length_status->status = 0;
    }
    $length_status->save();
    $notification = array('message' => 'Length Status Updated Successfully!', 'alert-type' => 'success');
    return redirect()->route('admin.length')->with($notification);


}

public function stock_status(Request $request, $id) {
    $stock_status = Length::find($id);
    if ($stock_status->stock == 0) {
        $stock_status->stock = 1;
    } else {
        $stock_status->stock = 0;
    }
    $stock_status->save();
    $notification = array('message' => 'Length Stock Status Updated Successfully!', 'alert-type' => 'success');
    return redirect()->route('admin.length')->with($notification);


}



}



