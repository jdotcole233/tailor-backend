<?php

use App\Http\Controllers\api\v1\CompanyController;
use App\Http\Controllers\api\v1\CustomerController;
use App\Http\Controllers\api\v1\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('tailor')->group(function () {
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('employees',  'index');
        Route::post('employees',  'store');
        Route::put('employees/{id}',  'update');
    });
    Route::controller(CompanyController::class)->group(function () {
        Route::get('companies', 'index');
        Route::get('company/{id}', 'show');
        Route::put('companies/{id}', 'update');
    });
    Route::controller(CustomerController::class)->group(function () {
        Route::get('customers', 'index');
        Route::get('customers/{id}', 'show');
        Route::post('customers', 'store');
        Route::put('customers/{id}', 'update');
    });
});


// Public routes
Route::post('companies',[CompanyController::class, 'store']);





