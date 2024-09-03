<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - Cliente</title>
</head>
<body>
    <h1>Log In - Cliente</h1>
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="function" value="login">

        <label for="email">Email:</label><br>
        <input type="text" name="email" class="" placeholder="Digite seu Email" required><br>

        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" class="" placeholder="Digite sua senha" required>
        <br><br>

        <button type="submit">Log In</button>
        <br><br>
    </form>

    Não tem uma conta ainda? <a href="cadastro-cliente.php">Cadastre-se</a>!

    <br><br>
    <a href="../home.php">Home</a>
</body>
</html>