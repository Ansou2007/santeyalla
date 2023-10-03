@extends('layouts.master')
@section('contenu')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Liste Livreur</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="livreur table table-hover" id="livreur">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricule</th>
                        <th>Livreur</th>
                        <th>Boulangerie</th>
                        <th>Telephone</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livreur as $livreur )
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$livreur->matricule}} </td>
                        <td>{{$livreur->prenom}} {{$livreur->nom}}</td>
                        <td><span class="badge badge-success">{{$livreur->structures->nom_complet}}</span> </td>
                        <td>
                            {{$livreur->telephone}}
                        <td class="text-center">
                            <a href="{{route('Livreur.edition',['livreur'=>$livreur->id])}}" class="btn btn-link"><i
                                    class="fas fa-edit"></i></a>
                            <a href="Javascript::void(0)" type="button" class="BtnSupprimer  btn-link"
                                data-id="{{$livreur->id}}" data-url="{{route('Livreur.delete',$livreur->id)}}"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){

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
                // Fin Suppression
                
                $('.livreur').DataTable();

                //toastr.success('coucou');

            });
               
</script>
@endsection