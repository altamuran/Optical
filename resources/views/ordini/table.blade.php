
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

     <script src="lib/js/bootstrap.min.js"></script>
 

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

  <div class="container">
  	
      @if(count($errors)>0)
    <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
    </div>
    @endif

  		
          
            
          
             <h4>Ordini</h4>
              <div class="table-responsive">

                  
                <table id="mytable" class="table table-bordred table-striped">
                     
                     <thead>
                     
                     
                     <th>Codice_cliente</th>
                      <th>Ragione sociale</th>
                      <th>ID_ordine</th>
                        <th>Sfero dx</th>
                        <th>Cilindro dx</th>
                        <th>Asse dx</th>
                        <th>ADD dx</th>
                       <th>Sfero sx</th>
                        <th>Cilindro sx</th>
                        <th>Asse sx</th>
                        <th>ADD sx</th>
                        
                      </thead>
                  <tbody>
                      @foreach($Ordini as $key=>$O)
              <tr>
                      
                      <td>{{$O->codice_cliente}}</td>
                      <td>{{$O->ragione_sociale}}</td>
                      <td>{{$O->n_ordine}}</td>
                      <td>{{$O->sfero_dx}}</td>
                      <td>{{$O->cilindro_dx}}</td>
                      <td>{{$O->asse_dx}}</td>
                      <td>{{$O->addizione_dx}}</td>
                      <td>{{$O->sfero_sx}}</td>
                      <td>{{$O->cilindro_sx}}</td>
                      <td>{{$O->asse_sx}}</td>
                      <td>{{$O->addizione_sx}}</td>
                      
      
                      <td>  
                      <a href="{{ route('ordini.edit',[$O->n_ordine]) }}" class="btn btn-primary ">
                      EDIT
                      </a>     
                      </td>

                      <td>
                      <button class="btn btn-danger"  id="btn1" onclick="showStuff('{{$O->n_ordine}}')">
                      DELETE
                      </button>
                  </td>
                   <td>
                      <a href="{{route('ordini.show',[$O->n_ordine])}}"  class="btn btn-success">DETTAGLI</a>
                      </td>
                     
                    </tbody>
                    
                <td>
                    <div class="modal in  col-md-12" id={{$O->n_ordine}}>
                         <div class="modal-dialog col-md-12">
                             <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Are you sure???</h4>
                             </div>
                             <div class="modal-body">
                                <p>Are you sure you want to delete (this)?</p>
                                <div class="row">
                                    <div class="col-md-5 text-center">
                                    <form action="{{ route('ordini.destroy',[$O->n_ordine])}}" method="POST">{{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                     <button class="btn btn-danger">
                                          delete
                                      </button>
                                    </form>
                                    </div>
                                <div class="col-md-5 text-center">                       
                                    <button class="btn btn-primary" id='btn2' onclick="HideStuff('{{$O->n_ordine}}')">No</button>
                                </div>  
        
                              </div>
                          </div>
                        </div>
                    </div>
                  </div>
            </td>
      </tr>     


                     
         @endforeach  
              </table>

  
                  <div class="clearfix"></div>


                  <ul class="pagination pull-right">
                    <li class="disabled"><a href="{{$Ordini->previousPageUrl()}}"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li><a href="{{$Ordini->url(1)}}">1</a></li>
                    <li><a href="{{$Ordini->url(2)}}">2</a></li>
                    <li><a href="{{$Ordini->url(3)}}">3</a></li>
                    <li><a href="{{$Ordini->url(4)}}">4</a></li>
                    <li><a href="{{$Ordini->url(5)}}">5</a></li>
                    <li><a href="{{$Ordini->nextPageUrl()}}"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                  </ul>
        </div>
  </div>







<script type="text/javascript">
   function showStuff(id) {
    document.getElementById(id).style.display = 'block';
}
</script>


<script type="text/javascript">
   function HideStuff(id) {
    document.getElementById(id).style.display = 'none';
}
</script>





      
      
     
