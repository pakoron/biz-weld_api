<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'company_name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'zip' => $this->faker->numberBetween(1000000, 9999999),
            'country' => $this->faker->countryCode,
            'address' => $this->faker->address,
            'description' => $this->faker->sentence,
        ];
    }
}
