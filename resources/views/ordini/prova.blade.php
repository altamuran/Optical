@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="js/config.js"></script> <!-- Do your $.ajaxSetup in this file -->
    <script src="js/app.js"></script>

@section('content')


<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="row">
  <div>
  <label>INSERISCI CODICE CLIENTE</label>
  </div>
  <div class="container col-md-4">
    <input class="form-control" id="cod" type="text">
    </input>
    <button class="postbutton btn-primary" type="hidden" name="_token" value="{{ csrf_token() }}" action="#" style="margin-top: 50px">Cerca Cliente</button>
  </div>





<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Id_ordine</th>
            <th>Codice_cliente</th>
            
        </tr>
    </thead>
            <tr>
                <td id="n_ordine"></td>
                <td id="codice_cliente"></td>
                 <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
          
    </table>
    </div>
</div>





















<script type="text/javascript">
  
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(".postbutton").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/provaPost',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".form-control").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data['0']['n_ordine']);
                        $("#n_ordine").append(data['0']['n_ordine']);
                        $("#codice_cliente").append(data['0']['id_cliente']);  
                    }
                }); 
            });
       });    
    </script>


</html>

@endsection


