<?php

namespace App\Http\Controllers;
use App\SectionType;
use App\Http\Resources\SectionType as SectionTypeResource;
use Illuminate\Http\Request;

class SectionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get SectionTypes
        $sectionTypes = SectionType::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of SectionTypes as a resource
        return SectionTypeResource::collection($sectionTypes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sectionType = $request->isMethod('put') ? SectionType::findOrFail($request->id) : new SectionType;

        $sectionType->id = $request->input('id');
        $sectionType->name = $request->input('name');
        $sectionType->enabled = $request->input('enabled');
        $sectionType->created_by = $request->input('created_by');
        $sectionType->updated_by = $request->input('updated_by');
        if($sectionType->save()) {
            return new SectionTypeResource($sectionType);
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
        // Get SectionTypes
        $sectionType = SectionType::findOrFail($id);

        // Return single SectionTypes as a resource
        return new SectionTypeResource($sectionType);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get SectionTypes
        $sectionType = SectionType::findOrFail($id);

        if($SectionType->delete()) {
            return new SectionTypeResource($sectionType);
        }    
    }
}
