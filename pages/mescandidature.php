<div class="card">
    <div class="card-header">
        <h2 class="text-center">Mes Candidatures</h2>
    </div>
    <div class="card-body">
        <div class="row mt-2">
            <h3 class="test-center" <?= sizeof($listeCandidature)!=0 ? "hidden" : "" ?>>Vous n'avez postulé a aucune offre</h3>
            <?php
    
            foreach ($listeCandidature as $key => $offre) { ?>
                <div class="col-md-4 mb-3">
                    <div class="card border border-1 border-primary">
                        <div class="card-body">
                            <h4 class="text-primary"><?= $offre['poste'] ?></h4>
                            <h6 <?= $offre['etatCandidature']==-1 ? "" : "hidden" ?> class="text-warning">En attente de validation...</h6>
                            <h6 <?= $offre['etatCandidature']==1 ? "" : "hidden" ?> class="text-primary">Candidature Validée</h6>
                            <h6 <?= $offre['etatCandidature']==0 ? "" : "hidden" ?> class="text-danger">Candidature Refusée</h6>
                        </div>
                        <div class="card-footer">
                            <a href="?page=detailOffre&id=<?= $offre['idOFFRE'] ?>" class="btn btn-sm btn-primary float-end">Details</a>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</div>