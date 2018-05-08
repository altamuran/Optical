<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   for ($i=0; $i < 10 ; $i++){
        $this->call(lenti_TableSeeder::class);
        }
    for ($i=0; $i < 10 ; $i++){
         $this->call(Clienti_TableSeeder::class);
     }
     for ($i=0; $i < 10 ; $i++){
         $this->call(Ordini_TableSeeder::class);
    }
    }
}
