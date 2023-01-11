<?php


require "../config.php";


if(isset($_POST["gun"])){

    $gun = $_POST["gun"];
    $donem_id = $_POST["donem_id"];
    $staj_giris = $_POST["staj_giris"];
    $staj_bitis = $_POST["staj_bitis"];

    $query= $db->prepare("INSERT INTO staj_tarih (donem_id,haftalik_gun_sayi,staj_baslangic,staj_bitis) VALUES (:tdonem_id,:tgun,:tgiris,:tcikis)");
    $kaydet=$query->execute([
        "tdonem_id" => $donem_id,
        "tgun" => $gun,
        "tgiris" => $staj_giris,
        "tcikis" => $staj_bitis,
    ]);

    header("Location:../yönetim/staj-tarih-islem.php");


}