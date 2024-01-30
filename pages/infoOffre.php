<div class="card">
    <div class="card-header">
        <h2>Detail Offre</h2>
    </div>
    <div class="card-body">
        <div class="row mt-2">
            <span>Poste :</span>
            <p><?= $offreDetails['poste'] ?></p>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
            <a href="index.php?page=infoOffre&id=<?= $_GET["id"] ;?>&filterEtatCand=1" class="btn btn-success">Candidature Accepter</a>&nbsp;&nbsp;
            <a href="index.php?page=infoOffre&id=<?= $_GET["id"] ;?>&filterEtatCand=0" class="btn btn-danger">Candidature Refuser</a>&nbsp;&nbsp;
            <a href="index.php?page=infoOffre&id=<?= $_GET["id"] ;?>&filterEtatCand=-1" class="btn btn-warning">Candidature En attente</a>
            <a target="_blank" href="?idOffreImpr=<?= $offreDetails['idOFFRE'] ?>&etatC=<?= $_GET['filterEtatCand']; ?>" class="btn btn-sm btn-outline-danger">Imprimer</a>
            </div>
        </div>
        <div class="row mt=2">
            <h4>Liste des Candidats</h4>
            <table id="datatablesSimple">
            <thead>
                <tr>
                    <td>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>CV</th>
                    <th>Candidature</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php  foreach ($listeCandiOffre as $key => $u) { ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $u['prenom'] ?></td>
                        <th><?= $u['nom'] ?></th>
                        <td><?= $u['tel'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td><?= $u['fichierCV']!="" ? "oui" : "non" ?></td>
                        <td><?= $u['etatCandidature'] ?></td>
                        <td>
                                    <!-- Details-->
                            <a <?= $u['fichierCV'] !="" ? "" : "hidden" ?> target="_blank" href="http://localhost/glese/public/documents/<?= $u['fichierCV'] ?>" class="btn btn-sm btn-info">
                                Voir CV
                            </a>
                            <?php
                                if($u['etatCandidature']==-1 || $u['etatCandidature']==0){ ?>

                                    <a <?= $u['fichierCV'] !="" ? "" : "hidden" ?> <?= $u['etatCandidature'] !=1 ? "" : "hidden" ?> href="?id=<?= $offreDetails['idOFFRE'] ?>&etatCan=1&idUser=<?= $u['idUser'] ?>" class="btn btn-sm btn-outline-success">Accepter</a>&nbsp;&nbsp;
                                    <a <?= $u['fichierCV'] !="" ? "" : "hidden" ?> <?= $u['etatCandidature'] !=0 ? "" : "hidden" ?> href="?id=<?= $offreDetails['idOFFRE'] ?>&etatCan=0&idUser=<?= $u['idUser'] ?>" class="btn btn-sm btn-outline-danger">Refuser</a>
                            <?php   }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>


