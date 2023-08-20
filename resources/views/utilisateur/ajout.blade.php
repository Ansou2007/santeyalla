@extends('layouts.master')

@section('contenu')
<div class="card comman-shadow">
    <div class="card-body">
    <form method="post">
        @csrf
    <div class="row">
    <div class="col-12">
    <h5 class="form-title student-info">Information Utilisateur <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
    <label>Boulangerie <span class="login-danger">*</span></label>
    <select class="form-control @error('structure_id') is-invalid @enderror" id="" name="structure_id">
        <option value="" selected disabled>Selectionner</option>
        @foreach ($structure as $structure )
            <option value="{{$structure->id}}">{{$structure->nom_complet}}</option>
        @endforeach
    </select>
    @error('structure_id')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
    <label>Prenom <span class="login-danger">*</span></label>
    <input class="form-control @error('prenom') is-invalid @enderror" type="text" placeholder="prenom" name="prenom">
    @error('prenom')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
    <label>Nom <span class="login-danger">*</span></label>
    <input class="form-control @error('nom') is-invalid @enderror" type="text" placeholder="nom" name="nom">
    @error('nom')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
    <label>Email <span class="login-danger">*</span></label>
    <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="email" name="email">
    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
    <label>Telephone </label>
    <input class="form-control @error('telephone') is-invalid @enderror" type="number" placeholder="telephone" name="telephone">
    @error('telephone')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
    <label>Role<span class="login-danger">*</span></label>
    <select class="form-control" name="role" >
    <option  disabled>Role </option>
    <option value="Admin">Administrateur</option>
    <option value="Ventileur">Ventileur</option>
    <option value="Livreur" selected>Livreur</option>
    </select>
    </div>
    </div>
    <div class="col-12 col-sm-4">
    <div class="form-group local-forms">
    <label>status <span class="login-danger">*</span></label>
    <select class="form-control" name="status">
    <option  disabled>Status</option>
    <option value="Actif" selected>Actif</option>
    <option value="Inactif">inactif</option>
    </select>
    </div>
    </div>
    
    <div class="col-12 col-sm-4">
    <div class="form-group local-forms">
    <label>Adresse </label>
    <input class="form-control" type="text" placeholder="Adresse" name="adresse">
    </div>
    </div>
    
    <div class="col-12 col-sm-4">
    <div class="form-group students-up-files">
    <div class="uplod">
    <label class="file-upload image-upbtn mb-0">
    Choisir photo <input type="file" name="photo">
    </label>
    </div>
    </div>
    </div>
    <div class="col-12">
    <div class="student-submit">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{route('Utilisateur.index')}}" class="btn btn-danger">retour</a>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    
     @if (session()->has('Message'))
     <script>
        $(document).ready(function(){
            Swal.fire('Message',"{{session()->get('Message')}}",'info');
        })
    </script>
@endif

@endsection


