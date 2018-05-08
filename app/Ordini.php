<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordini extends Model
{
      protected $fillable = ['id_cliente'];
     protected $table = 'ordinis';
     protected $primaryKey = 'n_ordine';
      public $timestamps = false;
      public function lente_dx()
    {
        return $this->hasOne('App\Lente_dx');
    }

     public function lente_sx()
    {
        return $this->hasOne('App\Lente_sx');
    }


    public function Clienti()
    {
        return $this->belongsTo('App\Clienti');
    }
    
}
