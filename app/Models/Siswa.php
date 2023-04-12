<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\Kelas;

class Siswa extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'student';

    protected $fillable = [
        'nama',
        'kelas',
        'nis'
    ];

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'nama_kelas', 'kelas');
    }
}
