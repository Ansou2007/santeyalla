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
                        <a href="" class="btn btn-link"><i class="fas fa-edit"></i></a>
                        {{-- <a href="{{route('Utilisateur.supprimer',['utilisateur'=>$utilisateur->id])}}" class="btn btn-link" id="supprimer"><i class="fas fa-trash"></i></a> --}}
                        <form action="{{route('Utilisateur.supprimer',['utilisateur'=>$utilisateur->id])}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
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
 

