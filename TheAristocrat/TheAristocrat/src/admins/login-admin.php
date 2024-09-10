<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/formulario_login.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Log In - Administrador</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>
    <main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1>Log In - Admin</h1>
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="function" value="login">
        <div class="input-container">
        <input type="text" name="telefone" class="" placeholder="Telefone" required>
        <label for="telefone">Telefone</label>
        </div>
        
        <div class="input-container">
        <input type="password" name="senha" class="" placeholder="Senha" required>
        <label for="senha">Senha</label>
        </div>

        <input type="submit"></input>
        
    </form>
    <div class="message">
    <p>Ainda não é administrador? <a href="cadastro-admin.php">Cadastre-se</a></p>
    </div>    
    </div>
    </div>
    </main>
</body>
</html>