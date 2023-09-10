<!-- Modal -->
<form id="ajoutForm" method="post" class="ajoutForm">
    @csrf
    <div class="modal fade" id="ajoutAbonnement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout Abonnement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Abonné</label>
                                <select class="form-control @error('abonnement_id') is-invalid @enderror"
                                    name="abonnement_id" id="abonnement_id" required>
                                    <option selected disabled>Selectionner</option>
                                    @foreach ($abonnes as $abonnes )
                                    <option value="{{$abonnes->id}}">{{$abonnes->prenom}}
                                        {{$abonnes->nom}}->{{$abonnes->nom_complet}}</option>
                                    @endforeach
                                </select>
                                @error('abonnement_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date_ventilation" name="date_ventilation"
                                    value="{{Carbon\Carbon::now()->toDateString()}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Qté</label>
                                <input type="number" class="form-control" id="qte" name="qte">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Prix</label>
                                <input type="number" class="form-control" id="pu" name="pu" value="200">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="hidden" class="form-control @error('montant') is-invalid @enderror"
                                    id="montant" name="montant">
                            </div>
                            @error('montant')
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