<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Ana Paula',
                'cpf' => '908.460.894.20',
                'email' => 'ana@gmail.com',
                'telephone' => '99703-1531',
                'cep' => '59054-130',
                'city' => 'Natal',
                'state' => 'RN',
                'district' => 'Dix-sept Rosado',
                'street' => 'Rua Santo Apolo',
                'number' => '656',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Felipe Melo',
                'cpf' => '701.460.203.09',
                'email' => 'felipe@gmail.com',
                'telephone' => '98805-6731',
                'cep' => '89056-220',
                'city' => 'Natal',
                'state' => 'RN',
                'district' => 'Lagoa Nova',
                'street' => 'Rua Felizardo brito',
                'number' => '21',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Carlos Paiva',
                'cpf' => '806.302.203.10',
                'email' => 'carlos@gmail.com',
                'telephone' => '98955-5113',
                'cep' => '75656-310',
                'city' => 'Natal',
                'state' => 'RN',
                'district' => 'Ponta Negra',
                'street' => 'Rua da vila',
                'number' => '322',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
