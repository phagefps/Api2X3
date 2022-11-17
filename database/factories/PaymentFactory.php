<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payments>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),            
            'status' => $status = fake()->randomElement(['paid', 'pending']), // paid, pending
            'client_id' => rand(1, 10),
            'created_at' => $payment_date = fake()->dateTimeBetween($startDate = '-3 month', $endDate = '-1 month'),
            'updated_at' => null,
            'expires_at' => \Carbon\Carbon::parse($payment_date)->addMonth()->format('Y-m-d H:i:s'),
            'payment_date' => ($status == "paid") ? \Carbon\Carbon::parse($payment_date)->addDay(15)->format('Y-m-d H:i:s') : null
        ];
    }
}
