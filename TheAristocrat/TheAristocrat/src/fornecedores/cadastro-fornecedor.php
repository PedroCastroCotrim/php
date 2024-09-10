<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/formulario_card.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Cadastro - Fornecedor</title>
    <style>
        .box-form{
            padding: 2dvh 4dvh;
            display: flex;
            flex-wrap: wrap;
            width: 80dvh;
            flex-direction: row;
        }
        main{
            height: 120dvh;
        }
    </style>
</head>
<body>
<?php include_once '../../navbar-session.php'?>
<main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Cadastro - Fornecedor</h1>
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="function" value="cadastro">
        
        <div class="input-container">
        <input type="text" name="nome" class="" placeholder="Nome" required>
        <label for="nome">Nome</label>
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
        <input type="number" name="telefone" class="" placeholder="Telefone" required>
        <label for="telefone">Telefone</label>
        </div>

        <div class="input-container">
        <input type="password" name="senha" class="" placeholder="Senha" required>
        <label for="senha">Senha</label>
        </div>
        
        <input type="submit" value="Cadastrar"></input>
        
    </form>
    <div class="message">
    <p>Já tem uma conta como fonecedor? Faça <a href="login-fornecedor.php">Log In</a></p>
    </div>
    </main>
</body>
</html>