<?php
    $SERVER="localhost";
    $USER="root";
    $MDP="";
    $DBNAME="glese";
    try {
        $connect= new PDO("mysql:host=$SERVER;dbname=$DBNAME",$USER,$MDP,[PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $ex) {
        echo "Erreur de connexion".$ex->getMessage();
        die;
    }

?>