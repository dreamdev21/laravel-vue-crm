<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Http\Resources\LocationResource;

class LocationController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get locations
        $locations = Location::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of locations as a resource
        return LocationResource::collection($locations);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = $request->isMethod('put') ? Location::findOrFail($request->id) : new Location;

        $location->id = $request->input('id');
        $location->account_id = $request->input('account_id');
        $location->user_id = $request->input('user_id');
        $location->company_id = $request->input('company_id');
        $location->address = $request->input('address');
        $location->post_code = $request->input('post_code');
        $location->phone_number = $request->input('phone_number');
        $location->created_by = $request->input('created_by');
        $location->updated_by = $request->input('updated_by');
        
        if($location->save()) {
            return new LocationResource($location);
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
        // Get locations
        $location = Location::findOrFail($id);

        // Return single locations as a resource
        return new LocationResource($location);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get locations
        $location = Location::findOrFail($id);

        if($location->delete()) {
            return new LocationResource($location);
        }    
    }
}
