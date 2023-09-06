@extends('layouts.master')
@section('contenu')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Liste Abonnés</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="col-auto float-end">
                    <button class="BtnAjouter btn btn-primary mb-2">Ajouter Abonné</button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class=" table table-hover" id="abonnement">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom Complet</th>
                        <th>Boulangerie</th>
                        <th>Telephone</th>
                        <th>Abonnement</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abonnes as $abonne )
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$abonne->prenom}} {{$abonne->nom}}</td>
                        <td>{{$abonne->nom_complet}} </td>
                        <td><span class="">{{$abonne->telephone}}</span> </td>
                        <td> {{carbon\Carbon::parse($abonne->date_abonnement)->format('d-m-Y')}}</td>
                        <td class="text-end">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-end" style="">
                                    <a href="javascript::void(0)" type="button" class="dropdown-item BtnEdition"
                                        id="BtnEdition" data-id="{{$abonne->id}}" data-id1="{{$abonne->id}}"><i
                                            class="far fa-edit me-2"></i>Edition</a>
                                    <a href="{{route('Utilisateur.supprimer',['utilisateur'=>$abonne->id])}}"
                                        class="dropdown-item btn btn-link" id="supprimer"><i
                                            class="fas fa-trash"></i>Supprimer</a>
                                    <a class="dropdown-item" href="javascript::void(0)"><i
                                            class="far fa-eye me-2"></i>View</a>

                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @include('abonnement.ajout')
            @include('abonnement.edit')
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

                $('#abonnement').DataTable();

                @if (session()->has('Message'))
                    Swal.fire('Abonnement',"{{session()->get('Message')}}",'info');
                @endif

                 $('.BtnAjouter').on('click',function(e){
                        e.preventDefault();
                    // alert('coucou');
                    $('#ajoutAbonnement').modal('show');                 
                }); 
                // Envois
                $('.ajoutForm').on('submit',function(e){
                    e.preventDefault();
                    var donnees = $(this).serialize();
                    $.ajax({
                        url:"{{route('Abonnement.ajouter')}}",
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
                $('.BtnEdition').on('click',function(e){
                    e.preventDefault();
                    var id= $(this).attr('data-id');
                    var url = "{{route('Abonnement.edition',':id')}}";
                    url = url.replace(':id',id);
                    $.get(url,function(data){
                        //console.log(data);
                        $('#id').val(data.id);
                        $('#structure_id').val(data.structure_id);
                        $('.boulangerie').val(data.nom_complet);
                        $('.prenom').val(data.prenom);
                        $('.nom').val(data.nom);
                        $('.telephone').val(data.telephone);
                        $('.date_abonnement').val(data.date_abonnement);
                        $('#editAbonnement').modal('show'); 
                    });

                });
                  $('#EditForm').on('submit',function(e){
                        e.preventDefault();
                        var id=$('#id').val();
                        var donnees = $(this).serialize();
                    var url = "{{route('Abonnement.update',':id')}}";
                    url = url.replace(':id',id);
                    $.ajax({
                        url:url,
                        data:donnees,
                        method:"put",
                        success:function(data){
                            alert('ajout avec success');
                        },error:function(data){
                            alert('erreur');

                        }
                    });
                 
                  
                });  
                
                @if(session()->has('Message'))
                    Swal.fire('Ventilation',"{{session()->get('Message')}}",'info');
                @endif
                })
</script>

@endsection