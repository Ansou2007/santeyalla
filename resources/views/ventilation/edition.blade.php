@extends('layouts.master')

@section('contenu')
<div class="card comman-shadow">
    <div class="card-body">
    <form method="post" action="{{route('Ventilation.update',['ventilation'=>$ventilation->id])}}">
        @csrf
        @method('put')
    <div class="row">
    <div class="col-12">
    <h5 class="form-title student-info">Edition Ventilation <span><a href="javascript:void(0)"><i class="feather-more-vertical"></i></a></span></h5>
    </div>    
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Livreur</label>
                    <select class="form-control @error('livreur_id') is-invalid @enderror" name="livreur_id" >
                        <option value="{{$ventilation->livreurs->id}}" selected>{{$ventilation->livreurs->prenom}} {{$ventilation->livreurs->nom}}</option>
                    </select>
                    @error('livreur_id')
                           <span class="text-danger">{{$message}}</span>
                       @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Date ventilation</label>
        <input type="date" class="form-control @error('date_ventilation') is-invalid @enderror"  name="date_ventilation" value="{{$ventilation->date_ventilation}}">
        @error('date_ventilation')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Ventile</label>
        <input type="text" class="form-control @error('ventile') is-invalid @enderror"  placeholder="ventile" name="ventile" id="ventile" value="{{$ventilation->ventile}}">
        @error('ventile')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Non Ventile</label>
        <input type="text" class="form-control @error('non_ventile') is-invalid @enderror" name="non_ventile" placeholder="non ventile" id="non_ventile" value="{{$ventilation->non_ventile}}">
        @error('non_ventile')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Retour</label>
        <input type="text" class="form-control @error('retour') is-invalid @enderror"  placeholder="retour" name="retour" id="retour" value="{{$ventilation->retour}}">
        @error('retour')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Prix Unitaire</label>
        <input type="text" class="form-control @error('pu') is-invalid @enderror" placeholder="Prix Unitaire" name="pu" id="pu" value="{{$ventilation->pu}}">
        @error('pu')
        <span class="text-danger">{{$message}}</span>
         @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="form-group local-forms">
            <label for="">Montant Versé</label>
            <input type="text" class="form-control @error('montant_verse') is-invalid @enderror"  placeholder="Montant Versé" id="mtn_verse" name="montant_verse" value="{{$ventilation->montant_verse}}">
        </div>
    </div> 
    <div class="col-12 col-sm-6">
        <div class="form-group local-forms">
            <label for="exampleInputEmail1">Location</label>
            <input type="number" class="form-control @error('location') is-invalid @enderror" name="location" id="location" value="{{$ventilation->location}}">
            @error('location')
            <span class="text-danger">{{$message}}</span>
        @enderror
        </div>
        </div>

    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Qté Vendue</label>
        <input type="hidden" class="form-control @error('qte_vendue') is-invalid @enderror"  placeholder="Qté vendue" id="qte_vendue" name="qte_vendue" value="{{$ventilation->qte_vendue}}">
        @error('qte_vendue')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="exampleInputEmail1">Montant A Versé</label>
        <input type="hidden" class="form-control @error('montant_a_verse') is-invalid @enderror" id="montant_a_verser" name="montant_a_verse" value="{{$ventilation->montant_a_verse}}">
        @error('montant_a_verse')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    </div>
    <div class="col-12 col-sm-6">
    <div class="form-group local-forms">
        <label for="">Reliquat</label>
        <input type="hidden" class="form-control @error('reliquat') is-invalid @enderror" id="reliquat"   name="reliquat" value="{{$ventilation->reliquat}}">
   @error('reliquat')
   <span class="text-danger">{{$message}}</span>
   @enderror
    </div>
    </div>
    
    <div class="col-12">
    <div class="student-submit">
    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <button id="btn_verify" class="btn btn-warning">Verifier</button>
    <a href="{{route('Ventilation.index')}}" class="btn btn-danger">retour</a>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>


    <script>
     $(document).ready(function(e){
            /* calcul */
        function calcul() {
            var ventile = parseInt($('#ventile').val());
            var nventile = parseInt($('#non_ventile').val());
            var retour = parseInt($('#retour').val());
            var prix = parseInt($('#pu').val());
            var location = parseInt($('#location').val());
            var mtn_verse = parseInt($('#mtn_verse').val());
            var qte_vendue = ventile - (nventile + retour);
            var montant_vendue = (qte_vendue * prix) - location;
            $('#qte_vendue').val(qte_vendue);
            $('#montant_a_verser').val(montant_vendue);
            var reliquat = montant_vendue - mtn_verse;
            $('#reliquat').val(reliquat);
            console.log('Qté Vendue :' + qte_vendue);
            console.log('Montant Vendue : ' + montant_vendue);
            console.log('Reliquat : ' + reliquat);
        }

        $('#pu').on('keyup',function(e){
            e.preventDefault();
            calcul();
        });
        $('#location').on('keyup',function(e){
            e.preventDefault();
            calcul();
        });

        $('#mtn_verse').on('keyup',function(e){
            e.preventDefault();
            calcul();
        });
        // Verification
        $('#btn_verify').click(function(e){
            e.preventDefault();
            calcul();
            var location = $('#location').val();
            var montant = $('#montant_a_verser').val();
            var qte = $('#qte_vendue').val();
            var reliquat = $('#reliquat').val();
            swal.fire({
                icon: 'info',
                toast: true,
                title: 'Verification',
                text: 'Vendue = ' + qte + ' Montant = ' + montant + ' Reliquat = ' + reliquat
            });
        });

        })
    </script>

@if (session()->has('Message'))
<script>
    $(document).ready(function(e){
        Swal.fire('Ventilation',"{{session()->get('Message')}}",'info');
    })
</script>
@endif

@endsection