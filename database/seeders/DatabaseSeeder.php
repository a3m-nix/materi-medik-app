<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        \App\Models\Pasien::factory()->create([
            'no_pasien' => Str::random(4),
            'nama' => 'test@example.com',
            'umur' => 'test@example.com',
            'jenis_kelamin' => 'test@example.com',
        ]);
    }
}
