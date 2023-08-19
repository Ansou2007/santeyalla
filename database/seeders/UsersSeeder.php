<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('Users')->insert([
            // ADMIN
            [
                'structure_id' => '1',
                'prenom' => 'Ansoumane Michel',
                'nom' => 'TAMBA',
                'email' => 'ansou13@gmail.com',
                'telephone' => '774418426',
                'role' => 'Admin',
                'password' => Hash::make('passer123'),
                'status' => 'Actif'
            ],
            // Livreur
            [
                'structure_id' => '2',
                'prenom' => 'Michel',
                'nom' => 'Sagna',
                'email' => 'michel@gmail.com',
                'telephone' => '766852300',
                'role' => 'Livreur',
                'password' => Hash::make('passer123'),
                'status' => 'Inactif'

            ],
            // Ventileur
            [
                'structure_id' => '3',
                'prenom' => 'Moustapha',
                'nom' => 'Diallo',
                'email' => 'moustapha@gmail.com',
                'telephone' => '774689515',
                'role' => 'Ventileur',
                'password' => Hash::make('passer123'),
                'status' => 'Actif'

            ]


        ]);
    }
}
