<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diteruskan extends Model
{
    use HasFactory;

    protected $fillable = ['surat_masuk_id', 'users'];
}
