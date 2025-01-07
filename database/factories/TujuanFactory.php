<?php
namespace Database\Factories;
use App\Models\Tujuan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TujuanFactory extends Factory
{
    protected $model = Tujuan::class;

    public function definition()
    {
        return [
            'nama_tujuan' => $this->faker->city,
            'desc_tujuan' => $this->faker->sentence,
            'ticket_price' => $this->faker->numberBetween(10000, 100000),
        ];
    }
}
