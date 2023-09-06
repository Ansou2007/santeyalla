<!-- Modal -->
<form action="" id="ajoutForm" method="post" class="ajoutForm">
    @csrf
    <div class="modal fade" id="ajoutAbonnement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout Abonné</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Boulangerie</label>
                                <select class="form-control @error('structure_id') is-invalid @enderror"
                                    name="structure_id" id="boulangerie">
                                    <option selected disabled>Selectionner</option>
                                    @foreach ($structure as $structure )
                                    <option value="{{$structure->id}}">{{$structure->nom_complet}}</option>
                                    @endforeach
                                </select>
                                @error('structure_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Date Abonnement</label>
                                <input type="date" class="form-control" id="date_abonnement" name="date_abonnement"
                                    value="{{Carbon\Carbon::now()->toDateString()}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Telephone</label>
                                <input type="number" class="form-control @error('telephone') is-invalid @enderror"
                                    id="telephone" name="telephone">
                            </div>
                            @error('telephone')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</form>
{{-- Fin Modal--}}