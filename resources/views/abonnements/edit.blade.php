<!-- Modal -->
<form id="EditForm" class="EditForm" method="post">
    @csrf
    @method('put')
    <div class="modal fade" id="editAbonnement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edition Abonnement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="hidden" class="id" name="id" id="id">
                                <input type="hidden" class="abonnement_id" name="abonnement_id" id="abonnement_id">
                                <label for="field-1" class="form-label">Nom Complet</label>
                                <input type="text" class="prenom form-control" name="prenom" id="prenom" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Date</label>
                                <input type="date" class="date_ventilation form-control" id="date_ventilation"
                                    name="date_ventilation" value="{{Carbon\Carbon::now()->toDateString()}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Qté</label>
                                <input type="text" class="qte form-control" id="qte" name="qte">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Prix</label>
                                <input type="number" class="pu form-control" id="pu" name="pu" value="200">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Montant</label>
                                <input type="number" class="form-control @error('montant') is-invalid @enderror"
                                    id="montant" name="montant">
                            </div>
                            @error('montant')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Modifier</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</form>
{{-- Fin Modal--}}