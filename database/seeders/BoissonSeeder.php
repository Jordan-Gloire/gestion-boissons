<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Boisson::create([
        'nom' => 'Pepsi',
        'type' => 'soda',
        'prix' => 1.20,
        'stock' => 50
    ]);
}

}
