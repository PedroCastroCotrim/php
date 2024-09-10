<?php
$localhost = 'localhost';
$user = 'root';
$pass = '$Resident2x';
$dbname = 'thearistocrat';

try{
$pdo = new PDO("mysql:host=$localhost;dbname=$dbname", $user, $pass);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Erro ao conectar: ".$e->getMessage();
}