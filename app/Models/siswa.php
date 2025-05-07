<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function wali()
    {
        return $this->belongsTo(WaliMurid::class, 'id_wali');
    }

    protected $fillable = [
        'nis',
        'nama_siswa',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'id_kelas',
        'id_wali',
    ];    
}