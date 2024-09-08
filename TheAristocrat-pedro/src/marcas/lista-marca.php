<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM marca ORDER BY id_marca DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_SESSION['cliente']) || isset($_SESSION['fornecedor'])){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-table.css">

    <title>Marcas</title>
</head>
<body>
    <p class="page-title">MARCAS</p>

    <main>
        <table>
            <tr>
                <th><p class="title">ID</p></th>
                <th><p class="title">NOME</p></th>
                <th><p class="title">DELETAR</p></th>
                <th><p class="title">EDITAR</p></th>
            </tr>

            <?php foreach ($marcas as $marca) { ?>
                    
            <tr>
                <td><p class="sub-title"><?= $marca['id_marca'] ?></p></td>
                <td><p class="sub-title"><?= $marca['nome'] ?></p></td>

                <td>
                    <form method="post" action="cruds/delete.php">
                        <input type="hidden" name="id_marca" value="<?= $marca['id_marca']; ?>">
                        <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p class="sub-title">Deletar</p></button>
                    </form>
                </td>

                <td>
                    <a href="edit-marca.php?id=<?= $marca['id_marca'] ?>"><p class="sub-title">Editar</p></a>
                </td>
            </tr>
        <?php } ?>
        </table>
    </main>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>