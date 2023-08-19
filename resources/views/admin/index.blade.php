@extends('layouts.master')
@section('contenu')
<div class="row">
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Ventilation</h6>
                        <h3>{{$montant_ventilation}}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{asset('img/icons/dash-icon-01.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Reliquat</h6>
                        <h3>{{$montant_reliquat}}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{asset('img/icons/dash-icon-01.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Livreur</h6>
                        <h3>{{$total_livreur}}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{asset('img/icons/dash-icon-02.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Abonnement</h6>
                        <h3>{{$total_abonnement}}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{asset('img/icons/dash-icon-03.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Employe</h6>
                        <h3>{{$total_employe}}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{asset('img/icons/dash-icon-04.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 d-flex">
        <div class="card bg-comman w-100">
            <div class="card-body">
                <div class="db-widgets d-flex justify-content-between align-items-center">
                    <div class="db-info">
                        <h6>Salaires</h6>
                        <h3>{{$montant_salaire}}</h3>
                    </div>
                    <div class="db-icon">
                        <img src="{{asset('img/icons/dash-icon-04.svg')}}" alt="Dashboard Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
