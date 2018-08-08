<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpareType;
use App\Http\Resources\SpareTypeResource;

class SpareTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get SpareTypes
        $spareTypes = SpareType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of SpareTypes as a resource
        return SpareTypeResource::collection($spareTypes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spareType = $request->isMethod('put') ? SpareType::findOrFail($request->id) : new SpareType;

        $spareType->id = $request->input('id');
        $spareType->account_id = $request->input('account_id');
        $spareType->type = $request->input('type');
        $spareType->comment = $request->input('comment');
        $spareType->created_by = $request->input('created_by');
        $spareType->updated_by = $request->input('updated_by');
        
        if($spareType->save()) {
            return new SpareTypeResource($spareType);
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
        // Get SpareTypes
        $spareType = SpareType::findOrFail($id);

        // Return single SpareTypes as a resource
        return new SpareTypeResource($spareType);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get SpareTypes
        $spareType = SpareType::findOrFail($id);

        if($spareType->delete()) {
            return new SpareTypeResource($spareType);
        }    
    }
}
