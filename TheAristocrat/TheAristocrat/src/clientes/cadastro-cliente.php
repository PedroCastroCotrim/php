<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/formulario_card.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Cadastro - Cliente</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>
    <main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Cadastro - Cliente</h1>
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="function" value="cadastro">
        
        <div class="input-container">
        <input type="text" name="nome" class="" placeholder="Usuário" required>
        <label for="nome">Usuário</label>
        </div>

        <div class="input-container">
        <input type="email" name="email" class="" placeholder="Email" required>
        <label for="email">Email</label>    
         </div>

        <div class="input-container">
        <input type="number" name="cpf" class="" placeholder="CPF" required>
        <label for="cpf">CPF</label>    
         </div>

        <div class="input-container">
        <input type="password" name="senha" class="" placeholder="Senha" required>
        <label for="senha">Senha</label>    
        </div>

        <input type="submit"></input>
    </form>
    <div class="message">
    <p>
    Já tem uma conta? Faça <a href="login-cliente.php">Log In</a>
    </p>
    </div>
    </div>
    </main>
</body>
</html>