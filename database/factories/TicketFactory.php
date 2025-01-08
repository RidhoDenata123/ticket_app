<?php
namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Tujuan;
use App\Models\Kendaraan;
use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition()
    {
        return [
            'id_user' => User::inRandomOrder()->first()->id,
            'kode_tujuan' => Tujuan::inRandomOrder()->first()->kode_tujuan,
            'kode_jadwal' => Jadwal::inRandomOrder()->first()->kode_jadwal,
            'kode_kendaraan' => Kendaraan::inRandomOrder()->first()->kode_kendaraan,
            'ticket_price' => $this->faker->numberBetween(10000, 100000),
            'cost_kendaraan' => $this->faker->numberBetween(5000, 50000),
            'total_tagihan' => function (array $attributes) {
                return $attributes['ticket_price'] + $attributes['cost_kendaraan'];
            },
            'tgl_order' => $this->faker->date(),
            'tgl_bayar' => $this->faker->optional()->date(),
            'status_ticket' => $this->faker->randomElement(['paid', 'unpaid']),
            'kode_verifikasi' => strtoupper($this->faker->unique()->lexify('??????')),
        ];
    }
}