<div class="card">
    <div class="card-header">
        <span class="h4">Gestion Employes</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <td>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Profil</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($listeUser as $key => $u) { ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $u['prenom'] ?></td>
                        <th><?= $u['nom'] ?></th>
                        <td><?= $u['tel'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['nomPROFIL'] ?></td>
                        <td>
                                    <!-- Suprimmer-->
                            <a class="btn btn-sm btn-danger">
                                <i class="fas fa-trash text-white"></i>
                            </a>
                                    <!-- Details-->
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


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Employe</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
            <div class="modal-body">
                <label for="" class="h4">Prenom</label>
                <input type="text" class="form-control" name="prenom">
                <label for="" class="h4">Nom</label>
                <input type="text" class="form-control" name="nom">
                
                <label for="" class="h4">Telephone</label>
                <input type="text" class="form-control" name="tel">
                <label for="" class="h4">email</label>
                <input type="email" class="form-control" name="email">
                <label for="" class="h4">Login</label>
                <input type="text" class="form-control" name="login">
                <label for="" class="h4">Mot de passe</label>
                <input type="password" class="form-control" name="mdp">
                <label for="" class="h4">Adresse</label>
                <input type="text" class="form-control" name="adresse">
                <label for="">Fichier CV</label>
                <input type="file" name="fichierCV" class="form-control">
                <label for="" class="h4">Profil</label>
                <select name="idProfil" id="" class="form-control">
                    <?php
                        foreach ($listeProfils as $key => $p) {?>
                            <option value="<?= $p['idPROFIL'] ?>"><?= $p['nomPROFIL'] ?></option>
                    <?php    } ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="ajoutUser">Enregistrer</button>
            </div>
      </form>
    </div>
  </div>
</div>

