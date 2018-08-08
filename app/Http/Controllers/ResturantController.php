<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resturant;
use App\Http\Resources\Resturant as ResturantResource;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Resturants
        $resturants = Resturant::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of Resturants as a resource
        return ResturantResource::collection($resturants);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resturant = $request->isMethod('put') ? Resturant::findOrFail($request->id) : new Resturant;

        $resturant->id = $request->input('id');
        $resturant->name = $request->input('name');
        $resturant->address = $request->input('address');
        $resturant->phone = $request->input('phone');
        $resturant->email = $request->input('email');
        $resturant->enabled = $request->input('enabled');
        $resturant->created_by = $request->input('created_by');
        $resturant->updated_by = $request->input('updated_by');
        
        if($resturant->save()) {
            return new ResturantResource($resturant);
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
        // Get Resturants
        $resturant = Resturant::findOrFail($id);

        // Return single Resturants as a resource
        return new ResturantResource($resturant);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get Resturants
        $resturant = Resturant::findOrFail($id);

        if($resturant->delete()) {
            return new ResturantResource($resturant);
        }    
    }
}
