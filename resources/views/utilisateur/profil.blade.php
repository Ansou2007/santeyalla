@extends('layouts.master')

@section('contenu')
<div class="col-md-12">
    <div class="profile-header">
    <div class="row align-items-center">
    <div class="col-auto profile-image">
    <a href="#">
    <img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
    </a>
    </div>
    <div class="col ms-md-n2 profile-user-info">
    <h4 class="user-name mb-0">{{$profil->prenom}}&nbsp{{$profil->nom}}</h4>
    <h6 class="text-muted">{{$profil->role}}</h6>
    <div class="user-Location"><i class="fas fa-map-marker-alt"></i></div>
    <div class="about-text">{{$profil->adresse}}</div>
    </div>
    <div class="col-auto profile-btn">
    <a href="" class="btn btn-primary">
    Edit
    </a>
    </div>
    </div>
    </div>
    <div class="profile-menu">
    <ul class="nav nav-tabs nav-tabs-solid">
    <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">A propos</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Mot de passe</a>
    </li>
    </ul>
    </div>
    <div class="tab-content profile-tab-cont">
    
    <div class="tab-pane fade show active" id="per_details_tab">
    <div class="row">
    <div class="col-lg-9">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title d-flex justify-content-between">
    <span>Information</span>
    <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="far fa-edit me-1"></i>Edit</a>
    </h5>
    <div class="row">
    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nom Complet</p>
    <p class="col-sm-9">{{$profil->prenom}} {{$profil->nom}}</p>
    </div>
    <div class="row">
    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Date de Naissance</p>
    <p class="col-sm-9">24 Jul 1983</p>
    </div>
    <div class="row">
    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email</p>
    <p class="col-sm-9">{{$profil->email}}</p>
    </div>
    <div class="row">
    <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Telephone</p>
    <p class="col-sm-9">{{$profil->telephone}}</p>
    </div>
    <div class="row">
    <p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
     <p class="col-sm-9 mb-0">{{$profil->adresse}}<br></p>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>
    <div id="password_tab" class="tab-pane fade">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">Change Password</h5>
    <div class="row">
    <div class="col-md-10 col-lg-6">
    <form>
    <div class="form-group">
    <label>Ancien Mot de passe</label>
    <input type="password" class="form-control">
    </div>
    <div class="form-group">
    <label>Nouveau Mot de passe</label>
    <input type="password" class="form-control">
    </div>
    <div class="form-group">
    <label>Confirmation Mot de passe</label>
    <input type="password" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">Enregistrer</button>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </div>
    </div>
@endsection