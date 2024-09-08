<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM administrador ORDER BY id_admin DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Listagem de Admins</title>
</head>
<body>
    <div class="table-box">
        <p class="page-title">ADMINISTRADORES</p>

        <main>
            <table>
                <tr>
                    <th><p class="title">ID</p></th>
                    <th><p class="title">NOME</p></th>
                    <th><p class="title">EMAIL</p></th>
                    <th><p class="title">TELEFONE</p></th>
                    <th><p class="title">DELETAR</p></th>
                    <th><p class="title">EDITAR</p></th>
                </tr>

                <?php foreach ($admins as $admin) { ?>
                        
                <tr>
                    <td><p class="sub-title"><?= $admin['id_admin'] ?></p></td>
                    <td><p class="sub-title"><?= $admin['nome'] ?></p></td>
                    <td><p class="sub-title"><?= $admin['email'] ?></p></td>
                    <td><p class="sub-title"><?= $admin['telefone'] ?></p></td>

                    <td>
                        <form method="post" action="cruds/delete.php">
                            <input type="hidden" name="id_admin" value="<?= $admin['id_admin']; ?>">
                            <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p class="sub-title">Deletar</p></button>
                        </form>
                    </td>

                    <td>
                        <a href="edit-admin.php?id=<?= $admin['id_admin'] ?>"><p class="sub-title">Editar</p></a>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </main>
    </div>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>

<?php
    if(empty($_SESSION['administrador'])){
        header("Location: ../home.php");
    }
?>