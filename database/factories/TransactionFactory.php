<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 month', '-1 day'),
            'wallet_id' => $this->faker->numberBetween(1, 3),
            'badge_id' => 1,
            'account_id' => 2,
            'title' => $this->faker->word(),
            'description' => $this->faker->text(50),
            'type' => Arr::random(['Input', 'Output', 'Transfer']),
            'modality' => Arr::random(['Permanent', 'Extraordinary', 'Common']),
            'amount' => $this->faker->randomFloat(2, 1, 3500),
            'created_at' => $this->faker->dateTimeBetween('-1 month', '-1 day'),
        ];
    }
}
