<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\MataPelajaran;

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
        Kelas::factory(10)->create();
        Siswa::factory(25)->create();
        MataPelajaran::factory(15)->create();
    }
}
