    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
                    <div class="text-center">
                        <h1>Ricerca Ordine</h1>
                    </div>
        </div>


            @if($errors->any())
             <div class="alert alert-danger">
            <ul>
            <h4>{{$errors->first()}}</h4>
            </ul>
            @endif        
      
        
    </div>  
               




        <form  action="{{route('cerca_POST')}} "  method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <fieldset>  

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic">Numero ordine</label>
                            <div class="col-md-4">
                                <input type="number"  name="numero_ordine" min="0" class="form-control">
                            </div>
                    </div>

            <div class="form-group">
                <div class="row col-md-12">
                    <div class="col-md-4 col-md-offset-4">
                    <button id="btnCal" name="btnCal" class="btn btn-primary">Cerca</button>
                    </div>
                </div>
            </div>


            </fieldset>
        </form>
    </div>
    @endsection
