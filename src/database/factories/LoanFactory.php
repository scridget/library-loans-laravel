<?php

namespace Database\Factories;

use App\Constants\Loan as LoanConstants;
use App\Models\Institution;
use App\Models\Loan;
use App\Models\Patron;
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
            'patron_id' => Patron::factory(),
            'institution_id' => Institution::factory(),
            'nre_id' => $this->faker->unique()->numberBetween(1000000,9999999),
            'binder_pocket' => rand(1,50),
            'title' => $this->faker->sentence(rand(1,7)),
            'internal_barcode' => $this->faker->unique()->isbn13,
            'external_barcode' => $this->faker->unique()->isbn13,
            'requested_at' => $this->faker->dateTimeBetween('-60 days', 'now'),
        ];
    }
}