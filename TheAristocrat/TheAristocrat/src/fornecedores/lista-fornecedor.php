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
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Listagem de Fornecedores</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>

    <div class="table-box">
    <main>
    <h1 class="title">FORNECEDORES</h1>
    <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>DELETAR</th>
                </tr>

                <?php foreach ($fornecedores as $fornecedor) { ?>
                        
                <tr>
                    <td><p class="font-text-terciary"><?= $fornecedor['id_fornecedor'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $fornecedor['nome'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $fornecedor['email'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $fornecedor['telefone'] ?></p></td>

                    <td>
                        <form method="post" action="cruds/delete.php">
                            <input type="hidden" name="id_fornecedor" value="<?= $fornecedor['id_fornecedor']; ?>">
                            <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p>Deletar</p></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </table>
            </div>
        </main>
    </div>

</body>
</html>