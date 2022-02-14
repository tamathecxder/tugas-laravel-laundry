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
            'id_outlet' => Outlet::all()->random()->id,
            'jenis' => $this->faker->randomElement(['kaos', 'selimut', 'kiloan', 'bed_cover', 'lain']),
            'nama_paket' => $this->faker->sentence(1),
            'harga' => $this->faker->numberBetween(round($min = 5000, $max = 60000)),
        ];
    }
}
