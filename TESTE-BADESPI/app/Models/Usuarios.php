<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Candidaturas;


class Usuarios extends Authenticatable
{

     use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'name',
        'email',
        'senha',
        'recrutador',
    ];
    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function getAuthPassword()
    {
        return $this->senha;
    }
    public function candidaturas()
    {
        return $this->hasMany(Candidaturas::class, 'candidatoid');
    }
}