<?php

namespace Database\Seeders;

use App\Models\OpportunityType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpportunityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OpportunityType::create([
            'name' => 'Integral'
        ]);

        OpportunityType::create([
            'name' => 'Efetivo/CLT'
        ]);

        OpportunityType::create([
            'name' => 'Meio Período'
        ]);

        OpportunityType::create([
            'name' => 'Aprendiz'
        ]);

        OpportunityType::create([
            'name' => 'Autônomo'
        ]);

        OpportunityType::create([
            'name' => 'Estágio'
        ]);

        OpportunityType::create([
            'name' => 'Temporário'
        ]);
    }
}
