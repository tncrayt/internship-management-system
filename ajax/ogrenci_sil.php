<?php

require "../config.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];
    $query = $db->prepare("DELETE FROM kullanicilar WHERE id=:kid");
    $query->execute([
        "kid"=>$id
    ]);

   header("Location:../yönetim/ogrenci-islem.php");
}