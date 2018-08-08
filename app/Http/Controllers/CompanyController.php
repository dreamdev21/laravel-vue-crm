<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Location;
use App\Http\Resources\CompanyResource;

class CompanyController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get companies
        $companies = Company::orderBy('created_at', 'desc')->paginate(15);

        // Return collection of companies as a resource
        return CompanyResource::collection($companies);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = $request->isMethod('put') ? Company::findOrFail($request->id) : new Company;
        $company->id = $request->input('id');
        $company->account_id = $request->input('account_id');
        $company->name = $request->input('name');
        $company->website = $request->input('website');
        $company->address = $request->input('address');
        $company->post_code = $request->input('post_code');
        $company->type = $request->input('type');
        $company->phone_number = $request->input('phone_number');
        $company->image = $request->input('image');
        $company->is_parent = $request->input('is_parent');
        $company->is_enable = $request->input('is_enable');
        $company->created_by = $request->input('created_by');
        $company->updated_by = $request->input('updated_by');
        if($company->save()) {
            return new CompanyResource($company);
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
        // Get companies
        $company = Company::with('user','location')->findOrFail($id);

        // Return single companies as a resource
        return new CompanyResource($company);
    }


    public function getCustomers()
    {
        $companies = Company::where('type', 'Customer')->get();
        return response()->json(['Companies' => $companies]);
    }
    public function getDistributors()
    {
        $companies = Company::where('type', 'Distributors')->get();
        return response()->json(['Companies' => $companies]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get companies
        $company = Company::findOrFail($id);

        if($company->delete()) {
            return new CompanyResource($company);
        }    
    }
}
