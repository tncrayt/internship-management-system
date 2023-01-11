<?php

require "../config.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];
    $query = $db->prepare("DELETE FROM donemler WHERE id=:kid");
    $query->execute([
        "kid"=>$id
    ]);

   header("Location:../yönetim/staj-tarih-islem.php");
}