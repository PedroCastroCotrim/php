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
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
    <title>Listagem de Clientes</title>
</head>
<body>
<?php include_once '../../navbar-session.php'?>

    <div class="table-box">
        <main>

        <h1 class="title">CLIENTES</h1> 
        <div class="table">
                <table>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>CPF</th>
                    <th>DELETAR</th>
                </tr>

                    <?php foreach ($clientes as $cliente) { ?>
                            
                    <tr>
                        <td><p class="font-text-terciary"><?= $cliente['id_cliente'] ?></p></td>
                        <td><p class="font-text-terciary"><?= $cliente['nome'] ?></p></td>
                        <td><p class="font-text-terciary"><?= $cliente['email'] ?></p></td>
                        <td><p class="font-text-terciary"><?= $cliente['cpf'] ?></p></td>

                        <td>
                            <form method="post" action="cruds/delete.php">
                                <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente']; ?>">
                                <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p>Deletar</p></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </main>
    </div>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>