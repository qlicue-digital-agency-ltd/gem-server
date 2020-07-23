<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function getCompanies()
    {
        // Get companies
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);

        // Return collection of companies as a resource
        return response()->json(['companies' => $companies]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        if ($request->hasFile('file')) {
            $this->path = $request->file('file')->store('company');
        } else {
            return response()->json(['message' => 'Please add an Image',  'status' => false], 404);
        }

        $company = new Company;

        $company->name = $request->input('name');
        $company->address = $request->input('address');
        $company->phone = $request->input('phone');
        $company->email = $request->input('email');
        $company->logo = $this->path;

        $company->save();

        return response()->json(['company' => $company]);;
    }

    public function putCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => false], 404);
        }

        $company = Company::findOrFail($request->project_id);

        $company->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),

        ]);
        return response()->json(['company' => $company]);;
    }

    public function deleteCompany($id)
    {
        // Get company
        $company = Company::findOrFail($id);
        if (!$company) {
            return response()->json(['message' => 'company not found', 'status' => false], 404);
        }
        if ($company->delete()) {
            return response()->json(['message' => 'comapany deleted successfully']);;
        }
    }
}
