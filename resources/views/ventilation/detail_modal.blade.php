{{-- Modal Edition--}}

<!-- Modal -->
<form action="" id="editionForm">
    <div class="modal fade" id="detailVentilation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Ventilation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <input type="hidden" name="livreur_id" id="livreur_id">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Livreur</label>
                                <input type="text" class="form-control" id="Livreur" name="livreur" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date Ventilation</label>
                                <input type="date" class="form-control" id="date_ventilation" name="date_ventilation"
                                    disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ventile" class="form-label">Ventile</label>
                                <input type="number" class="form-control" id="ventile" name="ventile" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Non Ventile</label>
                                <input type="number" class="form-control" id="non_ventile" name="non_ventile" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Retour</label>
                                <input type="number" class="form-control" id="retour" name="retour" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Prix unitaire</label>
                                <input type="text" class="form-control" id="pu" name="pu" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Montant Versé</label>
                                <input type="number" class="form-control" id="mtn_verse" name="mtn_verse" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Qté Vendue</label>
                                <input type="number" class="form-control" id="qte_vendue" name="qte_vendue" disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Montant A Versé</label>
                                <input type="text" class="form-control" id="montant_a_verser" name="montant_a_verser"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">Reliquat</label>
                                <input type="text" class="form-control" id="reliquat" name="reliquat" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

</form>
{{-- Fin Modal--}}