<?php
    require_once '../../conexao.php';

    $query = "SELECT * FROM administrador WHERE id_admin = :id_admin";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        "id_admin" => $_GET['id']
    ]);

    $admin = $stmt->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['cliente']) || isset($_SESSION['fornecedor'])){
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
    <title>Alterar Cadastro - Administrador</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>
    <main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Editar - Admin</h1>
    
    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $admin->id_admin ?>">

        <div class="input-container">
        <input type="text" name="nome" class="" placeholder="Nome" value="<?= $admin->nome ?>" required>
        <label for="nome">Nome</label>
        </div>

        <div class="input-container">
        <input type="text" name="email" class="" placeholder="Email" value="<?= $admin->email ?>" required>
        <label for="email">Email</label>    
        </div>

        <div class="input-container">
        <input type="text" name="telefone" class="" placeholder="Telefone" value="<?= $admin->telefone ?>" required>
        <label for="telefone">Telefone</label>
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