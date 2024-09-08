<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM cliente ORDER BY id_cliente DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Listagem de Clientes</title>
</head>
<body>
    <div class="table-box">
        <p class="page-title">CLIENTES</p>

        <main>
            <table>
                <tr>
                    <th><p class="title">ID</p></th>
                    <th><p class="title">NOME</p></th>
                    <th><p class="title">EMAIL</p></th>
                    <th><p class="title">CPF</p></th>
                    <th><p class="title">DELETAR</p></th>
                    <th><p class="title">EDITAR</p></th>
                </tr>

                <?php foreach ($clientes as $cliente) { ?>
                        
                <tr>
                    <td><p class="sub-title"><?= $cliente['id_cliente'] ?></p></td>
                    <td><p class="sub-title"><?= $cliente['nome'] ?></p></td>
                    <td><p class="sub-title"><?= $cliente['email'] ?></p></td>
                    <td><p class="sub-title"><?= $cliente['cpf'] ?></p></td>

                    <td>
                        <form method="post" action="cruds/delete.php">
                            <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">
                            <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p class="sub-title">Deletar</p></button>
                        </form>
                    </td>

                    <td>
                        <a href="edit-cliente.php?id=<?= $cliente['id_cliente'] ?>"><p class="sub-title">Editar</p></a>
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