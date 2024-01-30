<?php
    require_once('bd.php');

    function getProfils(){
        global $connect;
        $requette = "SELECT * FROM profil";
        $exe = $connect->query($requette);
        return $exe->fetchAll();
    }
    function ajoutProfil($nomProfils){
        global $connect;
        /*$insert="INSERT INTO offre (poste,description,dateOFFRE,competence,numero,etatOFFRE,type,datePublication) VALUES ('$poste','$description','$date','$competence','$numero','$etat','$type','$datePub')";
        return $connect->exec($insert);*/
        $statement=$connect->prepare("INSERT INTO profil (nomPROFIL) VALUES (:nom)");
        $statement->bindValue("nom",$nomProfils,PDO::PARAM_STR);
        return $statement->execute();
    }
    function getProfilsCan(){
        global $connect;
        $requette = "SELECT * FROM profil WHERE nomPROFIL='candidat'";
        $exe = $connect->query($requette);
        return $exe->fetch();
    }
?>