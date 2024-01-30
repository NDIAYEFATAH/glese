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
                        <tr>
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
                                        
                                <button onclick="loadoffre(<?= $offre['idOFFRE'] ?>)" data-role="update" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModals">
                                    Modifier
                                </button>
                                        
                                <button class="btn btn-sm btn-info">
                                    <i class="fas fa-info-circle text-white"></i>
                                </button>
                            </td>
                        </tr>
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

<div class="modal fade" id="exampleModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Offre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
            <div class="modal-body">
                <input type="hidden" name="idOffre" id="idOffr">
                <label for="" class="h4">Poste</label>
                <input type="text" class="form-control" name="poste" id="postes">
                <label for="" class="h4">Description</label>
                <textarea name="description" id="descriptions" class="form-control" cols="30" rows="5">
                
</textarea>
                
                <label for="" class="h4">Competence</label>
                <textarea name="competence" id="competences" class="form-control" cols="30" rows="5">
                
                </textarea>
                
                <label for="" class="h4">Type</label>
                <select name="type" id="types" class="form-control">
                    <option value="emploi">Emploi</option>
                    <option value="stage">Stage</option>
                </select>
                <div class="mt-2">
                    <input type="checkbox" name="publier" id="publiers">Publier
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" name="modifierOffre" class="btn btn-primary">Enregistrer</button>
            </div>
      </form>
    </div>
  </div>
</div>

<script>
    function loadoffre(id){
        $.ajax({
            url:"http://localhost/glese/public/json/offre.php?action=findId&id="+id,
            dataType: "json",
            method: "GET",
            success: function(resultat)
            {
                if(resultat!="0"){
                    $("#idOffr").val(resultat.idOFFRE);
                    $("#postes").val(resultat.poste);
                    $("#descriptions").val(resultat.description);
                    $("#competences").val(resultat.competence);
                    $("#types").val(resultat.type);
                    let cocher=resultat.etatOFFRE==1 ? true : false;
                    $("#publiers").prop("checked",cocher);
                }
            }
        });
    }
</script>
</body>
</html>