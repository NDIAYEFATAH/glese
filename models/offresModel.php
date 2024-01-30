<?php
    require_once('bd.php');

    function getOffre(){
        global $connect;
        $requette = "SELECT * FROM offre";
        $exe = $connect->query($requette);
        return $exe->fetchAll();
    }
    function getOffrePublier(){
        global $connect;
        $requette = "SELECT * FROM offre WHERE etatOFFRE=1";
        $exe = $connect->query($requette);
        return $exe->fetchAll();
    }

    function ajoutOffre($poste,$description,$competence,$type,$etat){
        global $connect;
        $date=date("d-m-Y H:i");
        $numero="of_".date("dmYHis");
        $datePub=$etat!=0 ? $date : "";
        /*$insert="INSERT INTO offre (poste,description,dateOFFRE,competence,numero,etatOFFRE,type,datePublication) VALUES ('$poste','$description','$date','$competence','$numero','$etat','$type','$datePub')";
        return $connect->exec($insert);*/
        //ECRITURE DE LA REQUETTE
        $statement=$connect->prepare("INSERT INTO offre (poste,description,dateOFFRE,competence,numero,etatOFFRE,type,datePublication) VALUES (:poste,:description,'$date',:competence,'$numero','$etat','$type','$datePub')");
        $statement->bindValue("poste",$poste,PDO::PARAM_STR);
        $statement->bindValue("description",$description,PDO::PARAM_STR);
        $statement->bindValue("competence",$competence,PDO::PARAM_STR);
        //EXECUTION DE LA REQUETTE
        return $statement->execute();
    }

    function updateEtat($idq,$etata)
    {
        global $connect;
        $datePub=$etata==1 ? date("d-m-Y H:i") : "";
        $req="UPDATE offre SET etatOFFRE=$etata, datePublication='$datePub' WHERE idOFFRE=$idq";
        return $connect->exec($req);
    }
    function findOffreById($id)
    {
        global $connect;
        $requette = "SELECT * FROM offre WHERE idOFFRE=$id";
        $exe = $connect->query($requette);
        return $exe->fetch();
    }
    function suppOffre($id)
    {
        global $connect;
        $req="SELECT * FROM offre WHERE idOFFRE=$id";
        return $connect->query($req)->fetch();
    }
    function ajoutCand($idOffre,$idUser)
    {
        global $connect;
        $date=date("d-m-Y H:i");
        $requette="INSERT INTO candidature(idUserF,idOffreFf,dateCandidature) VALUES($idUser,$idOffre,'$date')";
        return $connect->exec($requette);
    }
    //Verifier si un candidat a deja postuler a une offre donnee
    function verifCandidature($idUser,$idOffre)
    {
        global $connect;
        $requette="SELECT * FROM candidature WHERE idUserF=$idUser AND idOffreFf=$idOffre";
        return $connect->query($requette)->fetch();
    }
    function getCandidatureByIdUser($idUser)
    {
        global $connect;
        $req="SELECT * FROM offre,utilisateur,candidature WHERE idUserF=idUser AND idOffreFf=idOFFRE AND idUser=$idUser";
        return $connect->query($req)->fetchAll();
    }
    function getCandidats($id)
    {
        global $connect;
        $req="SELECT * FROM offre,utilisateur,candidature WHERE idUserF=idUser AND idOffreFf=idOFFRE AND etatCandidature=-1 AND idUser='$id'";
        return $connect->query($req)->fetchAll();
    }
    function modifieEtat($ide,$etate)
    {
        global $connect;
        $etate=1;
        $req="UPDATE candidature SET etatCandidature=$etate WHERE idCandidature=$ide";
        return $connect->exec($req);
    }
    /*
    function updateOffre($idOffre,$poste,$description,$competence,$type,$publier)
    {
        global $connect;
        $req="UPDATE offre SET poste=$poste,description=$description,competence=$competence,type=$type,etatOFFRE=$publier WHERE idOFFRE=$idOffre";
        return $connect->exec($req);
    }*/
   
    function editOffre($idOffre,$poste,$description,$competence,$type,$publier)
    {
        global $connect;
        $date=date("d-m-Y H:i");
        $numero="of_".date("dmYHis");
        $datePub=$publier!=0 ? $date : "";
        /*$insert="INSERT INTO offre (poste,description,dateOFFRE,competence,numero,etatOFFRE,type,datePublication) VALUES ('$poste','$description','$date','$competence','$numero','$etat','$type','$datePub')";
        return $connect->exec($insert);*/
        //ECRITURE DE LA REQUETTE
        $statement=$connect->prepare("UPDATE offre SET poste=:poste,description=:description,competence=:competence,etatOFFRE=$publier,type='$type',datePublication='$datePub' WHERE idOFFRE=$idOffre");
        $statement->bindValue("poste",$poste,PDO::PARAM_STR);
        $statement->bindValue("description",$description,PDO::PARAM_STR);
        $statement->bindValue("competence",$competence,PDO::PARAM_STR);
        return $statement->execute();   
    }
    function Refuser($ids,$etatCs)
    {
        global $connect;
        $etatCs=0;
        $req="UPDATE candidature SET etatCandidature=$etatCs WHERE idCandidature=$ids";
        return $connect->exec($req);
    }
    function getOffrePostuler()
    {
        global $connect;
        $req="SELECT * ,COUNT(idCandidature) AS nb FROM offre,candidature WHERE idOffreFf=idOFFRE GROUP BY idOFFRE";
        return $connect->query($req)->fetchAll();
    }
    //Pour recuperer les candidats qui ont postule a une offre
    function listeCandidatByOffre($idOffre)
    {
        global $connect;
        $req="SELECT * FROM utilisateur,candidature WHERE idUserF=idUser AND idOffreFf=$idOffre";
        return $connect->query($req)->fetchAll();
    }
    function getOffreByCandidat($idOffre,$etat)
    {
        global $connect;
        $req="SELECT * FROM utilisateur,candidature WHERE idUserF=idUser AND idOffreFf=$idOffre AND etatCandidature=$etat";
        return $connect->query($req)->fetchAll();
    }
    function updateCandidature($id,$etatCan,$idUser)
    {
        global $connect;
        $req="UPDATE candidature SET etatCandidature=$etatCan WHERE idOffreFf=$id AND idUserF=$idUser";
        return $connect->exec($req);
    }
?>