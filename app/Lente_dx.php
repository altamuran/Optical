<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lente_dx extends Model
{	   
	  protected $table = 'lente_dxes';
	  protected $fillable = ['sfera','cilindro','asse','addizione'];

           public function Ordine()
    {

        return $this->belongsTo('App\Ordine');
    }
}
