
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Marcas</title>
</head>
<body>
    <?php include_once '../../navbar-session.php'?>
    <div class="table-box">

    <main>
    <h1 class="title">MARCAS</h1>
    <div class="table">
        <table>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DELETAR</th>
                <th>EDITAR</th>
            </tr>

            <?php foreach ($marcas as $marca) { ?>
                    
            <tr>
                <td><p class="font-text-terciary"><?= $marca['id_marca'] ?></p></td>
                <td><p class="font-text-terciary"><?= $marca['nome'] ?></p></td>

                <td>
                    <form method="post" action="cruds/delete.php">
                        <input type="hidden" name="id_marca" value="<?= $marca['id_marca']; ?>">
                        <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p>Deletar</p></button>
                    </form>
                </td>

                <td>
                    <a href="edit-marca.php?id=<?= $marca['id_marca'] ?>"><p>Editar</p></a>
                </td>
            </tr>
        <?php } ?>
        </table>
        </div>
    </main>

    </div>

</body>
</html>