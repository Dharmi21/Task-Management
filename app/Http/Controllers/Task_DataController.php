<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;


use Illuminate\Http\Request;

class Task_DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task_data=Task::where('emp_id',auth()->id())->get();
        $data=User::where('id',auth()->id())->get();


        return view('user.task_manage.task_data',['data'=>$data,'task_data'=>$task_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function file_upload(Request $request)
    {
        // $request->validate([
        //     'file_upload' => 'required',
        // ]);

        $id = $request->id;
        $file = Task::find($id);
        $file->task_file=$request->file('file_upload')->store('file_upload', 'public');
        $file->status = '1';



        $data = $file->update();
        // dd($data);
        return redirect(route('task_data.index'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $task_id = Task::find($id);
        return response()->json([

            'task_id' => $task_id
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
