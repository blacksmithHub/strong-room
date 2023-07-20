<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'login_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
            'email_address' => $this->faker->userName() . '@' . $this->faker->freeEmailDomain(),
            'phone_number' => $this->faker->phoneNumber()
        ];
    }
}
