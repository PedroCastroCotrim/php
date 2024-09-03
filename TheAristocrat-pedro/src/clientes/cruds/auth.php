<?php
    require_once '../../../conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            if ($_POST['function'] == 'cadastro') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $cpf = $_POST['cpf'];
                $senha = $_POST['senha'];

                $query = "INSERT INTO cliente(nome, email, cpf, senha) VALUES (:nome, :email, :cpf, :senha)";

                $password_encrypted = password_hash($senha, PASSWORD_BCRYPT);

                $stmt = $pdo -> prepare($query);
                $stmt -> bindParam(":nome", $nome);
                $stmt -> bindParam(":email", $email);
                $stmt -> bindParam(":cpf", $cpf);
                $stmt -> bindParam(":senha", $password_encrypted);

                $stmt -> execute();

                if ($stmt->rowCount() > 0) {
                    header("Location: ../login-cliente.php");
                } else {
                    throw new Exception("Erro ao cadastrar.");
                }

            } elseif ($_POST['function'] == 'login') {
                
                $email = $_POST['email'];
                $senha = $_POST['senha'];
    
                $query = "SELECT * FROM cliente WHERE email = :email";
                $stmt = $pdo->prepare($query);
                
                $stmt->execute([
                    "email" => $email
                ]);
    
                $cliente = $stmt -> fetch(PDO::FETCH_OBJ);
    
                if (is_null($cliente)) {
                    throw new Exception("alert('Usuário não encontrado.')");
                }
    
                if (!password_verify($senha, $cliente->senha)) {
                    throw new Exception("alert('Senha inválida.')");
                }
    
                $_SESSION['cliente'] = $cliente;
    
                header("Location: ../../home.php");

            } elseif ($_POST['function'] == 'Log out') {
                session_destroy();
                header("Location: ../login-cliente.php");
            }

        } catch (Exception $e) {
            echo "<script>alert('{$e->getMessage()}')</script>";
            header("Location: ../login-cliente.php");
        }
    }