@extends('layouts.master')
@section('contenu')
    <div class="card">
        <div class="card-header">
        <h5 class="card-title">Liste Livreur</h5>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-hover" id="livreur">
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
                        <a href="{{route('Livreur.edition',['livreur'=>$livreur->id])}}" class="btn btn-link"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-link" id="supprimer"><i class="fas fa-trash"></i></button>
                    </td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
        </div>
        </div>
        </div>
      
        <script async>
            $(document).ready(function(){

                $('#livreur').DataTable();


                })
        </script> 
@endsection
 

