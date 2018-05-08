
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row col-md-12  custyle">
    <table class="table table-striped custab col-md-12">
    <thead>
  
        <tr>
            <th>Coidce cliente</th>
            <th>ragione socaiel</th>
            
            <th class="text-center">Action</th>
        </tr>

    </thead>
     @foreach($Clienti as $key=>$C)

            <tr>
                <td>{{$C->codice_cliente}}</td>
                <td>{{$C->ragione_sociale}}</td>
                <td><a href="{{route('next',[$C->codice_cliente])}}">seleziona</a></td>
            </tr>
     @endforeach
    </table>
    </div>
</div>

</form>
