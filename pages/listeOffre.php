<div class="row mt-2">
<?php
   
        foreach ($listeOffrePublier as $key => $offre) { ?>
            <div class="col-md-4 mb-3">
                <div class="card border border-1 border-primary">
                    <div class="card-body">
                        <h4 class="text-primary"><?= $offre['poste'] ?></h4>
                    </div>
                    <div class="card-footer">
                        <a href="?page=detailOffre&id=<?= $offre['idOFFRE'] ?>" class="btn btn-sm btn-primary float-end">Details</a>
                    </div>
                </div>
            </div>
        <?php }?>
</div>