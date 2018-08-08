<?php

namespace App\Http\Controllers;
use App\OrderDetail;
use App\Http\Resources\OrderDetail as OrderDetailResource;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get OrderDetails
        $orderDetails = OrderDetail::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of OrderDetails as a resource
        return OrderDetailResource::collection($orderDetails);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderDetail = $request->isMethod('put') ? OrderDetail::findOrFail($request->id) : new OrderDetail;

        $orderDetail->id = $request->input('id');
        $orderDetail->quantity = $request->input('quantity');
        $orderDetail->amount = $request->input('amount');
        $orderDetail->menu_item_id = $request->input('menu_item_id');
        $orderDetail->order_id = $request->input('order_id');
        $orderDetail->enabled = $request->input('enabled');
        $orderDetail->created_by = $request->input('created_by');
        $orderDetail->updated_by = $request->input('updated_by');
        if($orderDetail->save()) {
            return new OrderDetailResource($orderDetail);
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
        // Get OrderDetail
        $orderDetail = OrderDetail::findOrFail($id);

        // Return single OrderDetail as a resource
        return new OrderDetailResource($orderDetail);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get OrderDetail
        $orderDetail = OrderDetail::findOrFail($id);

        if($orderDetail->delete()) {
            return new OrderDetailResource($orderDetail);
        }    
    }
}
