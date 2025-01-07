<?php
namespace Database\Factories;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    protected $model = Jadwal::class;

    public function definition()
    {
        return [
            'jam_berangkat' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'jam_tiba' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'desc_jadwal' => $this->faker->sentence,
        ];
    }
}
