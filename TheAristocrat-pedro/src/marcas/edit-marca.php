<?php
    require_once '../../conexao.php';

    if(isset($_SESSION['cliente'])){
        header("Location: ../home.php");
    }

    $query = "SELECT * FROM marca WHERE id_marca = :id_marca";

    $stmt = $pdo->prepare($query);
    $result = $stmt->execute([
        "id_marca" => $_GET['id']
    ]);

    $marca = $stmt->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar - Marca</title>
</head>
<body>
    <h1>Editar - Marca</h1>

    <form action="cruds/update.php" method="post">
        <input type="hidden" name="function" value="update">
        <input type="hidden" name="id" value="<?= $marca->id_marca ?>">

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" class="" placeholder="Digite a marca" value="<?= $marca->nome ?>" required><br>
        <br>

        <button type="submit">Alterar</button>
    </form>
</body>
</html>

<?php
    if(empty($_SESSION['administrador']) && empty($_SESSION['fornecedor'])){
        header("Location: ../home.php");
    }
?>