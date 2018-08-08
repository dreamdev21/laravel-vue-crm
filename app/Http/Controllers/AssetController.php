<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Http\Resources\AssetResource;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get assets
        $assets = Asset::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of assets as a resource
        return AssetResource::collection($assets);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset = $request->isMethod('put') ? Asset::findOrFail($request->id) : new Asset;
        $asset->id = $request->input('id');
        $asset->account_id = $request->input('account_id');
        $asset->company_id = $request->input('company_id');
        $asset->name = $request->input('name');
        $asset->asset_type = $request->input('asset_type');
        $asset->agent_id = $request->input('agent_id');
        $asset->serial = $request->input('serial');
        $asset->bmb = $request->input('bmb');
        $asset->location = $request->input('location');
        $asset->status = $request->input('status');
        $asset->description = $request->input('description');
        $asset->comment = $request->input('comment');
        $asset->created_by = $request->input('created_by');
        $asset->updated_by = $request->input('updated_by');
        if($asset->save()) {
            return new AssetResource($asset);
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
        // Get assets
        $asset = Asset::findOrFail($id);

        // Return single assets as a resource
        return new AssetResource($asset);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get assets
        $asset = Asset::findOrFail($id);

        if($asset->delete()) {
            return new AssetResource($asset);
        }    
    }
}
