<?php
namespace Validate_and_store;
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App;
use App\ordini;
/**
* 
*/
class Validate_and_store
{
    
    function __construct()
    {
       $lentedx= new \App\Lente_dx();
       $lentesx= new \App\Lente_sx(); 

    }

function Store_Lenti(Request $request)
{
        $null=0;
	    $lentedx= new \App\Lente_dx();
        $lentesx= new \App\Lente_sx();

        $error=0;
        $flag=false;

        $lentesx->sfero_sx=$request->sfero_sx;
        $lentesx->addizione_sx=$request->addizione_sx;

        //dd($request);

        if($request->cilindro_sx!=null){ 

                    if($request->asse_sx!=null)
        {               $lentesx->cilindro_sx=$request->cilindro_sx;
                        $lentesx->asse_sx=$request->asse_sx;
        }
         else {   

                $error=1;
                $flag=true;
            }
    }
       

        $lentedx->sfero_dx=$request->sfero_dx;
        $lentedx->addizione_dx=$request->addizione_dx;

        if($request->cilindro_dx!=null){
                        if($request->asse_dx!=null)
        {               $lentedx->cilindro_dx=$request->cilindro_dx;
                        $lentedx->asse_dx=$request->asse_dx;
        }
        else {
            $error=2;
        }
    }
        

        if($error==2&&$flag==true){
                $error=3;
        }


        if($error==0){
                $lentedx->save();
                $lentesx->save();
         }

        return($error);
}

function Edit_Store(Request $request,\App\Lente_dx  $ld , \App\Lente_sx $ls){
        
        $null=0;
        $lentedx=$ld;
        $lentesx=$ls;

        $error=0;
        $flag=false;

        $lentesx->sfero_sx=$request->sfero_sx;
        $lentesx->addizione_sx=$request->addizione_sx;

        //dd($request);

        if($request->cilindro_sx!=null){ 

                    if($request->asse_sx!=null)
        {               $lentesx->cilindro_sx=$request->cilindro_sx;
                        $lentesx->asse_sx=$request->asse_sx;
        }
         else {   

                $error=1;
                $flag=true;
            }
    }
       

        $lentedx->sfero_dx=$request->sfero_dx;
        $lentedx->addizione_dx=$request->addizione_dx;

        if($request->cilindro_dx!=null){
                        if($request->asse_dx!=null)
        {               $lentedx->cilindro_dx=$request->cilindro_dx;
                        $lentedx->asse_dx=$request->asse_dx;
        }
        else {
            $error=2;
        }
    }
        

        if($error==2&&$flag==true){
                $error=3;
        }


        if($error==0){
                $lentedx->save();
                $lentesx->save();
         }

        return($error);

}

}