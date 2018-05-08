<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lente_sx extends Model

{	
		protected $table = 'lente_sxes';
		protected $fillable = ['sfera','cilindro','asse','addizione'];
		 public $timestamps = false;
		

        public function Ordine()
    {	
        return $this->belongsTo('App\Ordine');
    }
}
