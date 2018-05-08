<?php

use Illuminate\Database\Seeder;

class Ordini_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
        public function run()
        
    {       $tmp_cliente=App\Clienti::inRandomOrder()->first();
            $tmp_lente_dx=App\Lente_dx::inRandomOrder()->first();
            $tmp_lente_sx=App\Lente_sx::find($tmp_lente_dx->id);
            $faker = Faker\Factory::create();
            $n_ordine=$faker->numberBetween($min = 0, $max = 5000);

            $ordine = App\Ordini::find($n_ordine);
            if ($ordine == null){
            DB::table('ordinis')->insert([
            'id_cliente' => $tmp_cliente->codice_cliente,
            'id_lente_dx'=> $tmp_lente_dx->id,
            'id_lente_sx'=> $tmp_lente_sx->id,
            'n_ordine'=>$n_ordine
             ]);
        }else{
            DB::table('ordinis')->insert([
            'id_cliente' => $tmp_cliente->codice_cliente,
            'id_lente_dx'=> $tmp_lente_dx->id,
            'id_lente_sx'=> $tmp_lente_sx->id,
            'n_ordine'=>$faker->numberBetween($min = 0, $max = 5000),

             ]);
                }
    
}

}