<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserDetailsRequest;
use App\Models\User;
use App\Models\UserDetails;
use Faker\Provider\UserAgent;
use Illuminate\Http\Request;

class Profile_Details_Controller extends Controller
{
    public function index()
    {
        $data = User::where('id', auth()->id())->get();
        return view('user.profile.profile_detail', ['employe_data' => $data]);
    }
    public function update(Request $request)
    {
        $id = $request->e_profile_id;
        $employee = User::find($id);
        $employee->last_name = $request->e_last_name;
        $employee->middle_name = $request->e_middle_name;
        $employee->gender = $request->e_gender;
        $employee->date_of_birth = $request->e_date_of_birth;
        $employee->phone_no = $request->e_phone_no;
        $employee->city = $request->e_city;


        // dd($employee);
        $data = $employee->update();

        return redirect(route('profile_details.index'));
    }
    public function edit($profile_detail)
    {
        $profile = User::find($profile_detail);
        // $name = $profile->user_name->name;
        return response()->json([
            // 'name' => $name,
            'profile' => $profile
        ]);
    }
    public function profile_photo_update(Request $request)
    {
        $id = $request->pro_id;
        $profile = User::find($id);
        $profile->profile_photo = $request->file('profile_photo')->store('profile', 'public');
        $data = $profile->update();
        return redirect(route('profile_details.index'));
    }

    public function employee_summary(Request $request, $id)
    {

        // $search_value = $request->search;
        // if ($search_value !== null) {
        //     $search_data = User::where('name', $search_value)->get('id');
        //     $data = UserDetails::where('employee', $search_data)->get();
        //     return view('user.employee.about', ['emp_data' => $data]);
        // } else {
            $data = User::where('id', $id)->get();
            return view('user.employee.about', ['emp_data' => $data]);
        // }
    }
}
