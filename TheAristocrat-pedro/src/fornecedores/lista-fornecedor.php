<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM fornecedor ORDER BY id_fornecedor DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Fornecedores</title>
</head>
<body>

    <h1 class="title">Fornecedores</h1>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>

            <?php foreach ($fornecedores as $fornecedor) { ?>
                    
            <tr>
                <td><?= $fornecedor['id_fornecedor'] ?></td>
                <td><?= $fornecedor['nome'] ?></td>
                <td><?= $fornecedor['email'] ?></td>
                <td><?= $fornecedor['cpf'] ?></td>
                <td><?= $fornecedor['telefone']?></td>

                <td>
                    <form method="post" action="cruds/delete.php">
                    <input type="hidden" name="id_fornecedor" value="<?= $fornecedor['id_fornecedor']; ?>">
                    <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                </td>

                <td>
                    <a href="edit-fornecedor.php?id=<?= $fornecedor['id_fornecedor'] ?>">Editar</a>
                </td>

            </tr>
        <?php } ?>

        </table>
    </main>

    <br><br>
    <a href="../home.php">Home</a>
</body>
</html>