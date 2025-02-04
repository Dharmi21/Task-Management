<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use App\Http\Requests\StoreUserDetailsRequest;
use App\Http\Requests\UpdateUserDetailsRequest;
use App\Models\Department;
use App\Models\User;

class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dept = Department::get();
        $mid = User::get();
        $emp_id = User::get();
        // $detail = UserDetails::get();
        return view('management.add_details', ['dept' => $dept, 'manager_id' => $mid, 'employee_id' => $emp_id]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDetailsRequest $request)
    {
        $data =User::create([
            'name' => $request->name,
            'email' => $request->email_id,
            'job_title' => $request->job,

            'department' => $request->department,
            'reporting_manager' => $request->manager,
        ]);
        // $manager = $request->manager;
        // $data = User::find($manager);
        // $data->role = '1';
        // $data->update();
        dd($data);
        // return redirect(route('details.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDetails $userDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($detail)
    {
        $details = UserDetails::find($detail);
        return response()->json([
            'details' => $details,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserDetailsRequest $request)
    {
        $id = $request->emp_id;
        $detail = UserDetails::find($id);
        $detail->employee = $request->emp;
        $detail->department = $request->dept;
        $detail->reporting_manager = $request->rp_manager;
        $detail->job_title = $request->job_title;
        $detail->update();

        return redirect(route('details.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDetails $id)
    {
        $id->delete();
        return redirect(route('details.index'));
    }
}
