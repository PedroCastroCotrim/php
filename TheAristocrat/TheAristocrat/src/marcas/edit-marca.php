<?php
    require_once '../../conexao.php';

    $query = "SELECT * FROM marca WHERE id_marca = :id_marca";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        "id_marca" => $_GET['id']
    ]);

    $marca = $stmt->fetch(PDO::FETCH_OBJ);

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
    <title>Alterar - Marca</title>
</head>
<body>
<main>
<?php include_once '../../navbar-session.php'?>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Editar - Marca</h1>

    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $marca->id_marca ?>">

        <div class="input-container">
        <input type="text" name="nome" class="" placeholder="Nome" value="<?= $marca->nome ?>" required>
        <label for="nome">Nome</label>        
        </div>

        <input type="submit" value="Editar" onclick="return confirm('Tem certeza que deseja alterar?');"></input>
    </form>
</main>
</body>
</html>