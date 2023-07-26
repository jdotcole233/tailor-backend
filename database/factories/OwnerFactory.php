<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_first_name' => fake()->firstName(),
            'owner_last_name' => fake()->lastName(),
            'owner_primary_phone_number' => fake()->phoneNumber(),
            'owner_secondary_phone_number' => fake()->phoneNumber(),
            'company_id' => Arr::random(range(1, 30))
        ];
    }
}
