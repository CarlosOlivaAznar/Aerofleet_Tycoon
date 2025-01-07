<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sede>
 */
class SedeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'aeropuerto_id' => rand(1, 10),
            'porcentajeVenta' => 0.00,
            'porcentajeComprado' => 0.00,
        ];
    }

    public function withUserId($userId)
    {
        return $this->state(function (array $attributes) use ($userId) {
            return [
                'user_id' => $userId,
                'aeropuerto_id' => rand(1, 30),
                'porcentajeVenta' => 0.00,
                'porcentajeComprado' => 0.00,
            ];
        });
    }

    public function withUserIdShares($userId)
    {
        return $this->state(function (array $attributes) use ($userId) {
            return [
                'user_id' => $userId,
                'aeropuerto_id' => rand(1, 30),
                'porcentajeVenta' => 0.20,
                'porcentajeComprado' => 0.00,
            ];
        });
    }
}
