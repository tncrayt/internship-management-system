<?php


require "../config.php";


if(isset($_POST["donem_tarih"])){

    $donem_tarih = $_POST["donem_tarih"];

    $query= $db->prepare("INSERT INTO donemler (donem_yil) VALUES (:bad)");
    $kaydet=$query->execute([
        "bad" => $donem_tarih,
    ]);

    header("Location:../yönetim/staj-tarih-islem.php");


}