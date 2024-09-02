<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Cliente</title>
</head>
<body>
    <h1>Cadastro - Fornecedor</h1>
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="function" value="cadastro">

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" class="" placeholder="Digite o seu usuário" required><br>

        <label for="email">Email:</label><br>
        <input type="text" name="email" class="" placeholder="Digite o seu Email" required><br>
        
        <label for="cpf">CPF:</label><br>
        <input type="text" name="cpf" class="" placeholder="Digite o seu CPF" required><br>
        
        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" class="" placeholder="Digite o seu telefone" required><br>
        
        <label for="senha">Senha:</label><br>
        <input type="password" name="senha" class="" placeholder="Digite o seu senha" required><br>

        <br>
        <button type="submit">Cadastrar</button>
        <br><br>
    </form>

    Já tem uma conta como fonecedor? Faça <a href="login-fornecedor.php">Log In</a>!

    <br><br>
    <a href="../home.php">Home</a>
</body>
</html>