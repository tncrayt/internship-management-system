<?php
require_once '../../lib/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

require "../../config.php";


$sql = "SELECT concat(kullanicilar.ad,\" \",kullanicilar.soyad) as ad_soyad,ogrenci_no,tc,tel,email,adres,sosyal_guvence.ad,DATE_FORMAT(staj_tarih.staj_baslangic,\"%d.%m.%Y\") as staj_baslangic, DATE_FORMAT(staj_tarih.staj_bitis,\"%d.%m.%Y\") as staj_bitis,donemler.donem_yil,staj_tarih.haftalik_gun_sayi,k_ad,k_adres,k_hizmet_alan,k_no,k_faks_no,k_eposta,k_webadres,bolum_ad FROM staj_kayit INNER JOIN kullanicilar ON kullanicilar.id=staj_kayit.ogrenci_id INNER JOIN ogrenci_detay ON ogrenci_detay.ogrenci_id=staj_kayit.ogrenci_id INNER JOIN staj_tarih ON staj_tarih.id=staj_kayit.staj_tarih_id INNER JOIN sosyal_guvence ON sosyal_guvence.id=staj_kayit.sigorta INNER JOIN bolumler ON ogrenci_detay.bolum_id_fk=bolumler.id INNER JOIN donemler ON staj_tarih.donem_id=donemler.id WHERE ogrenci_detay.ogrenci_id=:id;";

$query = $db->prepare($sql);
$query->execute([
    "id"=>$_GET["id"]
]);
$kayitlar=$query->fetch();



if (isset($kayitlar)){
    $query = $db->prepare("SELECT concat(ad,\" \",soyad) as danisman_ad FROM ogrenci_detay
INNER JOIN kullanicilar ON kullanicilar.id = ogrenci_detay.danisman_id_fk WHERE ogrenci_detay.ogrenci_id=:id");
    $query->execute([
        "id"=>$_GET["id"]
    ]);
    $danisman=$query->fetch();

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();


    ob_start();
    require ("basvuru.php");
    $html = ob_get_contents();
    ob_get_clean();
    $dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait ');

// Render the HTML as PDF
    $dompdf->render();

// Output the generated PDF to Browser
    $dompdf->stream("basvuru-formu",array("Attachment" => false));
}

