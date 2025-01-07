<?php
namespace Database\Factories;
use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    protected $model = Kendaraan::class;

    public function definition()
    {
        return [
            'nama_kendaraan' => $this->faker->company,
            'desc_kendaraan' => $this->faker->sentence,
            'cost_kendaraan' => $this->faker->numberBetween(5000, 50000),
        ];
    }
}