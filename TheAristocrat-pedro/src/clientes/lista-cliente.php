<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM cliente ORDER BY id_cliente DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>

            <?php foreach ($clientes as $cliente) { ?>
                    
            <tr>
                <td><?= $cliente['id_cliente'] ?></td>
                <td><?= $cliente['nome'] ?></td>
                <td><?= $cliente['email'] ?></td>
                <td><?= $cliente['cpf'] ?></td>

                <td>
                    <form method="post" action="cruds/delete.php">
                    <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">
                    <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                </td>

                <td>
                    <a href="edit-cliente.php?id=<?= $cliente['id_cliente'] ?>">Editar</a>
                </td>

            </tr>
        <?php } ?>

        </table>
    </main>

    <br><br>
    <a href="../home.php">Home</a>
</body>
</html>