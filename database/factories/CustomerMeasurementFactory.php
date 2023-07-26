<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerMeasurement>
 */
class CustomerMeasurementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $job_type = ["Shirt", "Suit", "Trousers", "Shorts"];

        $male_shirt = [
            'shirt_burst' => Arr::random(range(20, 45)),
            'shirt_waist' => Arr::random(range(20, 45)),
            'shirt_hip' => Arr::random(range(20, 45)),
            'shirt_shoulder' => Arr::random(range(20, 45)),
            'shirt_sleeve' => Arr::random(range(20, 45)),
            'shirt_arm_cuff' => Arr::random(range(20, 45)),
            'shirt_collar_length' => Arr::random(range(20, 45)),
        ];


        $male_trousers = [
            'trousers_length' => Arr::random(range(20, 45)),
            'trousers_thighs' => Arr::random(range(20, 45)),
            'trousers_knee' => Arr::random(range(20, 45)),
            'trousers_ankle' => Arr::random(range(20, 45)),
            'trousers_waist' => Arr::random(range(20, 45)),
        ];

        $randoms = Arr::random(range(0, 3));
        $job_types = $male_trousers;

        if (in_array($randoms, [0, 1]))
        {
            $job_types =  $male_shirt;
        }

        return [
            'customer_id' => Arr::random(range(1, 40)),
            'measurement_value' => json_encode($job_types)
        ];
    }
}
