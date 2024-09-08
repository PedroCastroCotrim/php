<?php
    include_once '../../../conexao.php';
    include_once '../../../validation/cpf-validation.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            if ($_POST['function'] == 'cadastro') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $cpf = $_POST['cpf'];
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];

                $query = "INSERT INTO fornecedor(nome, email, cpf, telefone, senha) VALUES (:nome, :email, :cpf, :telefone, :senha)";

                $password_encrypted = password_hash($senha, PASSWORD_BCRYPT);

                $verify_email = $pdo->prepare("SELECT * FROM fornecedor WHERE email = :email");
                $verify_email -> bindParam(':email', $email);
                $verify_email -> execute();

                if($verify_email->rowCount()>0){
                    echo "<script>alert('Este email já está cadastrado!');</script>";
                    header("Location: ../cadastro-fornecedor.php");
                    exit();
                }

                $verify_cpf = $pdo->prepare("SELECT * FROM fornecedor WHERE cpf = :cpf");
                $verify_cpf -> bindParam(':cpf', $cpf);
                $verify_cpf -> execute();
                

                if($verify_cpf->rowCount()>0){
                    echo "<script>alert('Este cpf já está cadastrado!');</script>";
                    header("Location: ../cadastro-fornecedor.php");
                    exit();
                }

                $verify_telefone = $pdo->prepare("SELECT * FROM fornecedor WHERE telefone = :telefone");
                $verify_telefone -> bindParam(':telefone', $telefone);
                $verify_telefone -> execute();
                

                if($verify_telefone->rowCount()>0){
                    echo "<script>alert('Este telefone já está cadastrado!');</script>";
                    header("Location: ../cadastro-fornecedor.php");
                    exit();
                }

                if(verify_cpf($cpf)!==true || strlen($cpf)!==11){
                    echo "<script>alert('Cpf inválido!');</script>";
                    header("Location: ../cadastro-fornecedor.php");
                } else{
                    $stmt = $pdo -> prepare($query);
                    $stmt -> bindParam(":nome", $nome);
                    $stmt -> bindParam(":email", $email);
                    $stmt -> bindParam(":cpf", $cpf);
                    $stmt -> bindParam(":telefone", $telefone);
                    $stmt -> bindParam(":senha", $password_encrypted);

                    $stmt -> execute();

                    if ($stmt->rowCount() > 0) {
                        header("Location: ../login-fornecedor.php");
                    } else {
                        throw new Exception("Erro ao cadastrar.");
                    }
                }

            } elseif ($_POST['function'] == 'login') {
                
                $telefone = $_POST['telefone'];
                $senha = $_POST['senha'];
    
                $query = "SELECT * FROM fornecedor WHERE telefone = :telefone";
                $stmt = $pdo->prepare($query);
                
                $stmt->execute([
                    "telefone" => $telefone
                ]);
    
                $fornecedor = $stmt -> fetch(PDO::FETCH_OBJ);
    
                if (is_null($fornecedor)) {
                    throw new Exception("alert('Usuário não encontrado.')");
                }
    
                if (!password_verify($senha, $fornecedor->senha)) {
                    throw new Exception("alert('Senha inválida.')");
                }
    
                $_SESSION['fornecedor'] = $fornecedor;
    
                header("Location: ../../home.php");

            } elseif ($_POST['function'] == 'Log out') {
                session_destroy();
                header("Location: ../login-fornecedor.php");
            }

        } catch (Exception $e) {
            echo "<script>alert('{$e->getMessage()}')</script>";
            header("Location: ../login-fornecedor.php");
        }
    }