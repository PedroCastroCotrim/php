<?php
    require_once '../../../conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            if ($_POST['function'] == 'cadastro') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];

                $query = "INSERT INTO administrador(nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";

                $password_encrypted = password_hash($senha, PASSWORD_BCRYPT);

                $stmt = $pdo -> prepare($query);
                $stmt -> bindParam(":nome", $nome);
                $stmt -> bindParam(":email", $email);
                $stmt -> bindParam(":telefone", $telefone);
                $stmt -> bindParam(":senha", $password_encrypted);

                $stmt -> execute();

                if ($stmt->rowCount() > 0) {
                    header("Location: ../login-admin.php");
                } else {
                    throw new Exception("Erro ao cadastrar.");
                }

            } elseif ($_POST['function'] == 'login') {
                
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];
    
                $query = "SELECT * FROM administrador WHERE telefone = :telefone";
                $stmt = $pdo->prepare($query);
                
                $stmt->execute([
                    "telefone" => $telefone
                ]);
    
                $admin = $stmt -> fetch(PDO::FETCH_OBJ);
    
                if (is_null($admin)) {
                    throw new Exception("alert('Administrador não encontrado.')");
                }
    
                if (!password_verify($senha, $admin->senha)) {
                    throw new Exception("alert('Senha inválida.')");
                }
    
                $_SESSION['administrador'] = $admin;
    
                header("Location: ../../home.php");

            } elseif ($_POST['function'] == 'Log out') {
                session_destroy();
                header("Location: ../login-admin.php");
            }

        } catch (Exception $e) {
            echo "<script>alert('{$e->getMessage()}')</script>";
            header("Location: ../login-admin.php");
        }
    }