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
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/formulario_card.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Alterar Cadastro - Cliente</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>

    <main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Editar - Cliente</h1>
    
    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $cliente->id_cliente ?>">
       
        <div class="input-container">
        <input type="text" name="nome" class="" placeholder="Usuário" value="<?= $cliente->nome ?>" required>
        <label for="nome">Nome</label>
        </div>

        <div class="input-container">
        <input type="email" name="email" class="" placeholder="Email" value="<?= $cliente->email ?>" required>
        <label for="email">Email</label>
        </div>

        <div class="input-container">
        <input type="number" name="cpf" class="" placeholder="CPF" value="<?= $cliente->cpf ?>" required>
        <label for="cpf">CPF</label>
        </div>

        <div class="input-container">
        <input type="password" name="senha" class="" placeholder="Senha">
        <label for="senha">Senha</label>
        </div>
        
        <input name="alterar" type="submit" onclick="return confirm('Tem certeza que deseja alterar?');">Alterar</input>
    </form>
    </div>
    </main>
</body>
</html>