@extends('layouts.master')
@section('contenu')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Liste Abonnement</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="col-auto float-end">
                    <button class="BtnAjouter btn btn-primary mb-2">Ajouter Abonnement</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class=" table table-hover" id="abonnement">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Complet</th>
                        <th>Telephone</th>
                        <th>Boulangerie</th>
                        <th>Date</th>
                        <th>Qté</th>
                        <th>Pu</th>
                        <th>Montant</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $abonnement )
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$abonnement->abonnements->prenom}} {{$abonnement->abonnements->nom}}</td>
                        <td><span class="">{{$abonnement->abonnements->telephone}}</span> </td>
                        <td><span class="">{{$abonnement->nom_complet}}</span> </td>
                        <td> {{carbon\Carbon::parse($abonnement->date_ventilation)->format('d-m-Y')}}</td>
                        <td>{{$abonnement->qte}} </td>
                        <td>{{$abonnement->pu}} </td>
                        <td>{{$abonnement->montant}} </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <a href="javascript::void(0)" type="button" class="dropdown-item BtnEdition"
                                        id="BtnEdition" data-id="{{$abonnement->id}}"><i
                                            class="far fa-edit me-2"></i>Edition</a>
                                    <a href="javascript::void(0)" data-id="{{$abonnement->id}}"
                                        data-url="{{route('Abonnements.delete',$abonnement->id)}}"
                                        class="BtnSupprimer dropdown-item btn btn-link" id="supprimer"><i
                                            class="fas fa-trash"></i>Supprimer</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @include('abonnements.ajout')
            @include('abonnements.edit')
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

                // Modal Ajout
                 $('.BtnAjouter').on('click',function(e){
                        e.preventDefault();
                    $('#ajoutAbonnement').modal('show');                 
                }); 
                // Envois
                $('.ajoutForm').on('submit',function(e){
                    e.preventDefault();
                    var donnees = $(this).serialize();
                    $.ajax({
                        url:"{{route('Abonnements.ajout')}}",
                        method:'post',
                        data:donnees,
                        success:function(data){
                            $('#ajoutAbonnement').modal('show'); 
                            window.location.reload();                
                           // console.log(data);
                        },error:function(data){
                           // console.log(data);
                        }
                    })
                });
                // Edition
                $('.BtnEdition').on('click',function(e){
                    e.preventDefault();
                    var id= $(this).attr('data-id');
                    var url = "{{route('Abonnements.edition',':id')}}";
                    url = url.replace(':id',id);
                    $.get(url,function(data){
                        //console.log(data);
                        $('.id').val(data.id);
                        $('.abonnement_id').val(data.abonnement_id);
                        $('.prenom').val(data.prenom+' '+ data.nom);
                        //$('.nom').val(data.nom);
                        $('.qte').val(data.qte);
                        $('.pu').val(data.pu);
                        $('.date_ventilation').val(data.date_ventilation);
                        $('#editAbonnement').modal('show'); 
                    });

                });
                // Update
                   $('.EditForm').on('submit',function(e){
                        e.preventDefault();
                        var id=$('.id').val();
                        var donnees = $(this).serialize();
                    var url = "{{route('Abonnements.update',':id')}}";
                    url = url.replace(':id',id);
                    $.ajax({
                        url:url,
                        data:donnees,
                        method:"post",
                        success:function(data){
                            //alert('ajout avec success');
                           // Swal.fire('Ventilation',"{{session()->get('Message')}}",'info');
                           console.log(url);
                            //window.location.reload();
                        },error:function(data){
                            alert('erreur');
                            console.log(url);

                        }
                    });                  
                }); 
                // Suppression
                $('.BtnSupprimer').on('click',function(e){
                    e.preventDefault();
                   // var id = $(this).attr('data-id');
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

                });

                $('.abonnement').DataTable();
                @if (session()->has('Message'))
                    Swal.fire('Abonnement',"{{session()->get('Message')}}",'info');
                @endif

                

    })
</script>

@endsection