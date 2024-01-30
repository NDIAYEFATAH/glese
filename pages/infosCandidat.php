<div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Offre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateform" action="" method="post">
            <div class="modal-body">
                <input type="hidden" name="idOffre" value="<?= $offreDetails['idOFFRE'] ?>">
                <label for="" class="h4">Poste</label>
                <input type="text" class="form-control" name="poste" value="<?= $offreDetails['poste'] ?>">
                <label for="" class="h4">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="5">
                <?= $offreDetails['description'] ?>
                </textarea>
                
                <label for="" class="h4">Competence</label>
                <textarea name="competence" class="form-control" cols="30" rows="5">
                <?= $offreDetails['competence'] ?>
                </textarea>
                
                <label for="" class="h4">Type</label>
                <select name="type" id="" class="form-control">
                    <option value="emploi" <?= $offreDetails['type']=="emploi" ? "SELECTED" : ""  ?>>Emploi</option>
                    <option value="stage" <?= $offreDetails['type']=="stage" ? "SELECTED" : ""  ?>>Stage</option>
                </select>
                <div class="mt-2">
                    <input type="checkbox" name="publier" id="" checked>Publier
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="modifier">Enregistrer</button>
            </div>
      </form>
    </div>
  </div>
</div>