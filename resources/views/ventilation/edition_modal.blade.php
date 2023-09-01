{{-- Modal Edition--}}
<form action="" id="editionForm">
    <div class="modal fade" id="editionVentilation" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edition Ventilation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="livreur_id" id="livreur_id">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Livreur</label>
                                <input type="text" class="form-control Livreur" id="Livreur" name="livreur">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date Ventilation</label>
                                <input type="date" class="form-control date_ventilation" id="date_ventilation"
                                    name="date_ventilation">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ventile" class="form-label">Ventile</label>
                                <input type="number" class="form-control ventile" id="ventile" name="ventile">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Non Ventile</label>
                                <input type="number" class="form-control non_ventile" id="non_ventile"
                                    name="non_ventile">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Retour</label>
                                <input type="number" class="form-control retour" id="retour" name="retour">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Prix unitaire</label>
                                <input type="text" class="form-control pu" id="pu" name="pu">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Montant Versé</label>
                                <input type="number" class="form-control mtn_verse" id="mtn_verse" name="mtn_verse">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Location</label>
                                <input type="text" class="form-control location" id="location" name="location">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Qté Vendue</label>
                                <input type="number" class="form-control qte_vendue" id="qte_vendue" name="qte_vendue">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Montant A Versé</label>
                                <input type="text" class="form-control montant_a_verser" id="montant_a_verser"
                                    name="montant_a_verser">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Reliquat</label>
                                <input type="text" class="form-control reliquat" id="reliquat" name="reliquat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-warning">Verifier</button>
                    <button type="button" class="btn btn-primary">Modifier</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- Fin Modal--}}