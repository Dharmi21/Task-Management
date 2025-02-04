<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use App\Http\Requests\StoreEmpRequest;
use App\Http\Requests\UpdateEmpRequest;
use App\Models\Department;
use App\Models\User;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dept = Department::get();
        $mid = User::get();
        $emp_id = User::get();

        return view('management.add_employee', ['depart' => $dept, 'manager_id' => $mid, 'employee_id' => $emp_id]);
        // return response()->json([
        //     'status'=>200,
        //     'data' => $emp_id,
        //     'data1'=>$dept
        // ], 200);
        // return response()->json([
        //     'status'=>200,

        //     'data1'=>$dept
        // ], 200);
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
    public function store(StoreEmpRequest $request)
    {
        // $data = $request->validate([
        //             'name' => $request->name,
        //             'email' => $request->email,
        //             'password' => $request->password,
        //         ]);
        $data = Emp::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'job_title' => $request->job,
            'department' => $request->department,
            'reporting_manager' => $request->manager,
        ]);
        $manager = $request->manager;
        $data = Emp::find($manager);
        $data->role = '1';
        $data->update();
        // dd($data);
        return redirect(route('employee.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Emp $emp)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($employee)
    {
        $employee_data = Emp::find($employee);
        return response()->json([
            'employee_data' => $employee_data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpRequest $request)
    {
        $id = $request->employee_id;
        $employee = Emp::find($id);

        $employee->department = $request->up_department;
        $employee->reporting_manager = $request->up_manager;
        $employee->job_title = $request->up_job;
        $employee->name = $request->up_name;
        $employee->email = $request->up_email;
        // dd($employee);
        $data = $employee->update();

        return redirect(route('employee.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emp $id)
    {
        $id->delete();
        return redirect(route('employee.index'));
        // $message="data is deleted";
        //  return response()->json([
        //     'status'=>200,
        //     'data' => $message,

        // ], 200);
    }
}
