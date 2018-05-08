@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">

             @if($errors->any())
             <div class="alert alert-danger">
            <ul>
            <h4>{{$errors->first()}}</h4>
            </ul>
            @endif        
        </div>
        <div class="row"> 
            <div class="col-md-12 appt-list">

                    <form   action="{{route('Crea')}}"  method="POST" class="form-horizontal">
                    
                    {{ csrf_field() }}
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Aggiungi nuovo cliente</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="codice cliente">Codice cliente</label>
                            <div class="col-md-4">
                                <input id="codice cliente" name="codice cliente" type="number" placeholder="ex.458" class="form-control input-md" required="">
                                <span class="help-block">Codice cliente</span> 
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ragione sociale">Ragione sociale</label>
                            <div class="col-md-4">
                                <input id="ragione sociale" name="ragione sociale" type="text" placeholder="ragione sociale" class="form-control input-md">
                                <span class="help-block">Ragione sociale</span> 
                            </div>
                        </div>

                        <!-- Button -->
                        <label class="col-md-4 control-label" for="save">Aggiungi</label>
                        <div class="form-group">
                            
                            <div class="col-md-4">
                                <button id="save" name="save" class="btn btn-primary">Aggiungi</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>


    </div>
</div>



@endsection
