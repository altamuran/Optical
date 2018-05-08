<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>D.A.I. Optical</strong>
                        <br>
                        Via degli Ottici
                        <br>
                        Molfetta,BA,Italy 70056
                        <br>
                        <abbr title="Phone">P:</abbr> 0803945566
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: 1st November, 2013</em>
                    </p>
                    <p>
                        <em>Numero ordine :{{$ordine[0]->n_ordine}}</em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Dettagli Ordine</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Codice_cliente</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em>{{$cliente[0]->ragione_sociale}}</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> {{$cliente[0]->codice_cliente}}</td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center"></td>
                        </tr>
                </tbody>

                </table> 

                <table class="table table-hover">
                     <div class="text-center">
                    <h3>Lente destra</h3>
                    </div>
                        <tr>
                            <th>Sfero</th>
                            <th>Cilindro</th>
                            <th>Asse</th>
                            <th>Addizione</th>    
                       </tr>
                    </thead>

                     <tbody>
                        <tr>
                            <td class="col-md-2"><em>{{$Lente_dx[0]->sfero}}</em></td>
                            <td class="col-md-1">{{$Lente_dx[0]->cilindro}}</td>
                            <td class="col-md-1 ">{{$Lente_dx[0]->asse}}</td>
                            <td class="col-md-1 ">{{$Lente_dx[0]->addizione}}</td>
                        </tr>
                </tbody>

                </table>

                  <table class="table table-hover">
                     <div class="text-center">
                    <h3>Lente Sinistra</h3>
                    </div>
                        <tr>
                            <th>Sfero</th>
                            <th>Cilindro</th>
                            <th>Asse</th>
                            <th>Addizione</th>    
                       </tr>
                    </thead>

                     <tbody>
                        <tr>
                            <td class="col-md-2"><em>{{$Lente_sx[0]->sfero}}</em></td>
                            <td class="col-md-1">{{$Lente_sx[0]->cilindro}}</td>
                            <td class="col-md-1 ">{{$Lente_sx[0]->asse}}</td>
                            <td class="col-md-1 ">{{$Lente_sx[0]->addizione}}</td>
                        </tr>
                </tbody>

                </table>
                  <table class="table table-hover">
                     <div class="text-center">
                    <h3>Codice montatura</h3>
                    </div>
              
                    <tbody>
                        <tr>
                            02025454
                        </tr>
                </tbody>

                </table>



                <button type="button" class="btn btn-success btn-lg btn-block">
                    Cnferma   <span class="glyphicon glyphicon-chevron-right"></span>
                </button></td>
            </div>
        </div>
    </div>