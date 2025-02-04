<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit($keyword_v)
    {



        $search = Emp::where('name', 'LIKE',  "%{$keyword_v}%")->orwhere('last_name',  'LIKE',  "%{$keyword_v}%")->orwhere('middle_name',  'LIKE',  "%{$keyword_v}%")->orwhere('city',  'LIKE',  "%{$keyword_v}%")->orwhere('job_title',  'LIKE',  "%{$keyword_v}%")->get();


        if (count($search) > 0) {

            foreach ($search as $data) {
                $search_data = '   <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="profile-picture-container ">
                                    <img src="/storage/' . $data->profile_photo . '" alt="" style="width: 46px; height: 46px"
                                        class="rounded-circle" id="photo" />

                                </div>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                <div class="ml-20 z-index-0">
                                    <div class="d-flex">
                                       <a href="/employee_summary/'.$data->id.' " class="text-decoration-none" style="font-style:Proxima Nova"> <div id="name" style="font-size: 14px;font-style:Proxima Nova"
                                            class="name card-title text-uppercase">'
                    . $data->name .
                    '</div></a>

                                    </div>
                                    <div class="d-flex">
                                        <p class="card-title job" id="job">'
                    . $data->job_title . '</p>

                                    </div>
                                    <div class="d-flex">
                                        EMPNO:<p id="id" class="card-title">' . $data->id . ' |' . $data->dept->name . ' </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
              ';
            }
        }


        return response()->json([
            'search' => $search_data,

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
