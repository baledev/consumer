<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Branch;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $now = Carbon::now();

        Branch::truncate();

        Branch::insert([
            [
                'name' => 'Quantum Ponsel Tasikmalaya',
                'latitude' => '-7.323331268356305',
                'longitude' => '108.22083081389607',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Quantum Ponsel Cianjur',
                'latitude' => '-6.808886089926793',
                'longitude' => '107.14875022939675',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Quantum Ponsel Sukabumi',
                'latitude' => '-6.92284878272647',
                'longitude' => '106.93705899767912',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
