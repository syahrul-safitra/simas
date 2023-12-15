<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat'];

    // Relation to SuratMasuk one to one;
    public function suratMasuk()
    {
        return $this->hasMany(SuratMasuk::class);
    }

    // public function suratKeluar()
    // {
    //     return $this->hasMany(SuratKeluar::class, 'tujuan', 'id');
    // }
}
