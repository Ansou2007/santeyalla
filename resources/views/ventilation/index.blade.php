@extends('layouts.master')
@section('contenu')
    <h1 class="text text-center">Ventilation</h1>
    <div class="card report-card">
        <div class="card-body pb-0">
        <div class="row">
        <div class="col-md-12">
            <form action="{{route('Ventilation.search')}}" method="post" class="form">
                @csrf
        <ul class="app-listing">
        <li>
        <div class="multipleSelection">
            <label for=""><i class="fas fa-user me-1 select-icon"></i>Livruer</label>
            <select name="livreur_id" id="livreur" class="form-control" required>
                <option  selected disabled>Livreur</option>
                @foreach ($livreur as $livreur )
                    <option value="{{$livreur->id}}">{{$livreur->prenom}} {{$livreur->nom}}</option>
                @endforeach
            </select>
        </div>
        </li>
        <li>
        <div class="multipleSelection">
            <label for=""><i class="fas fa-calendar me-1 select-icon"></i>Date debut</label>
            <input type="date" name="date_debut" id="" class="form-control">
        </div>
        </li>
        <li>
        <div class="multipleSelection">
            <label for=""><i class="fas fa-calendar me-1 select-icon"></i>Date fin</label>
            <input type="date" name="date_fin" id="" class="form-control">
        </div>
        </li>
        <li>
            <div class="multipleSelection">
                <label for=""> <i class="fas fa-book-open me-1 select-icon"></i>Boulangerie</label>
                <select name="boulangerie" id="boulangerie" class="form-control" required>
                    <option value="" selected disabled>boulangerie</option>
                    @foreach ($boulangerie as $boulangerie )
                    <option value="{{$boulangerie->nom_complet}}">{{$boulangerie->nom_complet}}</option>
                @endforeach
                </select>
            </div>
            </li>
            <li>
                <div class="multipleSelection">
                    <label for=""><i class="fas fa-search"></i></label>
                    <button type="submit" class="form-control btn btn-success">Voir</button>
                </div>
            </li>
            <li>
                <div class="multipleSelection">
                    <label for=""><i class="fas fa-reset"></i></label>
                    <a href="{{route('Ventilation.index')}}" class="form-control btn btn-warning">Reset</a>
                </div>
            </li>
        </ul>
        </form>
        </div>
        </div>
        </div>
        </div>
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-hover" id="ventilation">
                <thead>
                <tr>
                <th>ID</th>
                <th class="text-center">Livreur</th>
                <th class="text-center">Boulangerie</th>
                <th class="text-center">Date</th>
                <th class="text-center">Ventile</th>
                <th class="text-center">N-Ventile</th>
                <th class="text-center">Retour</th>
                <th class="text-center">Montant_verse</th>
                <th class="text-center">Vendu</th>
                <th class="text-center">Reliquat</th>
                <th class="text-center">Edition</th>
                <th class="text-center">Suppression</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ventilation as $ventilation ) 
                <tr> 
                <td>{{$loop->index + 1}}</td>
                <td class="text-center">{{$ventilation->prenom}} {{$ventilation->nom}}</td>
                <td class="text-center">
                    @if ($ventilation->nom_complet == "Sante Yalla")
                        <span class="badge badge-success">{{$ventilation->nom_complet}}</span>
                    @elseif ($ventilation->nom_complet == "Yaye adama Bodian")
                    <span class="badge badge-warning">{{$ventilation->nom_complet}}</span>
                    @else
                    <span class="badge badge-info">{{$ventilation->nom_complet}}</span>
                    @endif
                </td>
                <td>
                    {{Carbon\Carbon::parse($ventilation->date_ventilation)->format('d/m/Y') }}
                </td>
                <td class="text-center">{{$ventilation->ventile}}</td>
                <td class="text-center">{{$ventilation->non_ventile}}</td>
                <td class="text-center">{{$ventilation->retour}}</td>
                <td class="text-center">{{$ventilation->montant_verse}}</td>
                <td class="text-center">{{$ventilation->qte_vendue}}</td>
                <td class="text-center">
                    {{$ventilation->reliquat}}
                    {{-- @if ($ventilation->reliquat > 0)
                        <span class="badge badge-danger">{{$ventilation->reliquat}}</span>
                        @else
                        <span class="badge badge-success">{{$ventilation->reliquat}}</span>

                    @endif --}}
                    
                </td>
                <td class="text-center">
                    <a href="{{route('Ventilation.detail',['ventilation'=>$ventilation->id])}}" class="btn btn-link"><i class="fas fa-eye"></i></a>
                    <a href="{{route('Ventilation.edition',['ventilation'=>$ventilation->id])}}" class="btn btn-link"><i class="fas fa-edit"></i></a>
                   
                </td>
                <td>
                    <form action="{{route('Ventilation.delete',['ventilation'=>$ventilation->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-link" type="submit"><i class="fas fa-trash"></i></button>

                    </form>
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
                        <th id="retour" style="background-color:gray;font-size:20px;text-align:center">Retour</th>
                        <th id="montant_verse" style="background-color:green;font-size:20px;text-align:center">Montant-Versé:</th>
                        <th id="qte_vendue" style="background-color:red;font-size:20px;text-align:center">Qté-Vendue:</th>
                        <th id="reliquat" style="background-color:gray;font-size:20px;text-align:center">Reliquat:</th>
                    </tr>
                </tfoot>
                </table>
        </div>
        </div>
        </div>
      
        <script async>
            $(document).ready(function(){

                $('#livreur').select2({
                placeholder: "Selectionner un livreur",
                 allowClear: true,
                 theme: "classic"
                });

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
                Retour = api
                    .column(6, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Qté Vendu
                Montant_Verse = api
                    .column(7, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Qté Vendu
                Qte_vendue = api
                    .column(8, {
                        page: 'current'
                    })
                    .data()
                    .reduce(function(a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                // Reliquat
                Reliquat = api
                    .column(9, {
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
                //$(api.column(3).footer()).html('Ventile : ' + pageTotal + ' Totaux : ' + total);
                $(api.column(4).footer()).html(Ventile);
                $(api.column(5).footer()).html(Nventile);
                $(api.column(6).footer()).html(Retour);
                $(api.column(7).footer()).html(Montant_Verse);
                $(api.column(8).footer()).html(Qte_vendue);
                $(api.column(9).footer()).html(Reliquat);
                /*$(api.column(1).footer()).html('Non-Ventile : ');
                $(api.column(2).footer()).html('Montant Versé : ');
 */
            },
                });

                @if(session()->has('Message'))
                    Swal.fire('Ventilation',"{{session()->get('Message')}}",'info');
                @endif

                })
        </script> 
@endsection
 

