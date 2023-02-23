<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'PHP'
        ]);

        Skill::create([
            'name' => 'Laravel'
        ]);

        Skill::create([
            'name' => 'Excel'
        ]);

        Skill::create([
            'name' => 'JavaScript'
        ]);

        Skill::create([
            'name' => 'HTML'
        ]);

        Skill::create([
            'name' => 'CSS'
        ]);

        Skill::create([
            'name' => 'Comunicação'
        ]);

        Skill::create([
            'name' => 'TeleMarketing'
        ]);

        Skill::create([
            'name' => 'React'
        ]);

        Skill::create([
            'name' => 'Negócios'
        ]);

        Skill::create([
            'name' => 'Desenvolvimento Web'
        ]);

        Skill::create([
            'name' => 'Desenvolvimento Back-End'
        ]);

        Skill::create([
            'name' => 'Desenvolvimento Front-End'
        ]);

        Skill::create([
            'name' => 'Designer Gráfico'
        ]);

        Skill::create([
            'name' => 'Robôtica'
        ]);

        Skill::create([
            'name' => 'Computação em Nuvem'
        ]);

        Skill::create([
            'name' => 'Analise e Desenvolvimento de Sistemas'
        ]);

        Skill::create([
            'name' => 'Liderança'
        ]);

        Skill::create([
            'name' => 'Administração'
        ]);

        Skill::create([
            'name' => 'Mídias Sociais'
        ]);

        Skill::create([
            'name' => 'Design'
        ]);

        Skill::create([
            'name' => 'Edição de Vídeo'
        ]);
    }
}
