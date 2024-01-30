<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="http://localhost/Glese/?page=accueil">
                                <div class="sb-nav-link-icon"><i class="fas-home"></i></div>
                                Acceuil
                            </a>
                            <a class="nav-link" href="http://localhost/Glese/?page=listeOffre">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Liste des Offres
                            </a>
                            <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomPROFIL']=="RH" || $_SESSION['user']['nomPROFIL']=="super") ? "" : "hidden" ?> class="nav-link" href="?page=tableauBord">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Tableau de bord
                            </a>
                            <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomPROFIL']=="RH" || $_SESSION['user']['nomPROFIL']=="admin" || $_SESSION['user']['nomPROFIL']=="super") ? "" : "hidden" ?> class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Paramétrage
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomPROFIL']=="RH" ? "" : "hidden" || $_SESSION['user']['nomPROFIL']=="super") ?>  class="nav-link" href="?page=gestionOffre">Gestion Offres</a>
                                    <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomPROFIL']=="admin" || $_SESSION['user']['nomPROFIL']=="super") ? "" : "hidden" ?> class="nav-link" href="?page=gestionProfils">Gestion Profils</a>
                                </nav>
                            </div>
                            <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomPROFIL']=="candidat" || $_SESSION['user']['nomPROFIL']=="super") ? "" : "hidden" ?> class="nav-link" href="?page=mescandidature">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Mes Candidatures
                            </a>
                            <a <?= !(empty($_SESSION)) && $_SESSION['user']['nomPROFIL']=="candidat" ? "" : "hidden" ?> class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModa">Mettre à jour CV</a>
                            <a <?= !(empty($_SESSION)) && ($_SESSION['user']['nomPROFIL']=="RH" || $_SESSION['user']['nomPROFIL']=="admin" || $_SESSION['user']['nomPROFIL']=="super") ? "" : "hidden" ?> class="nav-link" href="?page=gestionEmploye">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Gestion des Employés
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="modal fade" id="exampleModa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">MAJ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <label for="" class="h4">Fichier CV</label>
                <input type="file" class="form-control" name="fichierCV" accept=".pdf" onchange="fileValidation()" id="fichierCV">
                <span hidden id="erreur" class="text-danger">Ce fichier n'est pas pris en charge</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="maj">Enregistrer</button>
            </div>
      </form>
    </div>
  </div>
</div>
<script>
    function fileValidation()
    {
      var erreur=document.getElementById("erreur");
      var fichier=document.getElementById("fichiercv");
      var fichierC=fichier.value;
      let tabs=fichierC.split('.');
      let ext=tabs[tabs.lenght-1];
      if(ext.toLowerCase()!="pdf"){
        fichier.value="";
        erreur.removeAttribute("hidden");
      }else{
        erreur.setAttribute("hidden", "");
      }
    }

</script>