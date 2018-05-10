<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ClienteRequest;

include('pdf_generator.php');



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
      //  $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {   
        return view('home');
    }

    public function CreaCliente()

    {   
        return view('clienti.add');
    }

    public function Crea(ClienteRequest $request)

    {   
        $cliente= new \App\Clienti();
        $test=\App\Clienti::find($request->codice_cliente);
        if($test!=null){
            return redirect()->back()->withErrors(['Codice cliente esistente']);
        }
        $cliente->codice_cliente=$request->codice_cliente;
        $cliente->ragione_sociale=$request->ragione_sociale;
        $cliente->save();

         return redirect()->action(
    'OrdiniController@create');
        
    }

    public function Pdf_Ordini($id)

    {   


        $ordine= \App\Ordini::find($id);
        $lente_dx=\App\lente_dx::find($ordine->id_lente_dx);
        $lente_sx=\App\lente_sx::find($ordine->id_lente_sx);
        $cliente= \App\Clienti::find($ordine->id_cliente);
        
        pdf_generator($ordine,$cliente,$lente_sx,$lente_dx);
        
    }

   

  

  

  
}
