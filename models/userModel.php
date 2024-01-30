<?php
    require_once('bd.php');
    function getUser()
    {
        global $connect;
        $requette = "SELECT * FROM utilisateur,profil WHERE idPROFILF=idPROFIL AND nomPROFIL!='candidat'";
        $exe = $connect->query($requette);
        return $exe->fetchAll();
    }
    function getCandidat()
    {
        global $connect;
        $requet="SELECT * FROM utilisateur,profil,candidature WHERE idPROFILF=idPROFIL AND lower(nomPROFIL)='candidat' AND idUserF=idUser";
        $exe=$connect->query($requet);
        return $exe->fetchAll(); 
    }
    function getCandidatPers($id)
    {
        global $connect;
        $requet="SELECT * FROM utilisateur,profil,candidature WHERE idPROFILF=idPROFIL AND lower(nomPROFIL)='candidat' AND idUserF=idUser AND idUserF='$id'";
        $exe=$connect->query($requet);
        return $exe->fetch();
    }
    function ajoutUser($prenom,$nom,$tel,$email,$login,$mdp,$adresse,$idProfil,$fichiercv)
    {
        global $connect;
        $statement=$connect->prepare("INSERT INTO utilisateur(prenom,nom,tel,email,login,mdp,adresse,idPROFILF,fichierCV) VALUES(:prenom,:nom,:tel,:email,:login,:mdp,:adresse,:idProfil,:fichiercv2)");
        $statement->bindValue("prenom",$prenom,PDO::PARAM_STR);
        $statement->bindValue("nom",$nom,PDO::PARAM_STR);
        $statement->bindValue("tel",$tel,PDO::PARAM_STR);
        $statement->bindValue("email",$email,PDO::PARAM_STR);
        $statement->bindValue("login",$login,PDO::PARAM_STR);
        $statement->bindValue("mdp",$mdp,PDO::PARAM_STR);
        $statement->bindValue("adresse",$adresse,PDO::PARAM_STR);
        $statement->bindValue("idProfil",$idProfil,PDO::PARAM_STR);
        $statement->bindValue("fichiercv2",$fichiercv,PDO::PARAM_STR);
        $statement->execute();
        return verifConnexion($login,$mdp);
    }
    function verifConnexion($login,$mdp)
    {
        global $connect;
        $requette="SELECT * FROM utilisateur,profil WHERE login=:login AND mdp=:mdp AND idPROFILF=idPROFIL";
        $statement=$connect->prepare($requette);
        $statement->bindValue("login",$login,PDO::PARAM_STR);
        $statement->bindValue("mdp",$mdp,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();
    }
    function findUserByLogin($login)
    {
        global $connect;
        $requette="SELECT * FROM utilisateur WHERE login=:login";
        $statement=$connect->prepare($requette);
        $statement->bindValue("login",$login,PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch();
    }
    function idUtil()
    {
        global $connect;
        $userData = $connect->query("SELECT * FROM utilisateur ORDER BY idUser DESC LIMIT 1")->fetch();
        return $userData;
    }
    function updatefichier($newfichierCV,$idUser)
    {
        global $connect;
        return $connect->query("UPDATE utilisateur SET fichierCV='$newfichierCV' WHERE idUser=$idUser");
    }
?>