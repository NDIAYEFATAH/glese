<?php
    session_start();
    ob_start();
    include_once('shared/header.php');
    include_once('shared/topbar.php');
    include_once('shared/sidebar.php');
    require_once('models/offresModel.php');
    require_once('models/profils.php');
    require_once('models/userModel.php');
    require_once('fpdf185/fpdf.php');
    
    
    $listeUser=getUser();
    $offreDetails=isset($_GET['id']) ? findOffreById($_GET['id']) : null;
    $listeProfils=getProfils();
    $listeProfilsCan=getProfilsCan();
    $listeCandidat=getCandidat();
    $listeOffrePostuler=getOffrePostuler();
    $listeOffre = getOffre();
    if(isset($_GET['id'])){
        $offreUpdate=suppOffre($_GET['id']);
    }
    if(isset($_GET['idOffreImpr'],$_GET['etatC'])){
        extract($_GET);
        $donnee=getOffreByCandidat($idOffreImpr,$_GET['etatC']);
        class PDF extends FPDF{
            function tabs($header,$donnee)
            {
                foreach($header as $key){
                    $this->Cell(36,7,$key,1);
                }
                $this->Cell(0,10, "Listes des Candidats postuler pour la poste de ".findOffreById($_GET['idOffreImpr'])['poste'],0,0,'C');
                $this->Ln();
                $i=1;
                foreach ($donnee as $key){
                    $this->Cell(15,7,$i,1);
                    $this->Cell(30,7,$key['prenom'],1);
                    $this->Cell(30,7,$key['nom'],1);
                    $this->Cell(30,7,$key['tel'],1);
                    $this->Cell(70,7,$key['email'],1);
                    $this->Ln();
                    $i++;
                }
                $this->Ln();
            }
        }
        $pdf=new PDF();
        $entete=array("#","Prenom","Nom","Telephone","Email");
        $pdf->SetFont('Arial','',12);
        $pdf->AddPage();
        $pdf->tabs($header,$donnee);
        $date=date("dmYHis");
        $pdf->Output('F','C:\xampp\htdocs\Glese\public\glese/listeCandidat'.$date.'.pdf');
        header("location: http://localhost/glese/?page=infoOffre&id=$idOffreImpr");
    }
    if(isset($_GET['id'])){
        extract($_GET);
        if(isset($_GET['filterEtatCand'])){
            $etat= intval($_GET['filterEtatCand']);
            $listeCandiOffre=getOffreByCandidat($_GET['id'],$etat);
        }else{
            $listeCandiOffre=getOffreByCandidat($_GET['id'],-1);
        }
    }
    if(isset($_POST['modifierOffre'])){
        extract($_POST);
        $etat=isset($publier) ? 1 : 0;
        $resultat=editOffre($idOffre,$poste,$description,$competence,$type,$publier);
        if($resultat==1){
            header("location:http://localhost/Glese/index.php?page=gestionOffre");
        }
    }
    if(isset($_GET['id'],$_GET['etatCan'],$_GET['idUser'])){
        extract($_GET);
        updateCandidature($_GET['id'],$_GET['etatCan'],$_GET['idUser']);
        $liste=getCandidatPers($_GET['idUser']);
        // *** To Email ***
        $to = $liste['email'];
        //
        // *** Subject Email ***
        $subject = 'Demande Emploi';
        //
        // *** Content````` Email ***
        $content = $_GET['etatCan']==1 ? "Votre candidature au poste de ".$offreDetails['poste']." a ete accpetee" : "Votre candidature au poste de ".$offreDetails['poste']." a ete refuse";
        //
        //*** Head Email ***
        $headers = "From: fatahndiaye234@gmail.com\r\n";
        //
        //*** Show the result... ***
        mail($to, $subject, $content, $headers);
        header("location: http://localhost/glese/?page=infoOffre&id=$id");
    }
    $listeOffrePublier=getOffrePublier();
    if(!(empty($_SESSION)) && isset($_GET['id'])){
        $verifCandidat=verifCandidature($_SESSION['user']['idUser'],$_GET['id']);
        $listeCandidatPers =getCandidatPers($_GET['id']);
        $listeCan=getCandidats($_GET['id']);
    }
    if(!(empty($_SESSION))){
        $listeCandidature=getCandidatureByIdUser($_SESSION['user']['idUser']);
    }
    if(isset($_POST['postuler'])){
        if(empty($_SESSION)){
            header("location:http://localhost/Glese/?page=connexion");
        }
        extract($_POST);
        $res=ajoutCand($idOffre,$_SESSION['user']['idUser']);
        if($res==1){
            header("location:http://localhost/Glese/?page=detailOffre&id=$idOffre");
        }
    }
    if (isset($_POST['ajoutUser'])) {
        extract($_POST);
            $resultat=ajoutUser($prenom,$nom,$tel,$email,$login,$mdp,$adresse,$idProfil,$_FILES['fichierCV']);
            $idut=idUtil()['idUser'];
            if($resultat==1){
                //$_FILES['fichierCV']['name']="CV_".$idut['idUser'].".pdf";
                $newname="CV_".$idut.".pdf";
                $direction='C:\xampp\htdocs\Glese\public\documents/';
                $direction_fle=$direction.basename($newname);
                updatefichier($newname,$idut);
                if(move_uploaded_file($_FILES['fichierCV']['tmp_name'],$direction_fle)){
                    header("location:http://localhost/Glese/index.php?page=gestionEmploye");
                }
            }
        
    }
    if ((empty($_SESSION)) && isset($_POST['inscription'])) {
        extract($_POST);
        $resultat=ajoutUser($prenom,$nom,$tel,$email,$login,$mdp,$adresse,$idProfil,$_FILES['fichierCV']);
        //$idut=idUtil()['idUser'];
        if($resultat!=false){
            //$_FILES['fichierCV']['name']="CV_".$idut['idUser'].".pdf";
            $newname="CV_".$resultat['idUser'].".pdf";
            $direction_fle='C:\xampp\htdocs\Glese\public\documents/'.$newname;
            if(move_uploaded_file($_FILES['fichierCV']['tmp_name'],$direction_fle)){
                updatefichier($newname,$resultat['idUser']);
                header("location:http://localhost/Glese/?page=connexion");
            }
        }
    }
    if(isset($_POST['maj'])){
        $newname="CV_".$_SESSION['user']['idUser'].".pdf";
        $direction_fle='C:\xampp\htdocs\Glese\public\documents/'.$newname;
        if(move_uploaded_file($_FILES['fichierCV']['tmp_name'],$direction_fle)){
            updatefichier($newname,$_SESSION['user']['idUser']);
            header("location:http://localhost/glese/");
        }
    }
    if (isset($_POST['ajoutProfil'])) {
        extract($_POST);
        $resultat=ajoutProfil($profil);
        if($resultat==1){
            header("location:http://localhost/Glese/index.php?page=gestionProfils");
        }
    }
    if (isset($_POST['ajoutoffre'])) {
        extract($_POST);
        $etat=isset($publier) ? 1 : 0;
        $resultat=ajoutOffre($poste,$description,$competence,$type,$etat);
        if($resultat==1){
            header("location:http://localhost/Glese/index.php?page=gestionOffre");
        }
    }
    // if (isset($_POST['modifier'])) {
    //     extract($_POST);
    //     $etat=isset($publier) ? 1 : 0;
    //     $resultat=editOffre($idOffre,$poste,$description,$competence,$type,$etat);
    //     if($resultat==1){
    //         header("location:http://localhost/Glese/?page=listeOffre");
    //     }
    // }

    if(isset($_GET['idq'],$_GET['etata'])){
        extract($_GET);
        if (updateEtat($idq,$etata)==1) {
            header("location:http://localhost/Glese/index.php?page=gestionOffre");
        }
    }
    if(isset($_GET['ide'],$_GET['etate'])){
        extract($_GET);
        if (modifieEtat($ide,$etate)==1) {
            header("location:http://localhost/glese/?page=tableauBord");
        }
    }
    if(isset($_GET['ids'],$_GET['etats'])){
        extract($_GET);
        if (Refuser($ids,$etatCs)==1) {
            header("location:http://localhost/glese/?page=tableauBord");
        }
    }
    
    $page=isset($_GET['page']) ? $_GET['page'] : "accueil";
    // $page=isset($_GET['page']) ? $_GET['page'] : "connexion";
    $tabPage=["accueil","connexion","detailOffre","listeOffre"];
    if($page!=""){
        if(file_exists("pages/$page.php")){
            if(in_array($page,$tabPage)){
                include_once("pages/$page.php");
            }else{
                if(empty($_SESSION)){
                    header("location:http://localhost/Glese/?page=connexion");
                }else{
                    include_once("pages/$page.php");
                }
            }
        }else{
            include_once('pages/erreur.php');
        }
    }
    if(isset($_POST['connexion'])){
        extract($_POST);
        $user=verifConnexion($login,$mdp);
        //var_dump($user);
        if($user){
            $_SESSION['user']=$user;
            header("location:http://localhost/Glese/");
        }else{
            $messageConnexion="Login ou mot de passe incorrect";
        }
    }
    if(isset($_GET['deconnexion'])){
        $_SESSION=[];
        session_destroy();
        header("location:http://localhost/Glese/?page=connexion");
    }


    include_once('shared/footer.php');
?>