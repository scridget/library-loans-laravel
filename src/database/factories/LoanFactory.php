<?php

namespace Database\Factories;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Loan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => rand(1,6),
            'format' => rand(1,2),
            'binder_pocket' => rand(1,50),
            'title' => $this->faker->title,
            'internal_barcode' => $this->faker->isbn13,
            'external_barcode' => $this->faker->isbn13,
        ];
    }
}