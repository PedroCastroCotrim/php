<?php
    include_once '../../conexao.php';

    $query = "SELECT * FROM fornecedor WHERE id_fornecedor = :id_fornecedor";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        "id_fornecedor" => $_GET['id']
    ]);

    $fornecedor = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['cliente']) || isset($_SESSION['administrador'])){
        header("Location: ../home.php");
        echo "<script>alert('Homens')</script>";
    }

    if($fornecedor->id_fornecedor !== $_SESSION['fornecedor']->id_fornecedor){
        header("Location: ../home.php");
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
    <title>Alterar Cadastro - Fornecedor</title>
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
    <h1 class="title">Editar - Fornecedor</h1>
    
    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $fornecedor->id_fornecedor ?>">

        <div class="input-container">
        <input type="text" name="nome" class="" placeholder="Digite o seu usuário" value="<?= $fornecedor->nome ?>" required>
        <label for="nome">Nome</label>
        </div>

        <div class="input-container">
        <input type="email" name="email" class="" placeholder="Digite o seu Email" value="<?= $fornecedor->email ?>" required>
        <label for="email">Email</label>
        </div>

        <div class="input-container">
        <input type="number" name="cpf" class="" placeholder="Digite o seu CPF" value="<?= $fornecedor->cpf ?>" required>
        <label for="cpf">CPF</label>
        </div>

        <div class="input-container">
        <input type="number" name="telefone" class="" placeholder="Digite o seu telefone" value="<?= $fornecedor->telefone ?>" required>
        <label for="telefone">Telefone</label>
        </div>

        <div class="input-container">
        <input type="password" name="senha" class="" placeholder="Digite a sua senha">
        <label for="senha">Senha</label>
        </div>

        <input name="alterar" value="Alterar" type="submit" onclick="return confirm('Tem certeza que deseja alterar?');"></input>
    </form>
    </div>
</main>
</body>
</html>