<?php

namespace Database\Factories;

use App\Models\Patron;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatronFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patron::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'phone' => $this->faker->phoneNumber,
            'barcode' => $this->faker->unique()->isbn13,
            'preferred_contact' => rand(0,1),
        ];
    }
}