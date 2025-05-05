<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliMurid extends Model
{
    protected $table = 'wali_murid';
    protected $fillable = ['nama_wali', 'kontak'];
}