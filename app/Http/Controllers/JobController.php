<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Http\Resources\JobResource;

class JobController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get jobs
        $jobs = Job::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of jobs as a resource
        return JobResource::collection($jobs);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = $request->isMethod('put') ? Job::findOrFail($request->id) : new Job;
        $job->id = $request->input('id');
        $job->account_id = $request->input('account_id');
        $job->company_id = $request->input('company_id');
        $job->contact_id = $request->input('contact_id');
        $job->asset_id = $request->input('asset_id');
        $job->type = $request->input('type');
        $job->cost_labour = $request->input('cost_labour');
        $job->material_labour = $request->input('material_labour');
        $job->hours = $request->input('hours');
        $job->status_id = $request->input('status_id');
        $job->comment = $request->input('comment');
        $job->description = $request->input('description');
        $job->priority_id = $request->input('priority_id');
        $job->inspection_id = $request->input('inspection_id');
        $job->created_by = $request->input('created_by');
        $job->updated_by = $request->input('updated_by');
        if($job->save()) {
            return new JobResource($job);
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
        // Get jobs
        $job = Job::findOrFail($id);

        // Return single jobs as a resource
        return new JobResource($job);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get jobs
        $job = Job::findOrFail($id);

        if($job->delete()) {
            return new JobResource($job);
        }    
    }
}
