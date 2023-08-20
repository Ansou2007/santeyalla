@extends('layouts.master')
@section('contenu')

<div class="card comman-shadow">
    <div class="card-body">
    <form method="post" action="{{route('Livreur.update',['livreur'=>$livreur->id])}}">
        @csrf
        @method('put')
    <div class="row">
    <div class="col-12">
    <h5 class="form-title student-info">Information Livreur <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
    </div>    
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">structure</label>
                    <select class="form-control @error('structure_id') is-invalid @enderror" name="structure_id" >
                        @foreach ($structure as $boulangerie)
                        <option value="{{$boulangerie->id}}"  {{$livreur->structure_id === $boulangerie->id ? 'selected' : ''}} >{{$boulangerie->nom_complet}}</option>
                        @endforeach
                    </select>
            @error('structure_id')
            <span class="text-danger">{{$message}}</span>
            @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Date</label>
        <input type="date" class="form-control @error('date_ventilation') is-invalid @enderror"  name="">
        @error('date_ventilation')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Prenom</label>
        <input type="text" class="form-control @error('prenom') is-invalid @enderror"  placeholder="prenom" name="prenom" value="{{$livreur->prenom}}">
        @error('prenom')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Nom</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" placeholder="nom" value="{{$livreur->nom}}">
        @error('nom')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Telephone</label>
        <input type="text" class="form-control @error('telephone') is-invalid @enderror"  placeholder="telephone" name="telephone" value="{{$livreur->telephone}}">
        @error('telephone')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Adresse</label>
        <input type="text" class="form-control @error('pu') is-invalid @enderror" placeholder="adresse" name="adresse" value="{{$livreur->adresse}}">
        @error('adresse')
        <span class="text-danger">{{$message}}</span>
         @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Type de Piece</label>
                        <select name="typePiece"  class="form-control" >
                            @if($livreur->typePiece == 0)
                            <option value="0" selected>Cin</option>
                            @else
                            <option value="1" selected>Passport</option>
                            @endif
                        </select>
    
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Numero de Piece</label>
        <input type="text" class="form-control" placeholder="numero Piece" name="numeroPiece" value="{{$livreur->numeroPiece}}">
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Photo</label>
        <input type="file" name="photo" class="form-control @error('photo')is-invalid @enderror">
    </div>
    </div>
    <div class="col-12">
    <div class="student-submit">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{route('Livreur.index')}}" class="btn btn-danger">retour</a>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>

    @if (Session()->has('Message'))
        <script>
            $(document).ready(function(){
                Swal.fire('Message',"{{session()->get('Message')}}",'info');
            })
        </script>
    @endif


@endsection