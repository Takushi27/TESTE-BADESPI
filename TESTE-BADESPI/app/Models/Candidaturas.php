<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vagas;
use App\Models\Usuarios;

class Candidaturas extends Model
{
    protected $table = 'candidaturas';

    public function vaga()
    {
        return $this->belongsTo(Vagas::class, 'vagaid');
    }

    public function candidato()
    {
        return $this->belongsTo(Usuarios::class, 'candidatoid');
    }
}
