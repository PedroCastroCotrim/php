<?php
    include_once '../../conexao.php';

    $query = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        "id_cliente" => $_GET['id']
    ]);

    $cliente = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['fornecedor']) || isset($_SESSION['administrador'])){
        header("Location: ../home.php");
    }

    if($cliente->id_cliente !== $_SESSION['cliente']->id_cliente){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Cliente</title>
</head>
<body>
    <h1>Editar - Cliente</h1>
    
    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $cliente->id_cliente ?>">

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" class="" placeholder="Digite o seu usuário" value="<?= $cliente->nome ?>" required><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" class="" placeholder="Digite o seu Email" value="<?= $cliente->email ?>" required><br>
        
        <label for="cpf">CPF:</label><br>
        <input type="number" name="cpf" class="" placeholder="Digite o seu CPF" value="<?= $cliente->cpf ?>" required><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" class="" placeholder="Digite a sua senha"><br>

        <br>
        <button name="alterar" type="submit" onclick="return confirm('Tem certeza que deseja alterar?');">Alterar</button>
    </form>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>