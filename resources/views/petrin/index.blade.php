@extends('layouts.master')
@section('contenu')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Liste Petrin</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="col-auto float-end">
                    <button class="BtnAjouter btn btn-primary mb-2">Ajouter Petrin</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="abonnement table table-hover" id="abonnement">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Sac</th>
                        <th>Boulangerie</th>
                        <th>Qté Produit</th>
                        <th>Rendement</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petrin as $petrin )
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td> {{carbon\Carbon::parse($petrin->date_abonnement)->format('d-m-Y')}}</td>
                        <td>{{$petrin->nbre_sac}}</td>
                        <td>{{$petrin->structures->nom_complet}} </td>
                        <td><span class="">{{$petrin->qte_produit}}</span> </td>
                        <td><span class="">{{$petrin->rendement}}</span> </td>
                        <td><span class="">{{$petrin->status}}</span> </td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="javascript::void(0)" class="action-icon dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript::void(0)" type="button" class="BtnEdition dropdown-item"
                                        id="BtnEdition" data-id="{{$petrin->id}}"
                                        data-site="{{route('Abonnement.edition',$petrin->id)}}"><i
                                            class="far fa-edit me-2"></i>Edition</a>
                                    <a href="javascript::void(0)" data-id="{{$petrin->id}}"
                                        data-url="{{route('Abonnement.delete',$petrin->id)}}"
                                        class="BtnSupprimer dropdown-item btn btn-link" id="supprimer"><i
                                            class="fas fa-trash"></i>Supprimer</a>


                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @include('petrin.ajout')
            @include('petrin.edit')
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){


                @if (session()->has('Message'))
                    Swal.fire('Abonnement',"{{session()->get('Message')}}",'info');
                @endif

                 $('.BtnAjouter').on('click',function(e){
                        e.preventDefault();
                    // alert('coucou');
                    $('#ajoutPetrin').modal('show');                 
                }); 
                // Envois
                $('.ajoutForm').on('submit',function(e){
                    e.preventDefault();
                    var donnees = $(this).serialize();
                    $.ajax({
                        url:"{{route('Petrin.ajout')}}",
                        method:'post',
                        data:donnees,
                        success:function(data){
                            $('#ajoutPetrin').modal('show'); 
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
                    var url = $(this).attr('data-site');
                     $.get(url,function(data){
                      //  console.log(data);
                        $('.id').val(data.id);
                        $('.structure_id').val(data.structure_id);
                        $('.boulangerie').val(data.nom_complet);
                        $('.prenom').val(data.prenom);
                        $('.nom').val(data.nom);
                        $('.telephone').val(data.telephone);
                        $('.date_abonnement').val(data.date_abonnement);
                        $('#editAbonnement').modal('show'); 
                    });                    
                });
                // Update
                   $('.EditForm').on('submit',function(e){
                        e.preventDefault();
                        var id=$('.id').val();
                        var donnees = $(this).serialize();
                    var url = "{{route('Abonnement.update',':id')}}";
                    //var url = "{{route('Abonnement.update')}}";
                    url = url.replace(':id',id);
                    $.ajax({
                        url:url,
                        data:donnees,
                        method:"post",
                        success:function(data){
                            //alert('ajout avec success');
                            Swal.fire('Ventilation',"{{session()->get('Message')}}",'info');
                            window.location.reload();
                        },error:function(data){
                            alert('erreur');

                        }
                    });                  
                }); 
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

                });
                // Chargement table
                $('.abonnement').DataTable();


                // Affichage Message
                @if(session()->has('Message'))
                    Swal.fire('Ventilation',"{{session()->get('Message')}}",'info');
                @endif

    })
</script>

@endsection