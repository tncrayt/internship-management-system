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
    $email=$_POST["email"];
    $sifre=md5($pwd);
    $rol_id=3;

    $query=$db->prepare("INSERT INTO kullanicilar  (ad,soyad,email,sifreHash,rol_id) VALUES (:value1,:value2,:value3,:value4,:value5)");
    $kaydet=$query->execute([
        "value1" => $ad,
        "value2" => $soyad,
        "value3" => $email,
        "value4" => $sifre,
        "value5" => $rol_id,
    ]);




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


        header("Location:../yönetim/personel-islem.php");

    } catch (Exception $e) {
        echo "E-Posta Hata Mesajı: {$mail->ErrorInfo}";
    }


}