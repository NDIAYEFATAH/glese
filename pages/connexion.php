<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/Glese/public/css/styleC.css" rel="stylesheet" />
    <title>Document</title>
    
   
</head>
<body>
  <div class="login-box">
    <h2>Connexion</h2>
    <div <?= isset($messageConnexion) ? "" : "hidden" ?> class="row alert-danger">
        <?= isset($messageConnexion) ? $messageConnexion : "" ?>
    </div>
    <form method="POST">
      <div class="user-box">
        <input type="text" name="login" required="">
        <label>Nom d'utilisateur</label>
      </div>
      <div class="user-box">
        <input type="password" name="mdp" required="">
        <label>Mot de passe</label>
      </div>
      <button type="submit" class="btn btn-primary" name="connexion">connecter</button>
    </form>
    <div class="card bg-white">
      <p class="text-dark">Vous n'avez pas de compte ?
        <a data-bs-toggle="modal" data-bs-target="#exampleModal">Inscrivez-Vous</a>
      </p>
    </div>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INSCRIPTION</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="myForm" enctype="multipart/form-data">
            <div class="modal-body">
                <label for="" class="h4">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom">
                <label for="" class="h4">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom">
                
                <label for="" class="h4">Telephone</label>
                <input type="text" class="form-control" name="tel" id="tel">
                <label for="" class="h4">email</label>
                <input type="email" class="form-control" name="email" id="email">
                <label for="" class="h4">Login</label>
                <input onblur="verifLog()" type="text" class="form-control" name="login" id="login">
                <span hidden class="text-danger" id="erreur_log">Login existe deja</span>
                <label for="" class="h4">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">
                <label for="" class="h4">Adresse</label>
                <input type="text" class="form-control" name="adresse" id="adresse">
                <label for="">Fichier CV</label>
                <input type="file" name="fichierCV" class="form-control" id="fichiercv" accept=".pdf" onchange="fileValidation()">
                <span hidden id="erreur" class="text-danger">Ce fichier n'est pas pris en charge</span>
                <label for="" class="h4">Profil</label>
                <select name="idProfil" id="profil" class="form-control">
                    <?php
                        // foreach ($listeProfilsCan as $key => $p) {?>
                            <option value="<?= $listeProfilsCan['idPROFIL'] ?>"><?= $listeProfilsCan['nomPROFIL'] ?></option>
                    <?php     ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary" name="inscription">Enregistrer</button>
            </div>
      </form>
    </div>
  </div>
</div>
<script>
    function verifLog(){
      let login=document.getElementById("login");
      let error_log=document.getElementById("erreur_log");

      $.ajax({
        url:"http://localhost/glese/public/json/offre.php?action=findLogin&login="+login.value,
        dataType: "json",
        method: "GET",
        success: function(resultat){
          if(resultat!="0"){
            error_log.removeAttribute("hidden");
            login.value="";
          }else{
            error_log.setAttribute("hidden", "");
          }
        }
      });
    }

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
</body>
</html>