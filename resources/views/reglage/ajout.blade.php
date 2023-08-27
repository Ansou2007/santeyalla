@extends('layouts.master')
@section('contenu')
<div class="row">
    <div class="col-sm-12">
    <div class="card">
    <div class="card-body">
    <form method="post" action="">
        @csrf
    <div class="row">
    <div class="col-12">
    <h5 class="form-title"><span>Ajout Reglage</span></h5>
    </div>
    <div class="col-12 col-sm-4">
    <div class="form-group local-forms">
    <label>Option <span class="login-danger">*</span></label>
    <select name="type" id="" class="form-control">
        <option selected disabled></option>
        <option value="DATE_PAIEMENT">Date de Paiement</option>
        <option value="TAUX_COMMISION">Taux de Commission</option>
        <option value="APP_NAME">Nom de l'application</option>
        <option value="DEVELOPPEUR">Developpeur</option>
        <option value="AUTRE">Autres</option>
    </select>
    </div>
    </div>
    <div class="col-12 col-sm-4">
    <div class="form-group local-forms">
    <label>Valeur <span class="login-danger">*</span></label>
    <input type="text" class="form-control" name="value">
    </div>
    </div>
    
    <div class="col-12">
    <div class="student-submit">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{route('Reglage.index')}}" class="btn btn-danger">retour</a>

    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    <script>
        $(document).ready(function(){
            @if (session()->has('Message'))
                Swal.fire('Message',"{{session()->get('Message')}}",'info');
            @endif
    
        })
    </script>
@endsection