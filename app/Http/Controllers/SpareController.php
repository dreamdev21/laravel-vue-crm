<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spare;
use App\Http\Resources\SpareResource;

class SpareController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get spares
        $spares = Spare::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of spares as a resource
        return SpareResource::collection($spares);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spare = $request->isMethod('put') ? spare::findOrFail($request->id) : new spare;
        $spare->id = $request->input('id');
        $spare->account_id = $request->input('account_id');
        $spare->company_id = $request->input('company_id');
        $spare->manufacturer_id = $request->input('manufacturer_id');
        $spare->asset_id = $request->input('asset_id');
        $spare->spare_type = $request->input('spare_type');
        $spare->name = $request->input('name');
        $spare->serial = $request->input('serial');
        $spare->cost = $request->input('cost');
        $spare->status = $request->input('status');
        $spare->minimum_stock = $request->input('minimum_stock');
        $spare->current_stock = $request->input('current_stock');
        $spare->image = $request->input('image');
        $spare->description = $request->input('description');
        $spare->comment = $request->input('comment');
        $spare->created_by = $request->input('created_by');
        $spare->updated_by = $request->input('updated_by');
        if($spare->save()) {
            return new spareResource($spare);
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
        // Get spares
        $Spare = Spare::findOrFail($id);

        // Return single spares as a resource
        return new SpareResource($Spare);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get spares
        $Spare = Spare::findOrFail($id);

        if($Spare->delete()) {
            return new SpareResource($Spare);
        }    
    }
}
