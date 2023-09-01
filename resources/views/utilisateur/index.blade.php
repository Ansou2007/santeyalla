@extends('layouts.master')
@section('contenu')
    <div class="card">
        <div class="card-header">
        <h5 class="card-title">Liste Utilisateur</h5>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-hover" id="utilisateur">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Nom Complet</th>
                    <th>Email</th>
                    <th>Boulangerie</th>
                    <th>Telephone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Password</th>
                    <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($utilisateur as $utilisateur ) 
                    <tr> 
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$utilisateur->prenom}} {{$utilisateur->nom}}</td>
                    <td>{{$utilisateur->email}} </td>
                    <td><span class="badge badge-info">{{$utilisateur->structures->nom_complet}}</span> </td>
                    <td> {{$utilisateur->telephone}}</td>
                    <td>
                        <span class="badge badge-success">{{$utilisateur->role}}</span>
                     </td>
                    <td>
                        @if ($utilisateur->status == "Actif")
                            <span class="badge badge-success">{{$utilisateur->status}}</span>
                        @else
                            <span class="badge badge-danger">{{$utilisateur->status}}</span>
                        
                        @endif                            
                     </td>
                     <td><button href="" class="btn btn-warning" id="BtnModal">reinistialiser</button></td>
                    <td class="text-center">
                        <a href="#" type="button" class="btn btn-success BtnEdition" id="BtnEdition"  data-id="{{$utilisateur->id}}" >Edit</a>
                        <a href="{{route('Utilisateur.supprimer',['utilisateur'=>$utilisateur->id])}}" class="btn btn-link" id="supprimer"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
                {{-- Modal Edition--}}


  
  <!-- Modal -->
  <form action="" id="editionForm">
  <div class="modal fade" id="editionUtilisateur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edition Utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-md-6">
                <div class="mb-3">
                <label for="field-1" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" >
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <label for="field-2" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" >
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="mb-3">
                <label for="field-1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <label for="field-2" class="form-label">Boulangerie</label>
                <input type="text" class="form-control" id="boulangerie" name="boulangerie" >
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="mb-3">
                <label for="field-1" class="form-label">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" >
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                <label for="field-2" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" >
                </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Modifier</button>
        </div>
      </div>
    </div>
  </div>
               {{--  <form action="" id="modal">                
                <div class="col-xl-6">
                    <div class="card">
                    <div class="card-body">
                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Edition Utilisateur</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                    <div class="row">
                    <div class="col-md-6">
                    <div class="mb-3">
                    <label for="field-1" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="field-1" value="{{$utilisateur->prenom}}">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                    <label for="field-2" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="field-2" value="{{$utilisateur->prenom}}">
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                    <div class="mb-3">
                    <label for="field-1" class="form-label">Email</label>
                    <input type="text" class="form-control" id="field-1" value="{{$utilisateur->email}}">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="mb-3">
                    <label for="field-2" class="form-label">Telephone</label>
                    <input type="text" class="form-control" id="field-2" value="{{$utilisateur->telephone}}">
                    </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                    <div class="mb-3">
                    <label for="field-4" class="form-label">City</label>
                    <input type="text" class="form-control" id="field-4" placeholder="Boston">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="mb-3">
                    <label for="field-5" class="form-label">Country</label>
                    <input type="text" class="form-control" id="field-5" placeholder="United States">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="mb-3">
                    <label for="field-6" class="form-label">Zip</label>
                    <input type="text" class="form-control" id="field-6" placeholder="123456">
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>
                    </div>
                    </div>
                    </div>
                </form> --}}
            </form>
                {{-- Fin Modal--}}
        </div>
        </div>
        </div>
        <script>
            $(document).ready(function(){

                $('#utilisateur').DataTable();

                @if (session()->has('Message'))
                    Swal.fire('Utilisateur',"{{session()->get('Message')}}",'info');
                @endif

                 $('.BtnEdition').on('click',function(e){
                        e.preventDefault();
                        var utilisateur = $(this).data('id');
                     $.get('utilisateur/detail/'+utilisateur,function(data){
                       // alert(data.prenom)
                       $('#prenom').val(data.prenom);
                       $('#nom').val(data.nom);
                       $('#email').val(data.email);
                       $('#boulangerie').val(data.structure_id);
                       $('#telephone').val(data.telephone);
                       $('#role').val(data.role);
                       $('#editionUtilisateur').modal('show');
                     })
                      
                 
                  
                }); 
                

                })
        </script> 
       
@endsection
 

