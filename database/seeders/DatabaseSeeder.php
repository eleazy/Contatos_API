<?php

namespace Database\Seeders;

use App\Models\Contato;
use App\Models\Empresa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar 3 empresas
        for ($i = 1; $i <= 3; $i++) {
            Empresa::factory()->create();
        }
        $empresas = Empresa::all();

        // Criar 2 contatos para cada empresa
        foreach ($empresas as $empresa) {
            for ($i = 1; $i < 3; $i++) {              
                Contato::factory()->create([
                    'empresa_id' => $empresa->id,
                ]);
            }
        }
             
    }
}
