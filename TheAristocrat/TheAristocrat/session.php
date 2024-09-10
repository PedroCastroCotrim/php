<?php
    function redirect(){
        session_start();

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