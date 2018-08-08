<?php

namespace App\Http\Controllers;
use App\DiningTableStatus;
use App\Http\Resources\DiningTableStatus as DiningTableStatusResource;
use Illuminate\Http\Request;

class DiningTableStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get DiningTableStatuss
        $diningTableStatuses = DiningTableStatus::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of DiningTableStatuss as a resource
        return DiningTableStatusResource::collection($diningTableStatuses);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diningTableStatus = $request->isMethod('put') ? DiningTableStatus::findOrFail($request->id) : new DiningTableStatus;

        $diningTableStatus->id = $request->input('id');
        $diningTableStatus->name = $request->input('name');
        $diningTableStatus->enabled = $request->input('enabled');
        $diningTableStatus->created_by = $request->input('created_by');
        $diningTableStatus->updated_by = $request->input('updated_by');
        if($diningTableStatus->save()) {
            return new DiningTableStatusResource($diningTableStatus);
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
        // Get DiningTableStatuss
        $diningTableStatus = DiningTableStatus::findOrFail($id);

        // Return single DiningTableStatuss as a resource
        return new DiningTableStatusResource($diningTableStatus);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get DiningTableStatuss
        $diningTableStatus = DiningTableStatus::findOrFail($id);

        if($diningTableStatus->delete()) {
            return new DiningTableStatusResource($diningTableStatus);
        }    
    }
}
