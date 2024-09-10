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
    <title>Listagem de Administradores</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>
    <div class="table-box">
       <main>
        <h1 class="title">ADMINISTRADORES</h1>

        <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>DELETAR</th>
                    <th>EDITAR</th>
                </tr>

                <?php foreach ($admins as $admin) { ?>
                        
                <tr>
                    <td><p class="font-text-terciary"><?= $admin['id_admin'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $admin['nome'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $admin['email'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $admin['telefone'] ?></p></td>

                    <td>
                        <form method="post" action="cruds/delete.php">
                            <input type="hidden" name="id_admin" value="<?= $admin['id_admin']; ?>">
                            <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p>Deletar</p></button>
                        </form>
                    </td>

                    <td>
                        <a href="edit-admin.php?id=<?= $admin['id_admin'] ?>"><p>Editar</p></a>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </main>
    </div>

    <br><br>
    <a href="../home.php"><p class="font-text-terciary">HOME</p></a>
</body>
</html>

<?php
    if(empty($_SESSION['administrador'])){
        header("Location: ../home.php");
    }
?>