<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    public function run(): void
    {
        $this -> createDefaultUserRecrutador();
        $this -> createDefaultUserCandidato();
        $this -> createUsers(4);
    }
     public function createDefaultUserRecrutador(){
        Usuarios::factory()->create([
            'name' => 'Teste-Teste',
            'email' => 'teste@gmail.com',
            'senha' => Hash::make('admin123'),
            'recrutador' => 'sim',
        ]);
    }
     public function createDefaultUserCandidato(){
        Usuarios::factory()->create([
            'name' => 'Teste-candidato',
            'email' => 'testecandidato@gmail.com',
            'senha' => Hash::make('user123'),
            'recrutador' => 'não',
        ]);
    }
    public function createUsers($amount = 1){
        Usuarios::factory($amount)->create();
    }
}
