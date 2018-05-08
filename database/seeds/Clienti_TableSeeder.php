<?php

use Illuminate\Database\Seeder;

class Clienti_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
*/

 



    public function run()
    {       $faker = Faker\Factory::create();
             DB::table('clientis')->insert([
            
            'codice_cliente'=>$faker->numberBetween($min = 0, $max =5000),
            'ragione_sociale' => $faker->company,
            
             ]);
    }
}
