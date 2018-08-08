<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelType;
use App\Http\Resources\ModelTypeResource;

class ModelTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get modelTypes
        $modelTypes = ModelType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of modelTypes as a resource
        return ModelTypeResource::collection($modelTypes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelType = $request->isMethod('put') ? ModelType::findOrFail($request->id) : new ModelType;
        $modelType->id = $request->input('id');
        $modelType->account_id = $request->input('account_id');
        $modelType->type = $request->input('type');
        $modelType->comment = $request->input('comment');
        $modelType->created_by = $request->input('created_by');
        $modelType->updated_by = $request->input('updated_by');
        if($modelType->save()) {
            return new ModelTypeResource($modelType);
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
        // Get modelTypes
        $modelType = ModelType::findOrFail($id);

        // Return single modelTypes as a resource
        return new ModelTypeResource($modelType);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get modelTypes
        $modelType = ModelType::findOrFail($id);

        if($modelType->delete()) {
            return new ModelTypeResource($modelType);
        }    
    }
}
