<?php

namespace Database\Factories;

use App\Models\Outlet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'outlet_id' => Outlet::all()->random()->id,
            'jenis' => $this->faker->randomElement(['kaos', 'selimut', 'kiloan', 'bed_cover', 'lain']),
            'nama_paket' => $this->faker->sentence(2),
            'harga' => $this->faker->randomFloat(100000, 5000, 85000),
        ];
    }
}
