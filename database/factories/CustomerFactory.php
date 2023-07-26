<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = ['MALE', 'FEMALE'];

        return [
            'customer_first_name' => fake()->firstName(),
            'customer_last_name' => fake()->lastName(),
            'customer_primary_phone_number' => fake()->phoneNumber(),
            'customer_secondary_phone_number' => fake()->phoneNumber(),
            'dob' => fake()->date('Y-m-d'),
            'gender' => $gender[Arr::random(range(0, 1))],
            'company_id' => Arr::random(range(1, 30))
        ];
    }
}
