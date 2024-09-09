<?php
    include_once '../../conexao.php';
    $query = "SELECT * FROM fornecedor ORDER BY id_fornecedor DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Listagem de Fornecedores</title>
</head>
<body>
    <div class="table-box">
        <p class="page-title">FORNECEDORES</p>

        <main>
            <table>
                <tr>
                    <th><p class="title">ID</p></th>
                    <th><p class="title">NOME</p></th>
                    <th><p class="title">EMAIL</p></th>
                    <th><p class="title">TELEFONE</p></th>
                    <th><p class="title">DELETAR</p></th>
                </tr>

                <?php foreach ($fornecedores as $fornecedor) { ?>
                        
                <tr>
                    <td><p class="sub-title"><?= $fornecedor['id_fornecedor'] ?></p></td>
                    <td><p class="sub-title"><?= $fornecedor['nome'] ?></p></td>
                    <td><p class="sub-title"><?= $fornecedor['email'] ?></p></td>
                    <td><p class="sub-title"><?= $fornecedor['telefone'] ?></p></td>

                    <td>
                        <form method="post" action="cruds/delete.php">
                            <input type="hidden" name="id_fornecedor" value="<?= $fornecedor['id_fornecedor']; ?>">
                            <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p class="sub-title">Deletar</p></button>
                        </form>
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