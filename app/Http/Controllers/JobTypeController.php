<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobType;
use App\Http\Resources\JobTypeResource;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get jobTypes
        $jobTypes = JobType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of jobTypes as a resource
        return JobTypeResource::collection($jobTypes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobType = $request->isMethod('put') ? JobType::findOrFail($request->id) : new JobType;

        $jobType->id = $request->input('id');
        $jobType->type = $request->input('type');
        $jobType->account_id = $request->input('account_id');
        $jobType->comment = $request->input('comment');
        $jobType->created_by = $request->input('created_by');
        $jobType->updated_by = $request->input('updated_by');
        
        if($jobType->save()) {
            return new JobTypeResource($jobType);
        }
    }
    /**
     * Display the specified resource.
     *$
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get jobTypes
        $jobType = JobType::findOrFail($id);

        // Return single jobTypes as a resource
        return new JobTypeResource($jobType);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get jobTypes
        $jobType = JobType::findOrFail($id);

        if($jobType->delete()) {
            return new JobTypeResource($jobType);
        }    
    }
}
