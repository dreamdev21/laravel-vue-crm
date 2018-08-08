<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ResturantMenu;
use App\Http\Resources\ResturantMenu as ResturantMenuResource;

class ResturantMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get ResturantMenus
        $resturantMenus = ResturantMenu::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of ResturantMenus as a resource
        return ResturantMenuResource::collection($resturantMenus);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resturantMenu = $request->isMethod('put') ? ResturantMenu::findOrFail($request->id) : new ResturantMenu;

        $resturantMenu->id = $request->input('id');
        $resturantMenu->version = $request->input('version');
        if($resturantMenu->save()) {
            return new ResturantMenuResource($resturantMenu);
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
        // Get ResturantMenu
        $resturantMenu = ResturantMenu::findOrFail($id);

        // Return single ResturantMenu as a resource
        return new ResturantMenuResource($resturantMenu);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get ResturantMenu
        $resturantMenu = ResturantMenu::findOrFail($id);

        if($resturantMenu->delete()) {
            return new ResturantMenuResource($resturantMenu);
        }    
    }
}
