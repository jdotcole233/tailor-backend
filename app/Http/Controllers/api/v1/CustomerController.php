<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerDataRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::where('company_id', 5)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerDataRequest $request)
    {
        $validated = $request->validated();
        DB::transaction(function () use (&$customer, $validated) {
            $customer = Customer::create($validated);
        });

        return response()->json([
            'data' => $customer,
            'message' => 'Created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Customer::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerDataRequest $request, string $id)
    {
        $validated = $request->validated();
        DB::transaction(function () use (&$customer, $validated, $id) {
            $customer = Customer::find($id)->update($validated + ['company_id' => 1]);
        });

        return response()->json([
            'data' => $customer,
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
