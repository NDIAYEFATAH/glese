<?php
    $connect=mysqli_connect("localhost","root","","glese");
    if(isset($_POST['id_modal'])){
        $query="SELECT * FROM offre WHERE idOFFRE='".$_POST['id_modal']."'";
        $res=mysqli_query($connect,$query);
        $row=mysqli_fetch_array($res);
        echo json_encode($row);
    }
?>