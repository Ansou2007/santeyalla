@extends('layouts.master')

@section('contenu')
<div class="card comman-shadow">
    <div class="card-body">
    <form method="post">
        @csrf
    <div class="row">
    <div class="col-12">
    <h5 class="form-title student-info">Detail Ventilation <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span></h5>
    </div>    
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Livreur</label>
                    <select class="form-control @error('livreur_id') is-invalid @enderror" name="livreur_id" >
                        <option value="" selected disabled>{{$ventilation->livreurs->prenom}} {{$ventilation->livreurs->nom}}</option>
                    </select>
                    @error('livreur_id')
                           <span class="text-danger">{{$message}}</span>
                       @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Date ventilation</label>
        <input type="date" class="form-control @error('date_ventilation') is-invalid @enderror"  name="date_ventilation" value="{{$ventilation->date_ventilation}}" readonly>
        @error('date_ventilation')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Ventile</label>
        <input type="text" class="form-control @error('ventile') is-invalid @enderror"  name="ventile" value="{{$ventilation->ventile}}" readonly>
        @error('ventile')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Non Ventile</label>
        <input type="text" class="form-control @error('non_ventile') is-invalid @enderror" name="non_ventile" placeholder="non ventile" value="{{$ventilation->non_ventile}}" readonly>
        @error('non_ventile')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Retour</label>
        <input type="text" class="form-control @error('retour') is-invalid @enderror"  placeholder="retour" name="retour" value="{{$ventilation->retour}}" readonly>
        @error('retour')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Prix Unitaire</label>
        <input type="text" class="form-control @error('pu') is-invalid @enderror" placeholder="Prix Unitaire" name="pu" value="{{$ventilation->pu}}" disabled>
        @error('pu')
        <span class="text-danger">{{$message}}</span>
         @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Qté Vendue</label>
        <input type="text" class="form-control @error('qte_vendue') is-invalid @enderror"  placeholder="Qté vendue" name="qte_vendue" value="{{$ventilation->qte_vendue}}" disabled>
        @error('qte_vendue')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Location</label>
        <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{$ventilation->location}}" disabled>
        @error('location')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Montant Versé</label>
        <input type="text" class="form-control @error('montant_verse') is-invalid @enderror"  placeholder="Montant Versé" name="montant_verse" value="{{$ventilation->montant_verse}}">
    </div>
    </div>    
    
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Montant A Versé</label>
        <input type="text" class="form-control @error('montant_a_verse') is-invalid @enderror" name="montant_a_verse" value="{{$ventilation->montant_a_verse}}" disabled>
        @error('montant_verse')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Reliquat</label>
        <input type="text" class="form-control @error('reliquat') is-invalid @enderror"   name="reliquat" value="{{$ventilation->reliquat}}" disabled>
    </div>
    </div>
    
    <div class="col-12">
    <div class="student-submit">
    <a href="{{route('Ventilation.index')}}" class="btn btn-primary btn-block">retour</a>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>






@endsection