<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data=auth()->user();
        // $data = User::where('id', auth()->id())->get();
        $emp = User::where('reporting_manager', auth()->id())->get();
        $task_data = Task::where('manager_id', auth()->id())->get();

        return view('user.task_manage.assign_task', ['data' => $data, 'employee_id' => $emp, 'task_data' => $task_data]);
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
    public function store(Request $request)
    {
        $data = Task::create([
            'emp_id' => $request->employee,
            'task' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'manager_id' => auth()->id(),

        ]);
        // dd($data);
        return redirect(route('task.index'));
    }

    public function file_upload(Request $request)
    {
        // $request->validate([
        //     'file_upload' => 'required',
        // ]);

        $id = $request->id;
        $file = Task::find($id);
        $file->task_file = $request->file('file_upload')->store('file_upload', 'public');
        $file->status = '1';



        $data = $file->update();
        // dd($data);
        return redirect(route('task.index'));
    }
    /**
     * Display the specified resource.
     */


    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $task_id = Task::find($id);
        // $task_id->file = $request->file('file_upload')->store('file', 'public');
        // $data = $task_id->update();

        return response()->json([

            'task_id' => $task_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $id = $request->id;
        $file = Task::find($id);
        $file->task = $request->up_task_name;
        $file->emp_id = $request->up_employee;
        $file->description = $request->up_description;
        $file->due_date = $request->up_due_date;
        $data = $file->update();
        // dd($data);
        return redirect(route('task.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
