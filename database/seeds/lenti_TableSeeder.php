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
            'sfero' => rand(0,5),
            'cilindro' => rand(0,5),
            'asse' => rand(0,180),
            'addizione' => rand(0,5),
       	]);

           	DB::table('lente_sxes')->insert([
            'sfero' => rand(0,5),
            'cilindro' => rand(0,5),
            'asse' => rand(0,180),
            'addizione' => rand(0,5),
       	]);
    }
}
