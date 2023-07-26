<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_first_name' => fake()->firstName(),
            'employee_last_name' => fake()->lastName(),
            'employee_phone_number' => fake()->phoneNumber(),
            'company_id' => Arr::random(range(1, 30))
        ];
    }
}
