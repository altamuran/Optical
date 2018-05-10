
    @extends('layouts.app')

    @section('content')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <div class="container">
            <div class="row col-md-12">
            
    


            <form   action="{{route('ordini.update',[$ordine->n_ordine])}}"  method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <fieldset>   


    @if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Form Name -->
    <legend>Ordine</legend>
     
    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4  control-label" for="selectbasic">Codice cliente</label>
        <div class="col-md-4">
            <input class="form-control" name="codice_cliente" type="text" readonly value= {{$Cliente->codice_cliente}}>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group">
        <label class="col-md-4  control-label" for="selectbasic">Codice cliente</label>
        <div class="col-md-4">
            <input class="form-control" name="ragione_sociale" type="text" readonly value= {{$Cliente->ragione_sociale}} >
        </div>
    </div>

    


     <legend>Lente Destra</legend>
    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Sfero</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="sfero_dx" min="0" max="10" class="form-control" id='sfero_dx' onchange="SetPattern('sfero_dx')"  value="{{$lentedx->sfero_dx}}" }>
        </div>
    </div>



    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Cilindro</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="cilindro_dx" min="0" max="10" class="form-control" value="{{$lentedx->cilindro_dx}}"  id="cilindro_dx"  onchange="SetPattern('cilindro_dx')">
        </div>
    </div>


    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Asse  TABO</label>
        <div class="col-md-4">
            <input type="number" step="10" name="asse_dx" min="0" max="180"  class="form-control" value={{$lentedx->asse_dx}}>
        </label>
        </div>
    </div>

    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Addizione</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="addizione_dx" min="-50" max="50" class="form-control" value="{{$lentedx->sfero_dx}}" id="addizione_dx" onchange="SetPattern('addizione_dx')"> 
        </div>
    </div>



    <legend>Lente Sinistra</legend>
    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Sfero</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="sfero_sx" min="-50" max="50" class="form-control" value="{{$lentesx->sfero_sx}}"  id="sfero_sx" onchange="SetPattern('sfero_sx')">
        </label>
        </div>
    </div>



    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Cilindro</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="cilindro_sx" min="-50" max="50" class="form-control" value="{{$lentesx->cilindro_sx}}" id="cilindro_sx"  onchange="SetPattern('cilindro_sx')">
        </label>
        </div>
    </div>


    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Asse  TABO</label>
        <div class="col-md-4">
            <input type="number" step="10" name="asse_sx" min="0" max="180"  class="form-control" value="{{$lentesx->asse_sx}}">
        </label>
        </div>
    </div>

    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Addizione</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="addizione_sx" min="-50" max="50" class="form-control" value="{{$lentesx->addizione_sx}}"  id="addizione_sx" onchange="SetPattern('addizione_sx')">
        </div>
    </div>








    <!-- Button -->
    <div class="form-group" style="margin-top: 50px">
        <div class="row col-md-12">
            <div class="col-md-4 col-md-offset-2">
            <button id="btnCal" name="btnCal" class="btn btn-primary">Update</button>
            </div>
            <div class="col-md-4 col-md-offset-2">
            <a href="{{ url('ordini')}}" class="btn btn-primary">Indietro</a>
            </div>
        <!-- End Well -->
            
        </div>
        </div>
    </div>





    </fieldset>
    </form>
</div>

<script type="text/javascript">

    function SetPattern(p1) {
    var value=document.getElementById(p1).value;
    var s_value=value.toString();   
    var pos_z = s_value.search("0");
    var pos_p = s_value.indexOf('.');
     
     if(pos_z==0){
        console.log(pos_p);
        if(pos_p!=1){
            value=value/100;       
        }
        
    }
    else{
        if(value>10){
        value=value/10
        }
        if(value >100){
        value=value/100
        }

    }

    document.getElementById(p1).value=value;
    console.log(value)           // The function returns the product of p1 and p2
}
;

</script>



    
    @endsection
