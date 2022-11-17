<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        // Get CLP per USD from API https://mindicador.cl/api/dolar
        $api_clpperusd = file_get_contents('https://mindicador.cl/api/dolar');
        $clp_usd = json_decode($api_clpperusd, true)['serie'][0]['valor'];

        \App\Models\Payment::factory(50)->create([
            'clp_usd' => $clp_usd,
        ]);        
    }
}
