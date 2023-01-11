<?php
require "../config.php";

if (isset($_POST["datas"])){
    $hafta_saat = $_POST["datas"]["hafta_saat"];
    $donem_id = $_POST["datas"]["yil"];

    $query= $db->prepare("SELECT id,DATE_FORMAT(staj_baslangic, \"%d.%m.%Y\") as staj_baslangic,DATE_FORMAT(staj_bitis, \"%d.%m.%Y\") as staj_bitis FROM staj_tarih WHERE staj_tarih.donem_id=:donem_id AND staj_tarih.haftalik_gun_sayi=:hafta_sayi;");
    $query->execute([
        "donem_id"=>$donem_id,
        "hafta_sayi"=>$hafta_saat,
    ]);

    $tarihler = $query->fetchAll();

    echo "<option value='err'>Başlangıç Tarihi Seçiniz</option>";
    foreach ($tarihler as $tarih){
        echo "<option value={$tarih["id"]}>{$tarih["staj_baslangic"]}</option>";
    }

}


if (isset($_POST["staj_tarih_id"])){
    $id = $_POST["staj_tarih_id"];

    $query= $db->prepare("SELECT id,DATE_FORMAT(staj_baslangic,\"%d.%m.%Y\") as staj_baslangic,DATE_FORMAT(staj_bitis,\"%d.%m.%Y\") as staj_bitis FROM staj_tarih WHERE staj_tarih.id=:id;");
    $query->execute([
        "id"=>$id,
    ]);

    $tarihler = $query->fetchAll();

    foreach ($tarihler as $tarih){
        echo "<option value={$tarih["id"]}>{$tarih["staj_bitis"]}</option>";
    }

}


if (isset($_POST["bolum_id"])){
    $bolum_id= $_POST["bolum_id"];

    $query=$db->prepare("SELECT concat(unvanlar.unvan_ad,\" \",kullanicilar.ad,\" \",kullanicilar.soyad) as ad_soyad,kullanicilar.id FROM danisman_detay INNER JOIN kullanicilar ON danisman_detay.danisman_id=kullanicilar.id INNER JOIN unvanlar ON unvanlar.id=danisman_detay.unvan_id  WHERE bolum_id=:id");

    $query->execute([
        "id"=>$bolum_id
    ]);


    $danismanlar=$query->fetchAll();


    foreach ($danismanlar as $danisman){
        echo "<option value={$danisman["id"]}>{$danisman["ad_soyad"]}</option>";
    }



};






