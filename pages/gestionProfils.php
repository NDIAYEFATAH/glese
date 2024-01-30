<div class="card">
    <div class="card-header">
        <span class="h4">Gestion Profiles</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <td>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($listeProfils as $key => $profils) { ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $profils['nomPROFIL'] ?></td>
                        <td>
                                        <!-- Suprimmer-->
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash text-white"></i>
                            </button>
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
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Offre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
            <div class="modal-body">
                <label for="" class="h4">Nom Profil</label>
                <input type="text" class="form-control" name="profil">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="ajoutProfil">Enregistrer</button>
            </div>
      </form>
    </div>
  </div>
</div>

