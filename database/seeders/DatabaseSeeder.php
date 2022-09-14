<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Branch::create([
            'name' => 'Quantum Ponsel Tasikmalaya',
            'latitude' => '-7.323331268356305',
            'longitude' => '108.22083081389607',
        ]);

        \App\Models\Branch::create([
            'name' => 'Quantum Ponsel Cianjur',
            'latitude' => '-6.808886089926793',
            'longitude' => '107.14875022939675',
        ]);

        \App\Models\Branch::create([
            'name' => 'Quantum Ponsel Sukabumi',
            'latitude' => '-6.92284878272647',
            'longitude' => '106.93705899767912',
        ]);

    }
}
