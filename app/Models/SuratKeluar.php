<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_klasifikasi',
        'tanggal_surat_keluar',
        'sifat',
        'isi',
        'file',
        'tujuan',
        'surat_masuk_id'
    ];

    // relation 
    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'tujuan');
    }

    public function scopeseluruh_surat($query)
    {
        return $query->count();
    }

    public function scopesurat_keluar_bulan_ini($query)
    {
        return $query->whereYear('tanggal_surat_keluar', date('Y'))
            ->whereMonth('tanggal_surat_keluar', date('Y'))
            ->count();
    }
}
