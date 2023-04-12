<?php

namespace App\Http\Controllers;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Ini Siswa',
            'token_CSRF' => csrf_token()
        ]);
    }

    public function ListSiswa()
    {
        $semuaSiswa = Siswa::select('nama', 'kelas')->get();

        return response()->json($semuaSiswa);
    }

    private function HitungNilaiRapor($rapor)
    {
        $nilaiAkhir = 0;
        foreach ($rapor as $key => $nilai)
        {
            if (str_contains($key, 'latihan')) {
                $nilaiAkhir += (0.15 * ($nilai / 4));
            } else if (str_contains($key, 'harian')) {
                $nilaiAkhir += (0.2 * ($nilai / 2));
            } else if (str_contains($key, 'tengah')) {
                $nilaiAkhir += (0.25 * $nilai);
            } else if (str_contains($key, 'akhir')) {
                $nilaiAkhir += (0.4 * $nilai);
            }
        }
        return $nilaiAkhir;
    }

    public function DetailSiswa(int $noInduk)
    {
        $siswa = Siswa::where('nomor_induk_siswa', $noInduk)->first();

        if (!$siswa) {
            return response()->json([
                'error' => 'Siswa tidak ditemukan!'
            ]);
        } else {
            $raporSiswaMat = $this->HitungNilaiRapor($siswa->nilai_mata_pelajaran[0]['detail_nilai']);
            $raporSiswaBI = $this->HitungNilaiRapor($siswa->nilai_mata_pelajaran[1]['detail_nilai']);
            $raporSiswaBIng = $this->HitungNilaiRapor($siswa->nilai_mata_pelajaran[2]['detail_nilai']);
            $raporSiswaIPA = $this->HitungNilaiRapor($siswa->nilai_mata_pelajaran[3]['detail_nilai']);
            $raporSiswaIPS = $this->HitungNilaiRapor($siswa->nilai_mata_pelajaran[4]['detail_nilai']);

            $nilai = array(
                $siswa->nilai_mata_pelajaran[0]['nama_mapel'] => $raporSiswaMat,
                $siswa->nilai_mata_pelajaran[1]['nama_mapel'] => $raporSiswaBI,
                $siswa->nilai_mata_pelajaran[2]['nama_mapel'] => $raporSiswaBIng,
                $siswa->nilai_mata_pelajaran[3]['nama_mapel'] => $raporSiswaIPA,
                $siswa->nilai_mata_pelajaran[4]['nama_mapel'] => $raporSiswaIPS
            );

            return response()->json([
                'detail_siswa' => array_diff_key($siswa->toArray(), array_flip(['nilai_mata_pelajaran', 'updated_at', 'created_at'])),
                'nilai_siswa' => $nilai
            ]);
        }
    }

    public function DetailNilaiSiswa(int $noInduk)
    {
        $siswa = Siswa::where('nomor_induk_siswa', $noInduk)->get(['nama_siswa', 'kelas', 'rapor_mata_pelajaran']);

        if ($siswa->isEmpty()) {
            return response()->json([
                'error' => 'Siswa tidak ditemukan!'
            ]);
        } else {
            return response()->json([
                'detail_siswa_dan_nilai_mapel' => $siswa
            ]);
        }
    }

    public function UpdateNilaiSiswa(Request $request)
    {
        $post = $request->all();

        $validator = Validator::make($post, [
            'nomor_induk_siswa' => 'required|numeric',
            'nama_mapel' => 'required',
            'jenis_ujian' => 'required',
            'nilai' => 'required|numeric|max:100'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->getMessages();
            return response()->json([
                'error' => $errors
            ]);
        } else {
            $errorMessage = '';
            $validatedData = $validator->validated();
            $siswaModel = Siswa::where('nomor_induk_siswa', (int)$validatedData['nomor_induk_siswa'])->first();

            if (!$siswaModel) {
                return response()->json([
                    'error' => 'Siswa tidak ditemukan!'
                ]);
            } else {
                $siswa = $siswaModel->toArray();

                for ($i=0; $i<5; $i++) 
                { 
                    if ($siswa['rapor_mata_pelajaran'][$i]['nama_mapel'] == $validatedData['nama_mapel']) 
                    {
                        foreach ($siswa['rapor_mata_pelajaran'][$i]['detail_nilai'] as $key => $value) 
                        {
                            if ($key == $validatedData['jenis_ujian']) 
                            {
                                $siswa['rapor_mata_pelajaran'][$i]['detail_nilai'][$key] = (float)$validatedData['nilai'];
                                
                                $siswaModel->rapor_mata_pelajaran = $siswa['rapor_mata_pelajaran'];
                                $siswaModel->save();

                                return response()->json([
                                    'message' => 'Data nilai siswa telah diperbarui',
                                    'data_nilai' => $validatedData
                                ]);
                            } else {
                                $errorMessage = 'Ujian tidak valid!';
                                continue;                                    
                            }
                        }
                        break;
                    } else {
                        $errorMessage = 'Mapel tidak tersedia!';
                        continue;
                    }
                }
                return response()->json([
                    'error' => $errorMessage
                ]);
            }
        }
    }
}