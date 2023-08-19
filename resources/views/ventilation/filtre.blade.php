@extends('layouts.master')
@section('contenu')
    <h1>Page ventilation</h1>
    <div class="card">
        <div class="card-header">
        <h5 class="card-title">Liste Ventilation</h5>
        </div>
        <div class="card-body">
            <form action="" method="get">
            <div class="row">
                    <div class="col-12 col-sm-5">
                        <div class="form-group local-forms">
                            <label for="">Date Debut</label>
                            <input type="date" class="form-control" name="date_debut">
                        </div>
                    </div>
                    <div class="col-12 col-sm-5">
                        <div class="form-group local-forms">
                            <label for="">Date Fin</label>
                            <input type="date" class="form-control" name="date_fin">
                        </div>
                    </div>
                    <div class="col-12 col-sm-2">
                        <div class="form-group local-forms">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class=" table table-hover" id="ventilation">
                <thead>
                <tr>
                <th>ID</th>
                <th class="text-center">Livreur</th>
                <th class="text-center">Boulangerie</th>
                <th class="text-center">Date</th>
                <th class="text-center">Ventile</th>
                <th class="text-center">Non-Ventile</th>
                <th class="text-center">Montant_verse</th>
                <th class="text-center">Vendu</th>
                <th class="text-center">Reliquat</th>
                <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ventilation as $ventilation ) 
                <tr> 
                <td>{{$loop->index + 1}}</td>
                <td class="text-center">{{$ventilation->livreurs->prenom}} {{$ventilation->livreurs->nom}}</td>
                <td class="text-center">{{$ventilation->livreurs->structure_id}}</td>
                <td>
                    {{$ventilation->date_ventilation}}
                <td class="text-center">{{$ventilation->ventile}}</td>
                <td class="text-center">{{$ventilation->non_ventile}}</td>
                <td class="text-center">{{$ventilation->montant_verse}}</td>
                <td class="text-center">{{$ventilation->qte_vendue}}</td>
                <td class="text-center">{{$ventilation->reliquat}}</td>
                <td class="text-center">
                    <a href="{{route('Ventilation.detail',['ventilation'=>$ventilation->id])}}" class="btn btn-link"><i class="fas fa-eye"></i></a>
                    <a href="{{route('Ventilation.edition',['ventilation'=>$ventilation->id])}}" class="btn btn-link"><i class="fas fa-edit"></i></a>
                    <button class="btn btn-link"><i class="fas fa-trash"></i></button>
                </td>
                </tr> 
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th id="total"></th>
                        <th id="ventile" style="background-color:green;font-size:20px;text-align:center">Ventile :</th>
                        <th id="non:ventile" style="background-color:yellow;font-size:20px;text-align:center">Non Ventile:</th>
                        <th id="montant_verse" style="background-color:gray;font-size:20px;text-align:center">Montant-Versé:</th>
                        <th id="qte_vendue" style="background-color:green;font-size:20px;text-align:center">Qté-Vendue:</th>
                        <th id="reliquat" style="background-color:red;font-size:20px;text-align:center">Reliquat:</th>
                    </tr>
                </tfoot>
                </table>
        </div>
        </div>
        </div>
      
        <script async>
            $(document).ready(function(){

                $('#ventilation').DataTable({
                    footerCallback: function(row, data, start, end, display) {
                var api = this.api();
                // Remove the formatting to get integer data for summation
                var intVal = function(i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };                

                //Ventile
                Ventile = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Non Ventilé
                Nventile = api
                    .column(5, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Montant Versé
                Montant_Verse = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Qté Vendu
                Qte_vendue = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Qté Vendu
                Reliquat = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Total over this page
                pageTotal = api
                    .column(4, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(4).footer()).html(Ventile);
                $(api.column(5).footer()).html(Nventile);
                $(api.column(6).footer()).html(Montant_Verse);
                $(api.column(7).footer()).html(Qte_vendue);
                $(api.column(8).footer()).html(Reliquat);
   
            },
                });


                })
        </script> 
@endsection
 

