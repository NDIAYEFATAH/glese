<?php
    require_once("../../models/offresModel.php");

    $action=isset($_GET['action']) ? $_GET['action'] : "";
    if($action!=""){
        if($action=="list"){
            $offre=getOffre();
            echo json_encode($offre);
        }
        if($action=="findId"){
            $id=$_GET['id'];
            $offre=findOffreById($id);
            if($offre){
                echo json_encode($offre);
            }else{
                echo json_encode("0");
            }
        }
    }
?>