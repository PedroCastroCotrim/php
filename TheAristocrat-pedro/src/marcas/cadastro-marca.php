<?php
    include_once '../../redirect.php';
    redirect();

    if(isset($_SESSION['cliente'])){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Marca</title>
</head>
<body>
    <h1>Cadastro - Marca</h1>

    <form action="cruds/auth.php" method="post">
        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" class="" placeholder="Digite a marca" required><br>

        <br>
        <button type="submit">Cadastrar</button>
        <br><br>
    </form>

    <br><br>
    <a href="../home.php">Home</a>
</body>
</html>