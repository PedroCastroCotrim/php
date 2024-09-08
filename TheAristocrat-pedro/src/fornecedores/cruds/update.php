<?php
    include_once '../../../conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            if ($_POST['function'] == 'update') {
                $id = trim($_POST['id']);
                $nome = trim($_POST['nome']);
                $email = trim($_POST['email']);
                $cpf = trim($_POST['cpf']);
                $telefone = trim($_POST['telefone']);
                $senha = trim($_POST['senha']);

                $query = "UPDATE fornecedor SET nome = :nome, email = :email, cpf = :cpf, telefone = :telefone WHERE id_fornecedor = :id LIMIT 1";

                $stmt = $pdo->prepare($query);
                $stmt -> bindParam("nome", $nome);
                $stmt -> bindParam("email", $email);
                $stmt -> bindParam("cpf", $cpf);
                $stmt -> bindParam("telefone", $telefone);
                $stmt -> bindParam("id", $id);
                
                $stmt -> execute();

                if (strlen($senha)) {
                    $query = "UPDATE fornecedor SET senha = :senha WHERE id_fornecedor = :id LIMIT 1";

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