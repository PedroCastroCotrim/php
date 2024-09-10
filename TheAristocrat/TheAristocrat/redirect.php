<?php
    function redirect(){
        session_start();

        if(!isset($_SESSION['administrador']) && !isset($_SESSION['fornecedor']) && !isset($_SESSION['cliente'])){
            header("Location: clientes/login-cliente.php");
        }
    }