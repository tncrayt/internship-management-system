<?php

require "../config.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];
    $query = $db->prepare("DELETE FROM staj_kayit WHERE id=:kid");
    $query->execute([
        "kid"=>$id
    ]);

   header("Location:../ogrenci/basvuru-durum.php");
}