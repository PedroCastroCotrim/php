<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Admin</title>
</head>
<body>
    <h1>Log In - Admin</h1>
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="function" value="login">

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" class="" placeholder="Digite seu telefone" required><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" class="" placeholder="Digite sua senha" required>
        <br><br>

        <button type="submit">Log In</button>
        <br><br>
    </form>

    Ainda não é administrador? <a href="cadastro-admin.php">Cadastre-se</a>!
    
    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>