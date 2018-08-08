<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
   
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get users
        $users = User::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of users as a resource
        return UserResource::collection($users);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->isMethod('put') ? User::findOrFail($request->id) : new User;
        $user->id = $request->input('id');
        $user->account_id = $request->input('account_id');
        $user->company_id = $request->input('company_id');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request['password']);
        $user->phone_number = $request->input('phone_number');
        $user->is_user = $request->input('is_user');
        $user->key_contact = $request->input('key_contact');
        $user->contact_type = $request->input('contact_type');
        $user->image = $request->input('image');
        $user->created_by = $request->input('created_by');
        $user->updated_by = $request->input('updated_by');
        if($user->save()) {
            return new UserResource($user);
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
        // Get users
        $user = User::findOrFail($id);

        // Return single users as a resource
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get users
        $user = User::findOrFail($id);

        if($user->delete()) {
            return new UserResource($user);
        }    
    }
}
