<?php
    include_once '../../session.php';
    redirect();

    if(isset($_SESSION['cliente']) || isset($_SESSION['fornecedor'])){
        header("Location: ../../index.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/formulario_card.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Cadastro - Marca</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>

    <main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Cadastro - Marca</h1>

    <form action="cruds/auth.php" method="post">
        
        <div class="input-container">
        <input type="text" name="nome" class="" placeholder="Nome" required>
        <label for="nome">Nome</label>
        </div>
        
        <input type="submit">Cadastrar</input>
        
    </form>
    </div>
    </main>
</body>
</html>