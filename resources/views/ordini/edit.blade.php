
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
            <input type="number" step="0.25" name="sfero_dx" min="0" max="10" class="form-control">
        </div>
    </div>



    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Cilindro</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="cilindro_dx" min="0" max="10" class="form-control">
        </div>
    </div>


    <<div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Asse</label>
        <div class="col-md-4">
            <input type="number" step="10" name="asse_dx" min="0" max="180"  class="form-control">
        </label>
        </div>
    </div>



    <legend>Lente Sinistra</legend>
    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Sfero</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="sfero_sx" min="0" max="10" class="form-control">
        </label>
        </div>
    </div>



    <div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Cilindro</label>
        <div class="col-md-4">
            <input type="number" step="0.25" name="cilindro_sx" min="0" max="10" class="form-control">
        </label>
        </div>
    </div>


    <<div class="form-group">
     <label class="col-md-4 control-label" for="selectbasic">Asse</label>
        <div class="col-md-4">
            <input type="number" step="10" name="asse_sx" min="0" max="180"  class="form-control">
        </label>
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




    
    @endsection
