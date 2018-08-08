<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Priority;
use App\Http\Resources\PriorityResource;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get priorities
        $priorities = Priority::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of priorities as a resource
        return PriorityResource::collection($priorities);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $priority = $request->isMethod('put') ? Priority::findOrFail($request->id) : new Priority;
        $priority->id = $request->input('id');
        $priority->account_id = $request->input('account_id');
        $priority->name = $request->input('name');
        $priority->comment = $request->input('comment');
        $priority->created_by = $request->input('created_by');
        $priority->updated_by = $request->input('updated_by');
        if($priority->save()) {
            return new PriorityResource($priority);
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
        // Get priorities
        $priority = Priority::findOrFail($id);

        // Return single priorities as a resource
        return new PriorityResource($priority);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get priorities
        $priority = Priority::findOrFail($id);

        if($priority->delete()) {
            return new PriorityResource($priority);
        }    
    }
}
