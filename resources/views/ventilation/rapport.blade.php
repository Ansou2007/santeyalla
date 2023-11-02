@extends('layouts.master')

@section('contenu')
<div class="card report-card">
    <div class="card-body pb-0">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('Ventilation.pdf')}}" method="post" class="form" target="_blank">
                    @csrf
                    <ul class="app-listing">
                        <li>
                            <div class="multipleSelection">
                                <label for=""><i class="fas fa-user me-1 select-icon"></i>Livruer</label>
                                <select name="livreur_id" id="livreur" class="form-control" required>
                                    <option value="" selected disabled>Livreur</option>
                                    @foreach ($livreur as $livreur )
                                    <option value="{{$livreur->id}}">{{$livreur->prenom}} {{$livreur->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="multipleSelection">
                                <label for=""><i class="fas fa-calendar me-1 select-icon"></i>Date debut</label>
                                <input type="date" name="date_debut" id="" class="form-control">
                            </div>
                        </li>
                        <li>
                            <div class="multipleSelection">
                                <label for=""><i class="fas fa-calendar me-1 select-icon"></i>Date fin</label>
                                <input type="date" name="date_fin" id="" class="form-control">
                            </div>
                        </li>
                        <li>
                            <div class="multipleSelection">
                                <label for=""> <i class="fas fa-book-open me-1 select-icon"></i>Boulangerie</label>
                                <select name="boulangerie" id="boulangerie" class="form-control" required>
                                    <option value="" selected disabled>boulangerie</option>
                                    @foreach ($boulangerie as $boulangerie )
                                    <option value="{{$boulangerie->nom_complet}}">{{$boulangerie->nom_complet}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="multipleSelection">
                                <label for=""><i class="fas fa-print"></i></label>
                                <button type="submit" class="form-control btn btn-primary">Generer rapport</button>
                            </div>
                        </li>

                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
            $('#livreur').select2();
            $('#boulangerie').select2();            
        })
</script>
@if(session()->has('Message'))
<script>
    Swal.fire('rapport',"{{session()->get('Message')}}",'info');
</script>
@endif
@endsection