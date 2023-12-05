<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = ['no_surat', 'tanggal_surat', 'tanggal_diterima', 'file', 'status', 'instansi_id'];
}
