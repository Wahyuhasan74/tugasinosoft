<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->name(),
            'kelas' => fake()->randomElement(['1A', '1B', '1C', '2A', '2B', '2C', '3A', '3B', '3C', '4A', '4B', '4C', '5A', '5B', '5C', '6A', '6B', '6C']),
            'nis' => fake()->numberBetween(200000000, 999999999),
            'nilai_mata_pelajaran' => [
                [
                    'nama_mapel' => 'Matematika',
                    'jenis_kurikulum' => 'K13',
                    'detail_nilai' => [
                        'latihan_soal_1' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_2' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_3' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_4' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_1' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_2' => fake()->randomFloat(1, 40, 100),
                        'ulangan_tengah_semester' => fake()->randomFloat(1, 40, 100),
                        'ulangan_akhir_semester' => fake()->randomFloat(1, 40, 100)
                    ]
                ],
                [
                    'nama_mapel' => 'Bahasa Indonesia',
                    'jenis_kurikulum' => 'K13',
                    'detail_nilai' => [
                        'latihan_soal_1' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_2' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_3' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_4' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_1' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_2' => fake()->randomFloat(1, 40, 100),
                        'ulangan_tengah_semester' => fake()->randomFloat(1, 40, 100),
                        'ulangan_akhir_semester' => fake()->randomFloat(1, 40, 100)
                    ]
                ],
                [
                    'nama_mapel' => 'Bahasa Inggris',
                    'jenis_kurikulum' => 'K13',
                    'detail_nilai' => [
                        'latihan_soal_1' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_2' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_3' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_4' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_1' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_2' => fake()->randomFloat(1, 40, 100),
                        'ulangan_tengah_semester' => fake()->randomFloat(1, 40, 100),
                        'ulangan_akhir_semester' => fake()->randomFloat(1, 40, 100)
                    ]
                ],
                [
                    'nama_mapel' => 'IPA',
                    'jenis_kurikulum' => 'K13',
                    'detail_nilai' => [
                        'latihan_soal_1' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_2' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_3' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_4' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_1' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_2' => fake()->randomFloat(1, 40, 100),
                        'ulangan_tengah_semester' => fake()->randomFloat(1, 40, 100),
                        'ulangan_akhir_semester' => fake()->randomFloat(1, 40, 100)
                    ]
                ],
                [
                    'nama_mapel' => 'IPS',
                    'jenis_kurikulum' => 'K13',
                    'detail_nilai' => [
                        'latihan_soal_1' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_2' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_3' => fake()->randomFloat(1, 40, 100),
                        'latihan_soal_4' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_1' => fake()->randomFloat(1, 40, 100),
                        'ulangan_harian_2' => fake()->randomFloat(1, 40, 100),
                        'ulangan_tengah_semester' => fake()->randomFloat(1, 40, 100),
                        'ulangan_akhir_semester' => fake()->randomFloat(1, 40, 100)
                    ]
                ]
            ]
        ];
    }
}
