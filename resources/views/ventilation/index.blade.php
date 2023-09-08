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
                                <label for=""><i class="fas fa-user me-1 select-icon"></i>Livreur</label>
                                <select name="livreur" id="livreur" class="form-control">
                                    <option {{is_null(request()->input('livreur')) ? 'selected' : ''}} value=""
                                        selected>Tout</option>
                                    @foreach ($livreur as $livreur )
                                    <option {{request()->input('livreur') == $livreur->id ? 'selected' : ''}}
                                        value="{{$livreur->id}}">{{$livreur->prenom}} {{$livreur->nom}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="multipleSelection">
                                <label for=""><i class="fas fa-calendar me-1 select-icon"></i>Date debut</label>
                                <input type="date" name="date_debut" id="" class="form-control"
                                    value="{{Carbon\Carbon::now()->toDateString()}}">
                            </div>
                        </li>
                        <li>
                            <div class="multipleSelection">
                                <label for=""><i class="fas fa-calendar me-1 select-icon"></i>Date fin</label>
                                <input type="date" name="date_fin" id="" class="form-control"
                                    value="{{Carbon\Carbon::now()->toDateString()}}">
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
                                <a href="{{route('Ventilation.index')}}"
                                    class="form-control btn btn-warning">Actialiser</a>
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
                        <th class="text-center" rowspan="35%">Ventile</th>
                        <th class="text-center">N-Ventile</th>
                        <th class="text-center">Retour</th>
                        <th class="text-center">Vendu</th>
                        <th class="text-center">Versé</th>
                        <th class="text-center">Reliquat</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
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
                        <td class="text-center">{{$ventilation->qte_vendue}}</td>
                        <td class="text-center">{{$ventilation->montant_verse}}</td>
                        <td class="text-center">{{$ventilation->reliquat}}</td>
                        <td class="text-center">
                            @if ($ventilation->reliquat > 0) <span class="badge badge-danger">
                                {{$ventilation->reliquat}}</span>
                            @else
                            <span class="badge badge-success">{{$ventilation->reliquat}}</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    {{--Voir--}}
                                    <a href="javascript::void(0)" type="button" class="dropdown-item   btnDetail"
                                        data-id="{{$ventilation->id}}"
                                        data-attr="{{ route('Ventilation.detail', $ventilation->id) }}"><i
                                            class="far fa-eye me-2">&nbspVoir</i></a>
                                    <a href="javascript::void(0)" type="button" class="dropdown-item btnEdition"
                                        data-id="{{$ventilation->id}}"
                                        data-attr="{{ route('Ventilation.edition', $ventilation->id)}}"
                                        data-site="{{ route('Ventilation.update', $ventilation->id)}}"><i
                                            class="far fa-edit me-2">&nbspEditer</i></a>
                                    {{--Supprimer--}}
                                    {{-- <form
                                        action="{{route('Ventilation.delete',['ventilation'=>$ventilation->id])}}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn dropdown-item" type="submit"><i
                                                class="fas fa-trash me-2"></i>Supprimer</button>
                                    </form> --}}
                                    <a href="javascript::void(0)" data-id="{{$ventilation->id}}"
                                        data-url="{{route('Ventilation.delete',$ventilation->id)}}"
                                        class="BtnSupprimer dropdown-item" id="supprimer"><i
                                            class="fas fa-trash me-2"></i>Supprimer</a>
                                </div>
                            </div>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th id=" total"></th>
                        <th style="background-color:green;font-size:20px;text-align:center">Ventile :</th>
                        <th style="background-color:yellow;font-size:20px;text-align:center">Non
                            Ventile:</th>
                        <th style="background-color:gray;font-size:20px;text-align:center">Retour</th>
                        <th style="background-color:green;font-size:20px;text-align:center">Qté-Vendue:
                        </th>
                        <th style="background-color:red;font-size:20px;text-align:center">Montant-Versé:
                        </th>
                        <th style="background-color:gray;font-size:20px;text-align:center">Reliquat:</th>
                    </tr>
                </tfoot>
            </table>

            {{-- Modal Detail--}}
            @include('ventilation.detail_modal')
            @include('ventilation.edition_modal')
        </div>
    </div>
</div>

<script async>
    $(document).ready(function(){
            // Chargement du select 
                $('#livreur').select2({
                //placeholder: "Selectionner un livreur",
                 //allowClear: true,
                 theme: "classic"
                });

                // Ouverture du Modal Detail
                $('.btnDetail').on('click',function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    var url = $(this).attr('data-attr');
                    $.get(url,function(data){
                       $('#Livreur').val(data.prenom +' '+ data.nom);
                       $('#livreur_id').val(data.livreur_id);
                       $('#ventile').val(data.ventile);
                        $('#non_ventile').val(data.non_ventile);
                        $('#date_ventilation').val(data.date_ventilation);
                        $('#pu').val(data.pu);
                        $('#mtn_verse').val(data.mtn_verse);
                        $('#location').val(data.location);
                        $('#retour').val(data.retour);
                        $('#qte_vendue').val(data.qte_vendue);
                        $('#reliquat').val(data.reliquat);
                        $('#montant_a_verser').val(data.montant_a_verse);
                        $('#detailVentilation').modal('show');
                    });
                });

                // Ouverture du Modal Edition
                $('.btnEdition').on('click',function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    var url = $(this).attr('data-attr');
                    $.get(url,function(data){
                        $('.ventilation_id').val(data.id);
                        $('.Livreur').val(data.prenom +' '+ data.nom);
                       $('.livreur_id').val(data.livreur_id);
                       $('.ventile').val(data.ventile);
                        $('.non_ventile').val(data.non_ventile);
                        $('.date_ventilation').val(data.date_ventilation);
                        $('.pu').val(data.pu);
                        $('.mtn_verse').val(data.montant_verse);
                        $('.location').val(data.location);
                        $('.retour').val(data.retour);
                        $('.qte_vendue').val(data.qte_vendue);
                        $('.reliquat').val(data.reliquat);
                        $('.montant_a_verser').val(data.montant_a_verse);
                        $('#editionVentilation').modal('show'); 
                    });
                });

                // Envois des données
                $('.EditionForm').on('submit',function(e){
                    e.preventDefault();
                    var id = $('.ventilation_id').val();
                    var url = '{{ route("Ventilation.update", ":id") }}';
                    url = url.replace(':id',id);
                    var donnees = $(this).serialize();
                     $.ajax({
                        url:url,
                        data:donnees,
                        method:"put",
                        success:function(data){
                            Swal.fire('Ventilation','Ventilation modifié','info');
                            window.location.reload();
                        },
                        error:function(error){
                            console.log(error);
                        }
                    }); 
                })

                // Suppression
                $('.BtnSupprimer').on('click',function(e){
                    e.preventDefault();
                    var id = $(this).attr('data-id');
                    var url = $(this).attr('data-url');
                    Swal.fire({
                    title: 'Voulez-vous supprimer ?',
                    text: "La suppression est irréversible",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText:"Annuler",
                    confirmButtonText: 'Oui,supprimer'
                    }).then((result) => {
                    if (result.isConfirmed) {
                       $.ajax({
                        url:url,
                        method:'get',
                        success:function(data){
                            window.location.reload();
                        },error:function(data){
                            alert('erreur');
                        }

                       });
                    }
                    })
                })
               
            /* calcul */
        function calcul() {
            var ventile = parseInt($('.ventile').val());
            var nventile = parseInt($('.non_ventile').val());
            var retour = parseInt($('.retour').val());
            var prix = parseInt($('.pu').val());
            var location = parseInt($('.location').val());
            var mtn_verse = parseInt($('.mtn_verse').val());
            var qte_vendue = ventile - (nventile + retour);
            var montant_vendue = (qte_vendue * prix) - location;
            $('.qte_vendue').val(qte_vendue);
            $('.montant_a_verser').val(montant_vendue);
            var reliquat = montant_vendue - mtn_verse;
            $('.reliquat').val(reliquat);
            console.log('Qté Vendue :' + qte_vendue);
            console.log('Montant Vendue : ' + montant_vendue);
            console.log('Reliquat : ' + reliquat);
        }
        $('.pu').on('keyup',function(e){
            e.preventDefault();
            calcul();
        });
        $('.location').on('keyup',function(e){
            e.preventDefault();
            calcul();
        });

        $('.mtn_verse').on('keyup',function(e){
            e.preventDefault();
            calcul();
        });
        // Verification
        $('#btn_verify').click(function(e){
            e.preventDefault();
            calcul();
            var location = $('.location').val();
            var montant = $('.montant_a_verser').val();
            var qte = $('.qte_vendue').val();
            var reliquat = $('.reliquat').val();
            swal.fire({
                icon: 'info',
                toast: true,
                title: 'Verification',
                text: 'Vendue = ' + qte + ' Montant = ' + montant + ' Reliquat = ' + reliquat
            });
        });

      

                //Chargement datatable
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