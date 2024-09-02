<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM admin ORDER BY id_admin DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de admins</title>
</head>
<body>

    <h1 class="title">Admins</h1>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>

            <?php foreach ($admins as $admin) { ?>
                    
            <tr>
                <td><?= $admin['id_admin'] ?></td>
                <td><?= $admin['nome'] ?></td>
                <td><?= $admin['email'] ?></td>
                <td><?= $admin['telefone'] ?></td>

                <td>
                    <form method="post" action="cruds/delete.php">
                        <input type="hidden" name="id_admin" value="<?= $admin['id_admin']; ?>">
                        <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                </td>

                <td>
                    <a href="edit-admin.php?id=<?= $admin['id_admin'] ?>">Editar</a>
                </td>

            </tr>
        <?php } ?>
        </table>
    </main>

    <br>
    <a href="../home.php">Home</a>
</body>
</html>