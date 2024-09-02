<?php
    $localhost = "localhost";
    $dbUser = "root";
    $dbPassword = "mysqlaccount123!@#";
    $dbName = "thearistocrat";

    try{
        $pdo = new PDO("mysql:host=$localhost; dbname=$dbName", $dbUser, $dbPassword);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo "Erro ao conectar! Erro: " . $e -> getMessage();
    }

    session_start();