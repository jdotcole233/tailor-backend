<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CustomerJob>
 */
class CustomerJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $job_type = ["Shirt", "Suit", "Trousers", "Shorts"];
        $date = fake()->dateTime();
        $unit_price = Arr::random(range(100, 350));
        $qty = Arr::random(range(1, 10));
        $payment_status = ['PAID', "UNPAID", "PART PAYMENT"];
        $mode_of_payment = ['CASH', 'MOBILE MONEY', 'CHEQUE', 'BANK TRANSFER'];

        return [
            'customer_id' => Arr::random(range(1, 40)),
            'job_type' => $job_type[Arr::random(range(0, count($job_type) - 1))],
            'start_date' => $date->format('Y-m-d'),
            'completion_date' =>  $date->format('Y-m-d'),
            'quantity' => $qty,
            'unit_price' => $unit_price, 
            'customer_job_price' => $qty * $unit_price,
            'payment_status' =>  $payment_status[Arr::random(range(0, count($payment_status) - 1))],
            'mode_of_payment' => $mode_of_payment[Arr::random(range(0, count($mode_of_payment) - 1))]
        ];
    }
}
