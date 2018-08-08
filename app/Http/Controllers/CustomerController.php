<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Http\Resources\Customer as CustomerResource;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get customers
        $customers = Customer::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of customers as a resource
        return CustomerResource::collection($customers);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = $request->isMethod('put') ? Customer::findOrFail($request->id) : new Customer;

        $customer->id = $request->input('id');
        $customer->name = $request->input('name');
        $customer->address = $request->input('address');
        $customer->phone = $request->input('phone');
        $customer->enabled = $request->input('enabled');
        $customer->created_by = $request->input('created_by');
        $customer->updated_by = $request->input('updated_by');
        if($customer->save()) {
            return new CustomerResource($customer);
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
        // Get customer
        $customer = Customer::findOrFail($id);

        // Return single customer as a resource
        return new CustomerResource($customer);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get customer
        $customer = Customer::findOrFail($id);

        if($customer->delete()) {
            return new CustomerResource($customer);
        }    
    }
}
