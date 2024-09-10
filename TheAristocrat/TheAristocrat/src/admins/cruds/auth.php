<?php
    include_once '../../../conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            if ($_POST['function'] == 'cadastro') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];

                $query = "INSERT INTO administrador(nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";

                $password_encrypted = password_hash($senha, PASSWORD_BCRYPT);

                $verify_email = $pdo->prepare("SELECT * FROM administrador WHERE email = :email");
                $verify_email -> bindParam(':email', $email);
                $verify_email -> execute();

                if($verify_email->rowCount()>0){
                    echo "<script>alert('Este email já está cadastrado!');</script>";
                    header("Location: ../cadastro-admin.php");
                    exit();
                }

                $verify_telefone = $pdo -> prepare("SELECT * FROM administrador WHERE telefone = :telefone");
                $verify_telefone -> bindParam(':telefone', $telefone);
                $verify_telefone -> execute();

                if($verify_telefone->rowCount()>0){
                    echo "<script>alert('Este telefone já está cadastrado!');</script>";
                    header("Location: ../cadastro-admin.php");
                    exit();
                }

                if(strlen($telefone) !== 8){
                    echo "<script>alert('Telefone inválido!');</script>";
                    header("Location: ../cadastro-admin.php");
                    exit();
                } else {
                    $stmt = $pdo -> prepare($query);
                    $stmt -> bindParam(":nome", $nome);
                    $stmt -> bindParam(":email", $email);
                    $stmt -> bindParam(":telefone", $telefone);
                    $stmt -> bindParam(":senha", $password_encrypted);
    
                    $stmt -> execute();
                }

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