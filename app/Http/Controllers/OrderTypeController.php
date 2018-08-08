<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\OrderType;
use App\Http\Resources\OrderType as OrderTypeResource;

class OrderTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get OrderTypes
        $orderTypes = OrderType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of OrderTypes as a resource
        return OrderTypeResource::collection($orderTypes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderTypes = $request->isMethod('put') ? OrderType::findOrFail($request->id) : new OrderType;

        $orderTypes->id = $request->input('id');
        $orderTypes->name = $request->input('name');
        if($orderTypes->save()) {
            return new OrderTypeResource($orderTypes);
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
        // Get OrderTypes
        $orderTypes = OrderType::findOrFail($id);

        // Return single OrderTypes as a resource
        return new OrderTypeResource($orderTypes);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get OrderTypes
        $orderTypes = OrderType::findOrFail($id);

        if($orderTypes->delete()) {
            return new OrderTypeResource($orderTypes);
        }    
    }
}
