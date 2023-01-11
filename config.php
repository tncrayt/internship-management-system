<?php

$host="localhost";
$dbname="comu_staj";
$user="root";


try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user,"");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){
    echo $e->getMessage();
}
