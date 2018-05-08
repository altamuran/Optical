<?php
namespace Store_Lenti;
namespace App\Http\Controllers;




use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;
use App\ordini;

function Store_Lenti(Request $request)
{
		 $lentedx= new \App\Lente_dx();
        $lentesx= new \App\Lente_sx();

        $lentesx->sfero=$request->sfero_sx;
        $lentesx->cilindro=$request->cilindro_sx;
        $lentesx->asse=$request->asse_sx;

        $lentedx->cilindro=$request->cilindro_dx;
        $lentedx->sfero=$request->sfero_dx;
        $lentedx->asse=$request->asse_dx;
        
        $lentesx->save();
        $lentedx->save();
               
}

