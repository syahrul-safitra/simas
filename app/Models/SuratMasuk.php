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
}
