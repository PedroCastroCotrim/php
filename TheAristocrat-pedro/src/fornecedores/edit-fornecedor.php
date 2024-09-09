<?php
    include_once '../../conexao.php';

    $query = "SELECT * FROM fornecedor WHERE id_fornecedor = :id_fornecedor";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        "id_fornecedor" => $_GET['id']
    ]);

    $fornecedor = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['cliente']) || isset($_SESSION['administrador'])){
        header("Location: ../home.php");
        echo "<script>alert('Homens')</script>";
    }

    if($fornecedor->id_fornecedor !== $_SESSION['fornecedor']->id_fornecedor){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cadastro - Fornecedor</title>
</head>
<body>
    <h1>Editar - Fornecedor</h1>
    
    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $fornecedor->id_fornecedor ?>">

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" class="" placeholder="Digite o seu usuário" value="<?= $fornecedor->nome ?>" required><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" class="" placeholder="Digite o seu Email" value="<?= $fornecedor->email ?>" required><br>
        
        <label for="cpf">CPF:</label><br>
        <input type="number" name="cpf" class="" placeholder="Digite o seu CPF" value="<?= $fornecedor->cpf ?>" required><br>

        <label for="telefone">Telefone:</label><br>
        <input type="number" name="telefone" class="" placeholder="Digite o seu telefone" value="<?= $fornecedor->telefone ?>" required><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" class="" placeholder="Digite a sua senha"><br>

        <br>
        <button name="alterar" type="submit" onclick="return confirm('Tem certeza que deseja alterar?');">Alterar</button>
    </form>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>