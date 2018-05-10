<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidatinRequest;
use App\Exceptions\Handler;
use App\Exceptions\Exception;
use rizalafani\fpdflaravel\FpdfFacade;
use App\Http\Controllers\Redirect;

include 'Validate_and_store.php';

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


            // $ordine=\App\Ordini::first();
             //if($ordine==null){
             //redirect()->route('index')->withErrors(['Nessun ordine presente']);
               //   }
        

             $Ordini = DB::table('ordinis')
            ->join('clientis', 'ordinis.id_cliente', '=', 'clientis.codice_cliente')
            ->join('lente_dxes', 'ordinis.id_lente_dx', '=', 'lente_dxes.id')
            ->join('lente_sxes', 'ordinis.id_lente_sx', '=', 'lente_sxes.id')
            ->select('ordinis.*', 'clientis.ragione_sociale','clientis.codice_cliente','lente_dxes.*','lente_sxes.*')->orderBy('ordinis.created_at')
            ->simplePaginate(15);
            
            

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
        

        $Validate_and_store=new Validate_and_store();
        $error=$Validate_and_store->Store_Lenti($request_var);
        

        if($error!=0){
        return redirect()->back()->withInput()->withErrors(['SE INSERITO IL CILINDRO IL CAMPO ASSE DEVE ESSERE COMPLETATO']);
        }
        
        $ordine = App\Ordini::latest()->first();

        if ($ordine == null){
        $ordine= new \App\Ordini();
        $ordine->n_ordine=1;
        $ordine->id_cliente=$request->codice_cliente;
        $ordine->id_lente_dx=\App\Lente_dx::latest()->first()->id;
        $ordine->id_lente_sx=\App\Lente_sx::latest()->first()->id;
        $ordine->save();
        }else {
        
        $ordine= new \App\Ordini();
        $ordine->n_ordine=\App\Ordini::latest()->first()->n_ordine+rand(0,20);
        $ordine->id_cliente=$request->codice_cliente;
        $ordine->id_lente_dx=\App\Lente_dx::latest()->first()->id;
        $ordine->id_lente_sx=\App\Lente_sx::latest()->first()->id;


        $ordine->save();
    }

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
        
    $ordine = App\Ordini::find($id);
    if ($ordine == null) {
       
    return redirect()->back()->withErrors(['Ordine non presente', 'Ordine non presente']);
    }

        $ordine = \App\Ordini::find($id);
        
        $Lente_sx = \App\Lente_sx::find($ordine->id_lente_sx);

        $Lente_dx = \App\Lente_dx::find($ordine->id_lente_dx);
        
        $cliente = \App\Clienti::find($ordine->id_cliente);

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
            $lentedx=App\Lente_dx::find($ordine->id_lente_dx);
            $lentesx=App\Lente_sx::find($ordine->id_lente_sx);


            return view('ordini.edit',compact('ordine','Cliente','lentedx','lentesx'));
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

                
         $Validate_and_store=new Validate_and_store();


        $lentedx=\App\Lente_dx::find($ordine->id_lente_dx);
        $lentesx=\App\Lente_sx::find($ordine->id_lente_sx);
        
        $error=$Validate_and_store->Edit_Store($request,$lentedx,$lentesx);

         if($error!=0){
        return redirect()->back()->withInput()->withErrors(['SE INSERITO IL CILINDRO IL CAMPO ASSE DEVE ESSERE COMPLETATO']);
        }


       
         return redirect()->action(
            'OrdiniController@show',['id'=>$ordine->n_ordine]);

        
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


      public function next($id){

            $cliente = App\Clienti::find($id);
            if ($cliente == null) {
            // cliente not found, sredirect
            return redirect()->back()->withErrors(['cliente non presente']);
            } else {

            $Cliente =App\Clienti::find($id);
            return view('ordini.next',compact('Cliente'));
        }
    }

      public function cerca()
    {
          
         return view('ordini.cerca');
    }

      public function Cerca_POST(Request $request)
    {    
        $n_ordine=$request->numero_ordine;

        $ordini=App\Ordini::find($n_ordine);

        if($ordini!=null){
            return redirect()->action(
            'OrdiniController@show',['id'=>$n_ordine]);
        }

         else{
                return redirect()->back()->withErrors(['Ordine non presente', 'Ordine non presente']);
            }
        }

  


}
