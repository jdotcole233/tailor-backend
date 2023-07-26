<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $media_name = fake()->name();

        $social_media_handle = [
            'facebook' => $media_name,
            'twitter' => $media_name,
            'instagram' => $media_name,
            'linkedIn' => $media_name,
        ];

        return [
            'company_name' => fake()->company(),
            'address_street' => fake()->streetAddress(),
            'suburb' => 'Accra',
            'region' => 'Greater Accra',
            'country' => 'Ghana',
            'primary_phone_number' => fake()->phoneNumber(),
            'secondary_phone_number' => fake()->phoneNumber(),
            'social_media_handles' => json_encode($social_media_handle)
        ];
    }
}
