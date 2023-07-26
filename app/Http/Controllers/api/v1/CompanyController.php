<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyDataRequest;
use App\Models\Company;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Company::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyDataRequest $request)
    {

        DB::transaction(function () use (&$created, $request) {

            $validated = $request->validated();

            $owner = ['owner_first_name', 'owner_last_name',
            'owner_primary_phone_number', 'owner_secondary_phone_number'];

            $company_only = collect($validated)->except($owner + ['password']);
            $owner_only =  collect($validated)->only($owner);
            
            $company = Company::create($company_only->all());
            $owner = Owner::create($owner_only->all() + ['company_id' => $company->id]);

            $created = User::create([
                'phone_number' => $owner_only['owner_primary_phone_number'],
                'password' => Hash::make($validated['password']),
                'clientable_id' => $owner->id,
                'clientable_type' => 'App\Models\Owner'
            ]);
        });
    
    
        return response()->json([
            'data' => $created,
            'message' => 'Company created successfully'
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::find($id);//->with('owners', 'customers', 'employees');
        return response()->json([
            'data' => $company,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'company_name' => 'string|required',
            'address_street' => 'string|nullable',
            'suburb' => 'string|required',
            'region' => 'string|required',
            'country' => 'string|required', 
            'company_logo' => 'nullable',
            'social_media_handles' => 'string|nullable',
            'primary_phone_number' => 'string|required|max:24',
            'secondary_phone_number' => 'string|nullable',
        ]);

        DB::transaction(function () use ($validated, $id, &$company) {
            $company = Company::find($id)->update($validated);
        });

        return response()->json([
            'data' => $company, 
            'message' => 'Updated successfully'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
