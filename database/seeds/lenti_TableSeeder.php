<?php

use Illuminate\Database\Seeder;

class lenti_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('lente_dxes')->insert([
            'sfero_dx' => rand(0,5),
            'cilindro_dx' => rand(0,5),
            'asse_dx' => rand(0,180),
            'addizione_dx' => rand(0,5),
       	]);

           	DB::table('lente_sxes')->insert([
            'sfero_sx' => rand(0,5),
            'cilindro_sx' => rand(0,5),
            'asse_sx' => rand(0,180),
            'addizione_sx' => rand(0,5),
       	]);
    }
}
