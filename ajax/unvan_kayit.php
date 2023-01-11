<?php


require "../config.php";


if(isset($_POST["unvan_ad"])){

    $unvan_ad = $_POST["unvan_ad"];

    $query= $db->prepare("INSERT INTO unvanlar (unvan_ad) VALUES (:bunvan_ad)");
    $kaydet=$query->execute([
        "bunvan_ad" => $unvan_ad,
  
    ]);

    header("Location:../yönetim/danisman-islem.php");


}