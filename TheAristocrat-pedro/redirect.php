<?php
    function redirect(){
        session_start();

        if(is_null($_SESSION['usuario'])){
            header("Location: clientes/login-cliente.php");
        }
    }