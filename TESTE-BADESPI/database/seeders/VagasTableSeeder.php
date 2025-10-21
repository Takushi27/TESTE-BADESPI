<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vagas;
use Illuminate\Support\Facades\Hash;

class VagasTableSeeder extends Seeder
{
    public function run(): void
    {
        $this -> createDefaulVaga();
        $this -> createDefaultVaga2();
        $this -> createVagas(100);
    }
     public function createDefaulVaga(){
        Vagas::factory()->create([
            'name' => 'Desenvolvedor Front-End Júnior',
            'quantidade' => '2',
            'tipo' => 'CLT',
            'descrição' => 'Estamos em busca de um desenvolvedor front-end júnior com conhecimento em HTML, CSS, JavaScript e frameworks como React ou Vue. Espera-se que o candidato tenha boa comunicação, senso estético e vontade de aprender novas tecnologias.',
            'empresa' => 'TechNova Soluções Digitais',
            'salario' => '3200.00',
            'recrutadorid' => 1,
        ]);
    }
     public function createDefaultVaga2(){
        Vagas::factory()->create([
            'name' => 'Designer Gráfico Freelancer',
            'quantidade' => '3',
            'tipo' => 'Freelancer',
            'descrição' => 'Procuramos um designer gráfico criativo para criação de materiais digitais e impressos (posts, banners, e-books). Conhecimentos em Adobe Photoshop, Illustrator e noções de branding são essenciais. A vaga é por projeto, com possibilidade de prorrogação conforme desempenho.',
            'empresa' => 'Criativando Comunicação',
            'salario' => '2000.00',
            'recrutadorid' => 1,
        ]);
    }
    public function createVagas($amount = 1){
        Vagas::factory($amount)->create();
    }
}
