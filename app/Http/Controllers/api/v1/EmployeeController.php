<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeDataRequest;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employee::with(['user'])->where('company_id', 1)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeDataRequest $request)
    {
        $validated = $request->validated();
        // Get authenticated user
        $phone_number = $request->safe()->employee_phone_number;
        $company_name = "";
        $validated['company_id'] = 1;

       DB::transaction(function () use ($validated, $phone_number, &$employee_created) {
            $employee_created = Employee::create($validated);
            $user = User::create([
                'phone_number' => $phone_number,
                'password' => Hash::make("password"),
                'clientable_id' => $employee_created->id,
                'clientable_type' => "App\Models\Employee"
            ]);
       });

        return $employee_created;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Employee::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeDataRequest $request, string $id)
    {
        $validated = $request->validated();
        $employee = Employee::find($id)->update($validated);
        return response()->json([
            'data' => $validated,
            'message' => 'Operation completed successfully'
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
