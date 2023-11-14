<?php



namespace App\Http\Controllers\Admin;

use App\Http\Requests\User as RequestsUser;

use App\Http\Requests\EditUser as RequestsEditUserr;



use App\Http\Controllers\Controller;

use App\Models\User;

use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

use Illuminate\Support\Str;



class UserController extends Controller

{

    public function index(){

        $users = User::where('role','!=' ,1)->get();

        return view('admin_dashboard.users.index',compact('users'));

    }

    public function create(){

        return view('admin_dashboard.users.create');

    }

    public function store(RequestsUser $request){

        $user = $request->validated();

         $check_user = User::where('email',$request->email)->first();

         if(!empty($check_user)){

              $notification = array('message' => 'User with this email already exist! ', 'alert-type' => 'error');

              return back()->with($notification);

         }

             // for break date

        // $dateofbirth = $request->date;

        // $date = Carbon::parse($dateofbirth);

        // $day = $date->day;

        // $month = $date->month;

        // $year = $date->year;

        // end



        $user = new User();

        $user->first_name = $request->first_name;

        $user->last_name = $request->last_name;

        $user->name = $request->first_name." ".$request->last_name;

        $user->email = $request->email;

        $user->user_name = $request->user_name;

        $user->slug = Str::slug($request->first_name." ".$request->last_name,"-");

        $user->password = Hash::make($request->password);

        $user->business_information = $request->business_information;

        $user->business_license = $request->business_license;

        // $user->date_of_birth = $request->date_of_birth;

        $user->month = $request->month;

        $user->day = $request->day;

        $user->year = $request->year;

        $user->gender = $request->gender;

        $user->role = 2;

        $user->status = 1;

         if($request->business_license_copy){

            $filename = time() . '.' . $request->business_license_copy->extension();

            $request->business_license_copy->move(public_path('business_licenses'), $filename);

            $user->business_license_copy = $filename;

         }

          if($request->profile_image){

            $filename = time() . '.' . $request->profile_image->extension();

            $request->profile_image->move(public_path('profiles'), $filename);

            $user->profile_image = $filename;

          }

        $user->save();

        $notification = array('message' => 'User Created Successfully! ', 'alert-type' => 'success');

        return redirect()->route('user-index')->with($notification);



    }

    public function edit($id){



        $countries  = Country::get();

        $states = State::get();

        $cities = City::get();



         $users = User::find($id);



        // user state city

        $user_state_data = [];

        if(!empty($user_address)){



            foreach ($states as $state){

                if($user_address->state_id == $state->id){

                    $user_state_data['id'] = $state->id;

                    $user_state_data['name'] = $state->name;

                    $user_state_data['country_id'] = $state->country_id;

                }

            }

        }





        // user save city

        $user_city_data = [];

        if(!empty($user_address)){



            foreach ($cities as $city){

                if($user_address->city_id == $city->id){

                    $user_city_data['id'] = $city->id;

                    $user_city_data['name'] = $city->name;

                    $user_city_data['state_id'] = $city->state_id;

                }

            }

        }





        return view('admin_dashboard.users.edit',get_defined_vars());

    }



    public function show(Request $request,$id){

        $detail = User::where('id',$id)->first();

        return view('admin_dashboard.users.detail',get_defined_vars());

    }

    public function update(RequestsEditUserr $request ,$id){

        $user = $request->validated();

        $user = User::find($id);

        $user->first_name = $request->first_name;

        $user->last_name = $request->last_name;

        $user->name = $request->first_name." ".$request->last_name;

        $user->email = $request->email;

        $user->user_name = $request->user_name;

        $user->slug = Str::slug($request->first_name." ".$request->last_name,"-");

        if(empty($request->password)){

            $user->password = $request->prev_password;

        }else {

            $user->password = Hash::make($request->password);

        }

        $user->professional_details = $request->professional_details;

        $user->cosmetology_license_number = $request->cosmetology_license_number;

        $user->month = $request->month;

        $user->day = $request->day;

        $user->year = $request->year;

        $user->gender = $request->gender;

        $user->role = 2;

        $user->status = 1;

        if($request->extension_certification_image){

            $filename = time() . '.' . $request->extension_certification_image->extension();

            $request->extension_certification_image->move(public_path('business_licenses'), $filename);

            $user->extension_certification_image = $filename;

        }

        if($request->profile_image){

            $filename = time() . '.' . $request->profile_image->extension();

            $request->profile_image->move(public_path('profiles'), $filename);

            $user->profile_image = $filename;

        }

        $user->save();

        $notification = array('message' => 'User Updated Successfully! ', 'alert-type' => 'success');

        return redirect()->route('user-index')->with($notification);

    }

    public function delete(Request $request){

        $id = $request->id;

        $user = User::where('id', $id)->first();

        $user->delete();

        return response()->json(['status'=>'200']);



    }

    public function status(Request $request,$id){

        $user_status = User::find($id);

        if($user_status->status == 0){

            $user_status->status =1;

        }else {

            $user_status->status =0;

        }

        $user_status->save();

        $notification = array('message' => 'User Status Updated Successfully! ', 'alert-type' => 'success');

        return redirect()->route('user-index')->with($notification);

    }



}

