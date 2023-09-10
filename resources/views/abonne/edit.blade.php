<!-- Modal -->
<form id="EditForm" class="EditForm" method="post">
    @csrf
    @method('post')
    <div class="modal fade " id="editAbonnement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edition Abonné</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Boulangerie</label>
                                <input type="hidden" class="form-control id" name="id" id="id">
                                <input type="hidden" class="form-control structure_id" name="structure_id"
                                    id="structure_id">
                                <input type="text" class="form-control boulangerie" name="boulangerie" id="boulangerie"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Date Abonnement</label>
                                <input type="date" class="form-control date_abonnement" id="date_abonnement"
                                    name="date_abonnement" value="{{Carbon\Carbon::now()->toDateString()}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Prénom</label>
                                <input type="text" class="form-control prenom" id="prenom" name="prenom">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Nom</label>
                                <input type="text" class="form-control nom" id="nom" name="nom">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Telephone</label>
                                <input type="number"
                                    class="form-control telephone @error('telephone') is-invalid @enderror"
                                    id="telephone" name="telephone">
                            </div>
                            @error('telephone')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

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