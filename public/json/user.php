<?php
    require_once("../../models/userModel.php");

    $action=isset($_GET['action']) ? $_GET['action'] : "";
    if($action!=""){
        if($action=="findLogin"){
            $login=$_GET['login'];
            $user=findUserByLogin($login);
            if($user){
                echo json_encode($user);
            }else{
                echo json_encode("0");
            }
        }
    }
?>