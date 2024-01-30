<div class="row alert alert-success" <?= isset($verifCandidat) && $verifCandidat ? "" : "hidden" ?>>
  <h4>Vous avez postulé à cette offre (<?= isset($verifCandidat) && $verifCandidat['dateCandidature'] ?>)</h4>
  <h6 <?= isset($verifCandidat) && $verifCandidat['etatCandidature']==-1 ? "" : "hidden" ?> class="text-warning">En attente de validation...</h6>
  <h6 <?= isset($verifCandidat) && $verifCandidat['etatCandidature']==1 ? "" : "hidden" ?> class="text-primary">Candidature Validée</h6>
  <h6 <?= isset($verifCandidat) && $verifCandidat['etatCandidature']==0 ? "" : "hidden" ?> class="text-danger">Candidature Refusée</h6>
</div>
<div class="container register">
    <div class="row">
        <div class="col-md-9 register-right">
          <form method="POST" action="" enctype="multipart/form-data">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                       
                            <input <?= isset($verifCandidat) && $verifCandidat ? "hidden" : "" ?> type="submit" name="postuler" class="btn btn-sm btn-primary me-md-2" value="postuler">
                        <input type="hidden" name="idOffre" value="<?= $offreDetails['idOFFRE'] ?>">
                    </div>
                    <input type="hidden" name="_token" value="OMa10xR8vE9L09zEdFkyIUulU0AAdhECOnwKQGhR">                    
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row register-form"> 
                            <fieldset class="col-md-12">
                              <legend class="legend"><?= $offreDetails['poste'] ?></legend>
                              <p><strong>Description</strong></p>
                              <p class="text-justify"><?= $offreDetails['description'] ?></p>
                              <p><strong>Competence</strong></p>
                              <p class="text-justify"><?= $offreDetails['competence'] ?><br></p>
                            </fieldset>
                          </div>
                        </div>
                  </form>
              </div>
                
              </div>
        </div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Offre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
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
        
