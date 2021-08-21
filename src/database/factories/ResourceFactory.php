<?php

namespace Database\Factories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResourceFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'institution_id' => 1,
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'barcode' => $this->faker->isbn13,
            'format' => array_rand(array_keys(Resource::FORMATS)),
        ];
    }
}