<?php


require "../config.php";


if(isset($_POST["bolum_ad"])){

    $bolum_ad = $_POST["bolum_ad"];

    $query= $db->prepare("INSERT INTO bolumler (bolum_ad) VALUES (:bad)");
    $kaydet=$query->execute([
        "bad" => $bolum_ad,
  
    ]);

    header("Location:../yönetim/bolum-islem.php");


}