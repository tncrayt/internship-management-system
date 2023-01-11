<?php

require "../config.php";

if (isset($_GET["sigorta_giris"])){
    $id=$_GET["sigorta_giris"];
    $query = $db->prepare("UPDATE staj_kayit SET sigorta_giris_onay=:donay WHERE id=:kid");
    $query->execute([
        "donay"=>1,
        "kid"=>$id
    ]);

    header("Location:../personel/sigorta-giris.php");

}

if (isset($_GET["sigorta_cikis"])){
    $id=$_GET["sigorta_cikis"];
    $query = $db->prepare("UPDATE staj_kayit SET sigorta_cikis_onay=:donay WHERE id=:kid");
    $query->execute([
        "donay"=>1,
        "kid"=>$id
    ]);

    header("Location:../personel/staj-islem.php");


}