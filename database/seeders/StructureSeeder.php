<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Structures')->insert([
            [
                'nom_complet' => 'Sante Yalla',
                'adresse' => 'medina plateau',
            ],
            [
                'nom_complet' => 'Cheikh Al Islam',
                'adresse' => 'Badioncoto',
            ],
            [
                "nom_complet" => 'Yaye adama Bodian',
                'adresse' => 'centre barbara'
            ]
        ]);
    }
}
