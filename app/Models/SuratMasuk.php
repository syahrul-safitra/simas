<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = ['no_surat', 'tanggal_surat', 'tanggal_diterima', 'sifat', 'isi_ringkas', 'file', 'status', 'keadaan', 'instansi_id'];

    // relation to instanasi belong to : 
    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    // relation one to one to Diteruskan :
    public function ditersukan()
    {
        return $this->hasOne(Diteruskan::class);
    }

    public function suratKeluar()
    {
        return $this->hasOne(SuratKeluar::class);
    }

    public function disposisi()
    {
        return $this->hasOne(Disposisi::class);
    }

    public function scopesurat_masuk_all($query)
    {
        return $query->count();
    }


    public function scopesurat_masuk_bulan_ini($query)
    {
        return $query->whereYear('tanggal_diterima', date('Y'))
            ->whereMonth('tanggal_diterima', date('m'))
            ->count();
    }
}
