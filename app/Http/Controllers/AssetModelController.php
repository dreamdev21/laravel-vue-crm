<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetModel;
use App\Http\Resources\AssetModelResource;

class AssetModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get assetModels
        $assetModels = AssetModel::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of assetModels as a resource
        return AssetModelResource::collection($assetModels);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assetModel = $request->isMethod('put') ? AssetModel::findOrFail($request->id) : new AssetModel;
        $assetModel->id = $request->input('id');
        $assetModel->account_id = $request->input('account_id');
        $assetModel->name = $request->input('name');
        $assetModel->type = $request->input('type');
        $assetModel->rent = $request->input('rent');
        $assetModel->frequency = $request->input('frequency');
        $assetModel->minimum_stock = $request->input('minimum_stock');
        $assetModel->current_stock = $request->input('current_stock');
        $assetModel->image = $request->input('image');
        $assetModel->description = $request->input('description');
        $assetModel->comment = $request->input('comment');
        $assetModel->created_by = $request->input('created_by');
        $assetModel->updated_by = $request->input('updated_by');
        if($assetModel->save()) {
            return new AssetModelResource($assetModel);
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
        // Get assetModels
        $assetModel = AssetModel::findOrFail($id);

        // Return single assetModels as a resource
        return new AssetModelResource($assetModel);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get assetModels
        $assetModel = AssetModel::findOrFail($id);

        if($assetModel->delete()) {
            return new AssetModelResource($assetModel);
        }    
    }
}
