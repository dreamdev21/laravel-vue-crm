<?php

namespace App\Http\Controllers;
use App\MenuItem;
use App\Http\Resources\MenuItem as MenuItemResource;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get MenuItems
        $menuItems = MenuItem::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of MenuItems as a resource
        return MenuItemResource::collection($menuItems);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menuItem = $request->isMethod('put') ? MenuItem::findOrFail($request->id) : new MenuItem;

        $menuItem->id = $request->input('id');
        $menuItem->name = $request->input('name');
        $menuItem->description = $request->input('description');
        $menuItem->price = $request->input('price');
        $menuItem->menu_category_id = $request->input('menu_category_id');
        $menuItem->enabled = $request->input('enabled');
        $menuItem->created_by = $request->input('created_by');
        $menuItem->updated_by = $request->input('updated_by');
        if($menuItem->save()) {
            return new MenuItemResource($menuItem);
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
        // Get MenuItem
        $menuItem = MenuItem::findOrFail($id);

        // Return single MenuItem as a resource
        return new MenuItemResource($menuItem);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get MenuItem
        $menuItem = MenuItem::findOrFail($id);

        if($menuItem->delete()) {
            return new MenuItemResource($menuItem);
        }    
    }
}
