<?php
require_once '../../../conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        if ($_POST['function'] == 'update') {
            $id = trim($_POST['id']);
            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $cpf = trim($_POST['cpf']);
            $senha = trim($_POST['senha']);

            $query = "UPDATE cliente SET nome = :nome, cpf = :cpf, email = :email WHERE id_cliente = :id LIMIT 1";

            $stmt = $pdo->prepare($query);
            $stmt -> bindParam("nome", $nome);
            $stmt -> bindParam("cpf", $cpf);
            $stmt -> bindParam("email", $email);
            
            $stmt -> execute();

            if (strlen($senha)) {
                $query = "UPDATE cliente SET senha = :senha WHERE id_cliente = :id LIMIT 1";

                $encrypted_password = password_hash($senha, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare($query);
                $stmt -> bindParam("senha", $encrypted_password);
                $stmt -> bindParam("id", $id);

                $stmt -> execute();
            }

            if ($stmt -> rowCount() > 0) {
                echo "<script>alert('atualizado com sucesso!')</script>";
                header("Location: ../../../info/info-fornecedor.php");
            } else {
                throw new Exception("Erro ao atualizar.");
            }
        } 
    } catch (Exception $e) {
        echo "<script>alert('{$e->getMessage()}')</script>";
        header("Location: ../../../info/info-fornecedor.php");
    }
}