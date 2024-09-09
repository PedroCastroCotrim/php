<?php
    require_once '../../conexao.php';

    $query = "SELECT * FROM administrador WHERE id_admin = :id_admin";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        "id_admin" => $_GET['id']
    ]);

    $admin = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['cliente']) || isset($_SESSION['fornecedor'])){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cadastro - Cliente</title>
</head>
<body>
    <h1>Editar - Admin</h1>
    
    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $admin->id_admin ?>">

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" class="" placeholder="Digite o seu usuário" value="<?= $admin->nome ?>" required><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" class="" placeholder="Digite o seu Email" value="<?= $admin->email ?>" required><br>
        
        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" class="" placeholder="Digite o seu telefone" value="<?= $admin->telefone ?>" required><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" class="" placeholder="Digite a sua senha"><br>

        <br>
        <button name="alterar" type="submit" onclick="return confirm('Tem certeza que deseja alterar?');">Alterar</button>
    </form>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>