<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidatinRequest;
use App\Exceptions\Handler;
use App\Exceptions\Exception;
use App\Http\Controllers\Redirect;

include 'Store_Lenti.php';

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;
use App\ordini;

class OrdiniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {           


            

           
            $Ordini = DB::table('ordinis')
            ->join('clientis', 'ordinis.id_cliente', '=', 'clientis.codice_cliente')
            ->select('ordinis.*', 'clientis.ragione_sociale','clientis.codice_cliente')
            ->get();
            //dd($Ordini);

             return view('ordini.index',compact('Ordini'));
             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
         $Clienti=\App\Clienti::all();
         return view('ordini.create',compact('Clienti'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatinRequest $request)
    {   

        $request_var=$request;
        Store_Lenti($request_var);
        
        $data = App\Ordini::latest()->first();
        if ($data == null){
        $ordine= new \App\Ordini();
        $ordine->n_ordine=1;
        $ordine->id_cliente=$request->codice_cliente;
        $ordine->id_lente_dx=\App\Lente_dx::latest()->first()->id;
        $ordine->id_lente_sx=\App\Lente_sx::latest()->first()->id;
        $ordine->save();
        

        } 
    
        $ordine= new \App\Ordini();
        $ordine->n_ordine=\App\Ordini::latest()->first()->n_ordine+rand(0,2);
        $ordine->id_cliente=$request->codice_cliente;
        $ordine->id_lente_dx=\App\Lente_dx::latest()->first()->id;
        $ordine->id_lente_sx=\App\Lente_sx::latest()->first()->id;

        $ordine->save();

     return redirect()->action(
    'OrdiniController@index');
        
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordine = DB::table('ordinis')->where('n_ordine', $id)->get();
        
        $Lente_sx = DB::table('lente_sxes')->where('id', $ordine[0]->id_lente_sx)->get();

        $Lente_dx = DB::table('lente_sxes')->where('id', $ordine[0]->id_lente_sx)->get();

        $cliente = DB::table('clientis')->where('codice_cliente', $ordine[0]->id_cliente)->get();

        return view('ordini.show',compact('ordine','Lente_sx','Lente_dx','cliente'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      

        
        $data = App\Ordini::find($id);
        if ($data == null) {
        // data not found, sredirect
        
      return redirect()->back()->withErrors(['Ordine non presente', 'Ordine non presente']);
    } else {
       
            $ordine = App\Ordini::find($id);
            $Cliente = App\Clienti::find($ordine->id_cliente);
            return view('ordini.edit',compact('ordine','Cliente'));
     }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatinRequest  $request, $id)
    {       $request_var=$request;
        
        

        $ordine=\App\Ordini::find($id);

                
        
        
        $lentedx=\App\Lente_dx::find($ordine->id_lente_dx);
        $lentesx=\App\Lente_sx::find($ordine->id_lente_sx);


        $lentesx->sfero=$request_var->sfero_sx;
        $lentesx->cilindro=$request_var->cilindro_sx;
        $lentesx->asse=$request_var->asse_sx;

        $lentedx->cilindro=$request_var->cilindro_dx;
        $lentedx->sfero=$request_var->sfero_dx;
        $lentedx->asse=$request_var->asse_dx;


        $lentesx->save();
        $lentedx->save();


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {      

        
        $ordine = App\Ordini::find($id);
        if ($ordine == null) {
        // ordine not found, sredirect
        
      return redirect()->back()->withErrors(['Ordine non presente']);
    } else {
       
            $ordine = App\Ordini::find($id);
            $ordine->delete();
            return redirect()->back()->withInput();
            
     }

    }


      public function next($id)
    {
         $Cliente = DB::table('clientis')->where('codice_cliente', $id)->get(); 
         return view('ordini.next',compact('Cliente'));
    }

      public function cerca()
    {
          
         return view('ordini.cerca');
    }

      public function Cerca_POST(Request $request)
    {    
        $n_ordine=$request->numero_ordine;
        $ordini=App\Ordini::all();
        $i=0;
        $dim=count($ordini);
        $trovato=false;
        //dd($dim);
        

        while ($i<$dim) {
           if($ordini[$i]->n_ordine==$n_ordine){
                $trovato=true;
                break;
            }
            $i++;
       }

            if($trovato==true){
                                return redirect()->action(
                                'OrdiniController@show',['id'=>$n_ordine]);
                                }   else{
                                        return redirect()->back()->withErrors(['Ordine non presente', 'Ordine non presente']);
                                    }

    }

  


}
