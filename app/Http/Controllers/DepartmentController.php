<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::get();
        return view('management.add_department', ['department_id' => $department]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create([
            'name' => $request->name,

        ]);
        // dd($data);
        return redirect(route('department.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($department)
    {
        $department = Department::find($department);
        return response()->json([

            'department' => $department,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request)
    {
        $id = $request->dept_id;
        $department = Department::find($id);
        $department->name = $request->dept_name;
        $data = $department->update();

        return redirect(route('department.index'));

        // $data = $request->validate([
        //     'dept_name' => ['required'],
        // ]);
        // $data['name'] = strip_tags($data['dept_name']);

        // $data1 = $id->update($data);
        // // dd($data1);
        // return redirect(route('department.index'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $id)
    {
        $id->delete();

        return redirect(route('department.index'));
    }
}
