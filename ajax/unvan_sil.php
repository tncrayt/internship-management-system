<?php

require "../config.php";

if (isset($_GET["id"])){
    $id=$_GET["id"];
    $query = $db->prepare("DELETE FROM unvanlar WHERE id=:kid");
    $query->execute([
        "kid"=>$id
    ]);

   header("Location:../yönetim/danisman-islem.php");
}