
	@extends('layouts.app')

	@section('content')
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


	<div class="container">
			<div class="row col-md-12">
			
	


			<form   action="{{route('ordini.store')}}"  method="PUT" class="form-horizontal">
			{{ csrf_field() }}
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
			<input class="form-control" name="codice_cliente" type="text" readonly value= 
			{{$Cliente->codice_cliente}} >
		</div>
	</div>

	<!-- Select Basic -->
	<div class="form-group">
		<label class="col-md-4  control-label" for="selectbasic">Ragione sociale</label>
		<div class="col-md-4">
			<input class="form-control" name="ragione_sociale" type="text" readonly value= 
			{{$Cliente->ragione_sociale}} >
		</div>
	</div>

	


	 <legend>Lente Destra</legend>
	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Sfero</label>
		<div class="col-md-4">
			<input type="number" step="0.25" name="sfero_dx" min="-50" max="50" class="form-control" id='sfero_dx' onchange="SetPattern('sfero_dx')"> 
		</div>
	</div>



	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Cilindro</label>
		<div class="col-md-4">
			<input type="number" step="0.25" name="cilindro_dx" min="-50" max="50" id="cilindro_dx" class="form-control" onchange="SetPattern('cilindro_dx')">
		</div>
	</div>


	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Asse  TABO</label>
		<div class="col-md-4">
			<input type="number" step="10" name="asse_dx" min="0" max="180"  class="form-control">
			 <label class="col-md-4 control-label" for="selectbasic"></label>
		</div>
		<div>
		°
		</div>
	</div>

	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Addizione</label>
		<div class="col-md-4">
			<input type="number" step="0.25" name="addizione_dx" min="-50" max="50" id="addizione_dx" class="form-control" onchange="SetPattern('addizione_dx')">
		</div>
	</div>




	<legend>Lente Sinistra</legend>
	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Sfero</label>
		<div class="col-md-4">
			<input type="number"  id="sfero_sx" step="0.25" name="sfero_sx" min="-10" max="10" class="form-control" onchange="SetPattern('sfero_sx')">
		</label>
		</div>
	</div>



	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Cilindro</label>
		<div class="col-md-4">
			<input type="number" step="0.25" name="cilindro_sx" min="-10" max="10" id="cilindro_sx" class="form-control" onchange="SetPattern('cilindro_sx')" >
		</label>
		</div>
	</div>


	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Asse  TABO</label>
		<div class="col-md-4">
			<input type="number" step="10" id="asse_sx" name="asse_sx" min="0" max="180"  class="form-control">
		</label>
		</div>
	</div>

	<div class="form-group">
	 <label class="col-md-4 control-label" for="selectbasic">Addizione</label>
		<div class="col-md-4">
			<input type="number" step="0.25" name="addizione_sx" min="0" max="10" class="form-control" id="addizione_sx" onchange="SetPattern('addizione_sx')">
		</label>
		</div>
	</div>










	<!-- Button -->
	<div class="form-group">
		<div class="row col-md-12">
			<div class="col-md-4 col-md-offset-4">
			<button id="btnCal" name="btnCal" class="btn btn-primary" onclick="SetPattern('sfero_dx')">Save</button>
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
