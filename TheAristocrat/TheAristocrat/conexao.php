<?php
    $localhost = "localhost";
    $dbUser = "root";
    $dbPassword = "mysqlaccount123!@#";
    $dbName = "the_aristocrat";

    try{
        $pdo = new PDO("mysql:host=$localhost; dbname=$dbName", $dbUser, $dbPassword);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo "Erro ao conectar! Erro: " . $e -> getMessage();
    }

    session_start();

    function redirect(){
        if(!isset($_SESSION['administrador']) && !isset($_SESSION['fornecedor']) && !isset($_SESSION['cliente'])){
            header("Location: clientes/login-cliente.php");
        }
    }

    function navbar_session(){
        if(isset($_SESSION['administrador'])){
            include 'src/navbar-admin.php';
        }

        else if(isset($_SESSION['fornecedor'])){
            include 'src/navbar-fornecedor.php';
        }

        else if(isset($_SESSION['cliente'])){
            include 'src/navbar-cliente.php';
        }

        else if(empty($_SESSION)){
            include 'src/navbar-deslogado.php';
        }
    }
    