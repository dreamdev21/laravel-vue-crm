<?php

namespace App\Http\Controllers;
use App\MenuCategory;

use App\Http\Resources\MenuCategory as MenuCategoryResource;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get MenuCategorys
        $menuCategories = MenuCategory::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of MenuCategorys as a resource
        return MenuCategoryResource::collection($menuCategories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menuCategory = $request->isMethod('put') ? MenuCategory::findOrFail($request->id) : new MenuCategory;

        $menuCategory->id = $request->input('id');
        $menuCategory->name = $request->input('name');
        $menuCategory->resturant_menu_id = $request->input('resturant_menu_id');
        $menuCategory->enabled = $request->input('enabled');
        $menuCategory->created_by = $request->input('created_by');
        $menuCategory->updated_by = $request->input('updated_by');
        if($menuCategory->save()) {
            return new MenuCategoryResource($menuCategory);
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
        // Get MenuCategory
        $menuCategory = MenuCategory::findOrFail($id);

        // Return single MenuCategory as a resource
        return new MenuCategoryResource($menuCategory);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get MenuCategory
        $menuCategory = MenuCategory::findOrFail($id);

        if($menuCategory->delete()) {
            return new MenuCategoryResource($menuCategory);
        }    
    }
}
