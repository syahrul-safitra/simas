<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diteruskan extends Model
{
    use HasFactory;
    protected $fillable = ['surat_masuk_id', 'catatan'];

    // relation to kepada_user : one to many
    public function kepadaUser()
    {
        return $this->hasMany(KepadaUser::class);
    }

    // relation belong to surat masuk : 
    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
