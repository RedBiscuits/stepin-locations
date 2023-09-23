<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole('admin');
        });
    }
}
