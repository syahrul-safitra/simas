<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepadaUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'diteruskan_id',
        'user_id'
    ];

    // relation belong to diteruskan : 
    public function diteruskan()
    {
        return $this->belongsTo(Diteruskan::class);
    }

    // relation belong to user :
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
