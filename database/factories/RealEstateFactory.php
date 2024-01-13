<?php

namespace Database\Factories;
use App\Models\RealEstate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstate>
 */
class RealEstateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = RealEstate::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'real_state_type' => $this->faker->randomElement(['house', 'department', 'land', 'commercial_ground']),
            'street' => $this->faker->streetName(),
            'external_number' => $this->faker->numerify('###'),
            'internal_number' => $this->faker->optional()->numerify('##'),
            'neighborhood' => $this->faker->words(2, true),
            'city' => $this->faker->city(),
            'country' => $this->faker->countryCode(),
            'rooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->randomFloat(2, 1, 3),
            'comments' => $this->faker->optional()->text(128)
        ];
    }
}

