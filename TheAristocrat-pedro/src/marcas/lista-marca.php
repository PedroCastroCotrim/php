<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM marca ORDER BY id_marca DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $marcas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
</head>
<body>

    <h1 class="title">Marcas</h1>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>

            <?php foreach ($marcas as $marca) { ?>
                    
            <tr>
                <td><?= $marca['id_marca'] ?></td>
                <td><?= $marca['nome'] ?></td>

                <td>
                    <form method="post" action="cruds/delete.php">
                        <input type="hidden" name="id_marca" value="<?= $marca['id_marca']; ?>">
                        <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                </td>

                <td>
                    <a href="edit-marca.php?id=<?= $marca['id_marca'] ?>">Editar</a>
                </td>

            </tr>
        <?php } ?>

        </table>
    </main>

    <br><br>
    <a href="../home.php">Home</a>
</body>
</html>