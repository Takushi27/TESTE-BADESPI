<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Usuarios;

class Vagas extends Model
{
    use HasFactory;
    
    public function recrutador(){

        return $this->belongsTo(Usuarios::class, 'recrutadorid');

    }
     public function candidaturas()
    {
        return $this->hasMany(\App\Models\Candidaturas::class, 'vagaid');
    }
}
