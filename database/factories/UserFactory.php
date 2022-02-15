<?php

namespace Database\Factories;

use App\Models\Outlet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'id_outlet' => Outlet::all()->random()->id,
            // 'jenis' => $this->faker->randomElement(['kaos', 'selimut', 'kiloan', 'bed_cover', 'lain']),
            // 'nama_paket' => $this->faker->sentence(1),
            // 'harga' => round($this->faker->numberBetween($min = 5000, $max = 60000)),

            // default password = password
            // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            // 'nama' => $this->faker->name(),
            // 'email' => $this->faker->email(),
            // 'username' => $this->faker->userName(),
            // 'id_outlet' => Outlet::all()->random()->id,
            // 'role' => $this->faker->randomElement(['admin', 'kasir', 'owner']),
            // 'email_verified_at' => now(),
            // 'password' => bcrypt('password'),
            // 'remember_token' => Str::random(10),


            // OWNER
            'nama' => 'The Bossman',
            'email' => 'owner@example.com',
            'username' => 'owner',
            'id_outlet' => 1,
            'role' => 'owner',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
