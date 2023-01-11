<?php

require "../config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../lib/PHPMailer/src/Exception.php';
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';



if (isset($_POST)){

    $pwd = bin2hex(openssl_random_pseudo_bytes(4.5));

    $ad=$_POST["ad"];
    $soyad=$_POST["soyad"];
    $sifre=md5($pwd);
    $no=$_POST["no"];

    $bolum=$_POST["bolum"];
    $danisman_id=$_POST["danisman_id"];

    //öğrencinumarası@ogr.comu.edu.tr
    $email=$no."@ogr.comu.edu.tr";

    $rol_id=4;

    $query=$db->prepare("INSERT INTO kullanicilar  (ad,soyad,email,sifreHash,rol_id) VALUES (:value1,:value2,:value3,:value4,:value5)");
    $kaydet=$query->execute([
        "value1" => $ad,
        "value2" => $soyad,
        "value3" => $email,
        "value4" => $sifre,
        "value5" => $rol_id,
    ]);


    if ($kaydet){
        $id = $db->lastInsertId();

        $query=$db->prepare("INSERT INTO ogrenci_detay (ogrenci_id,ogrenci_no,danisman_id_fk,bolum_id_fk) VALUES (:value1,:value2,:value3,:value4)");
        $query->execute([
            "value1"=>$id,
            "value2"=>$no,
            "value3"=>$danisman_id,
            "value4"=>$bolum,

        ]);

    }


    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '6b8de83d600922';                     //SMTP username
        $mail->Password   = 'a53e4ac8e74f24';
        $mail->CharSet = 'UTF-8';
//SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('comu_staj@comu.edu.com.tr', 'ÇÖMÜ STAJ OTOMASYON');
        $mail->addAddress($email, $ad." ".$soyad);

        $html = file_get_contents("../pages/email/kod-mail.html");
        $html = str_replace("{KOD}", $pwd, $html);


        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Geçici Şifreniz | ÇÖMÜ';
        $mail->msgHTML($html);

        $mail->send();


        header("Location:../yönetim/ogrenci-islem.php");

    } catch (Exception $e) {
        echo "E-Posta Hata Mesajı: {$mail->ErrorInfo}";
    }


}