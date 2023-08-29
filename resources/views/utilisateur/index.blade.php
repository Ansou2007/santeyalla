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
                     <td><a href="" class="btn btn-warning">reinistialiser</a></td>
                    <td class="text-center">
                        <a href="{{route('Utilisateur.edit',['utilisateur'=>$utilisateur->id])}}" type="button" class="btn btn-success waves-effect waves-light mt-1" data-bs-toggle="modal" data-bs-target="#con-close-modal">Edit</a>
                        <a href="{{route('Utilisateur.supprimer',['utilisateur'=>$utilisateur->id])}}" class="btn btn-link" id="supprimer"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
                {{-- Modal Edition--}}
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
                    <div class="col-md-12">
                    <div class="mb-3">
                    <label for="field-3" class="form-label">Address</label>
                    <input type="text" class="form-control" id="field-3" placeholder="Address">
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
                    <div class="row">
                    <div class="col-md-12">
                    <div class="">
                    <label for="field-7" class="form-label">Personal Info</label>
                    <textarea class="form-control" id="field-7" placeholder="Write something about yourself"></textarea>
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
           /*      
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })
                Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
                }) */

                })
        </script> 
       
@endsection
 

