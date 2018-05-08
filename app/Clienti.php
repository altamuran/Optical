<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clienti extends Model
{	 
		protected $table = 'clientis';
	 	public $timestamps = false;
   		protected $primaryKey = 'codice_cliente';
   		protected $fillable = ['codice_cliente','ragione_sociale'];

     public function Ordini()
    {	
        return $this->hasMany('App\Ordini');
    }
}
