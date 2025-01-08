<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tujuan;
use App\Models\Kendaraan;
use App\Models\Jadwal;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(10)->create();
        Tujuan::factory(10)->create();
        Kendaraan::factory(10)->create();
        Jadwal::factory(10)->create();
        Ticket::factory(10)->create();
    }
}