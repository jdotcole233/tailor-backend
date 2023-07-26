<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Customer;
use App\Models\CustomerJob;
use App\Models\CustomerMeasurement;
use App\Models\Employee;
use App\Models\Owner;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

            Company::factory(10)
            ->has(Owner::factory()->has(User::factory())->count(10))
            ->has(Customer::factory()->has(CustomerJob::factory(10))->has(CustomerMeasurement::factory(10))->count(40))
            ->has(Employee::factory()->has(User::factory())->count(10))
            ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
