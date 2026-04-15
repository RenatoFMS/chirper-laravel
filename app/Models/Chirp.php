<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    // Isso autoriza o Laravel a gravar a mensagem no banco
    protected $fillable = ['message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}