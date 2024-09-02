<?php
require_once '../../../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if ($_POST['function'] == 'update') {
            $id = trim($_POST['id']);
            $nome = trim($_POST['nome']);

            $query = "UPDATE marca SET nome = :nome WHERE id_marca = :id LIMIT 1";

            $stmt = $pdo->prepare($query);
            $stmt -> bindParam("nome", $nome);
            
            $stmt -> execute();

            if ($stmt -> rowCount() > 0) {
                echo "<script>alert('atualizado com sucesso!')</script>";
                header("Location: ../lista-marca.php");
            } else {
                throw new Exception("Erro ao atualizar.");
            }
        } 
    } catch (Exception $e) {
        echo "<script>alert('{$e->getMessage()}')</script>";
        header("Location: ../lista-marca.php");
    }
}