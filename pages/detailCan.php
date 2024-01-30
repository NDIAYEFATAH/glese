<div class="content">
        <div class="card">
                <div class="card-header">
                    <h5 class="modal-title" id="exampleModalLabel">Details Candidat</h5>
                    <button type="button" class="btn btn-outline-primary float-end">Voir CV</button>
                </div>
            
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Infos Perso</h4>
                </div>
                <div class="card-body">
                    
                        <h3 class="font-weight-bold"><span>Prenom: </span><?= $listeCandidatPers['prenom'] ?></h3>
                        <h3 class="font-weight-bold"><span class="text-dark">Nom: </span><?= $listeCandidatPers['nom'] ?></h3>
                        <h3 class="font-weight-bold"><span class="text-dark">Email: </span><?= $listeCandidatPers['email'] ?></h3>
                        <h3 class="font-weight-bold"><span class="text-dark">Telephone: </span><?= $listeCandidatPers['tel'] ?></h3>
                        <h3 class="font-weight-bold"><span class="text-dark">Adresse: </span><?= $listeCandidatPers['adresse'] ?></h3>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Mes Candidatures</h2>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <h3 class="test-center" <?= sizeof($listeCan)!=0 ? "hidden" : "" ?>>Vous n'avez postulé a aucune offre</h3>
                        <?php
                
                        foreach ($listeCan as $key => $offre) { ?>
                            <div class="col-md-4 mb-3">
                                <div class="card border border-1 border-primary">
                                    <div class="card-body">
                                        <h4 class="text-primary"><?= $offre['poste'] ?></h4>
                                        <h6 <?= $offre['etatCandidature']==-1 ? "" : "hidden" ?> class="text-warning">En attente de validation...</h6>
                                        <h6 <?= $offre['etatCandidature']==1 ? "" : "hidden" ?> class="text-primary">Candidature Validée</h6>
                                        <h6 <?= $offre['etatCandidature']==0 ? "" : "hidden" ?> class="text-danger">Candidature Refusée</h6>
                                    </div>
                                    <div class="card-footer">
                                        <a href="?ide=<?= $offre['idCandidature'] ?>&etate=<?= $offre['etatCandidature'] ?>" class="btn btn-sm btn-outline-success">Accepter</a>&nbsp;&nbsp;
                                        <a href="?ids=<?= $offre['idCandidature'] ?>&etats=<?= $offre['etatCandidature'] ?>" class="btn btn-sm btn-outline-danger">Refuser</a>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
</div>
<!--GESTION OFFRE-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/Glese/public/js/update.js"></script>
</head>
<body>
<div id="table-container">
    <div class="card">
        <div class="card-header">
            <span class="h4">Gestion offres</span>
            <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <td>#</th>
                        <th>Poste</th>
                        <th>Type Poste</th>
                        <th>Date creation</th>
                        <th>Date Publication</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table">
                    <?php  foreach ($listeOffre as $key => $offre) { ?>
                        <!-- <tr>
                            <td><?= $key ?></td>
                            <td><?= $offre['poste'] ?></td>
                            <th><?= $offre['type'] ?></th>
                            <td><?= $offre['dateOFFRE'] ?></td>
                            <td class="text-primary"><?= $offre['datePublication'] == "" ? "En attente de Publication" : $offre['datePublication'] ?></td>
                            <td>
                                        
                                <a href="?idq=<?= $offre['idOFFRE'] ?>&etata=1" <?= $offre['etatOFFRE']==1 ? 'hidden' : "" ?> class="btn btn-sm btn-success">
                                    Publier
                                </a>
                                        
                                <a href="?idq=<?= $offre['idOFFRE'] ?>&etata=0" <?= $offre['etatOFFRE']==0 ? 'hidden' : "" ?> class="btn btn-sm btn-dark">
                                        Desactiver
                                </a>
                                        
                                <a href="#" data-role="update" data-id="<?php echo $offre['idOFFRE']; ?>" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModals">
                                    Modifier
                                </a>
                                        
                                <button class="btn btn-sm btn-info">
                                    <i class="fas fa-info-circle text-white"></i>
                                </button>
                            </td>
                        </tr> -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Offre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
            <div class="modal-body">
                <label for="" class="h4">Poste</label>
                <input type="text" class="form-control" name="poste">
                <label for="" class="h4">Description</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                
                <label for="" class="h4">Competence</label>
                <textarea name="competence" class="form-control" id="" cols="30" rows="5"></textarea>
                
                <label for="" class="h4">Type</label>
                <select name="type" id="" class="form-control">
                    <option value="emploi">Emploi</option>
                    <option value="stage">Stage</option>
                </select>
                <div class="mt-2">
                    <input type="checkbox" name="publier" id="">Publier
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="ajoutoffre">Enregistrer</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!--Modal-->
<!--
<div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div>-->



</body>
</html>