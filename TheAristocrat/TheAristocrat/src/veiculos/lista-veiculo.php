<?php
    include_once '../../conexao.php';

    $query = "SELECT * FROM veiculo ORDER BY id_veiculo DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_SESSION['cliente']) || isset($_SESSION['fornecedor'])){
        header("Location: ../../index.php");
    }

    redirect();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/variaveis.css">
    <link rel="stylesheet" href="../../css/table.css">
    <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />    <title>Veículos</title>
</head>

<body>
<?php include_once '../../navbar-session.php'?>
    <div class="box-table">
    <main>
        <h1 class="title">VEÍCULOS</h1>
<div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>MODELO</th>
                    <th>MARCA</th>
                    <th>FORNECEDOR</th>
                    <th>ANO</th>
                    <th>COR</th>
                    <th>QUILOMETRAGEM</th>
                    <th>VALOR</th>
                    <th>DELETAR</th>
                </tr>

                <?php foreach ($veiculos as $veiculo) { ?>

                <tr>
                    <td><p class="font-text-terciary"><?= $veiculo['id_veiculo'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $veiculo['modelo'] ?></p></td>
                    <td><p class="font-text-terciary">
                            <?php
                                $query_marca = "SELECT nome FROM marca WHERE id_marca = :id_marca";
                                $stmt_marca = $pdo->prepare($query_marca);
                                $stmt_marca->bindParam(':id_marca', $veiculo['id_marca']);

                                try {
                                    $stmt_marca->execute();
                                    $marca = $stmt_marca->fetch(PDO::FETCH_ASSOC);
                                    echo $marca['nome'] ?? 'Marca não encontrada'; // Exibe "Marca não encontrada" se não houver resultado
                                } catch (PDOException $e) {
                                    echo "Erro ao buscar marca: " . $e->getMessage();
                                }
                            ?>
                        </p>
                    </td>
                    <td><p class="font-text-terciary">
                            <?php
                                $query_fornecedor = "SELECT nome FROM fornecedor WHERE id_fornecedor = :id_fornecedor";
                                $stmt_fornecedor = $pdo->prepare($query_fornecedor);
                                $stmt_fornecedor->bindParam(':id_fornecedor', $veiculo['id_fornecedor']);

                                try {
                                    $stmt_fornecedor->execute();
                                    $fornecedor = $stmt_fornecedor->fetch(PDO::FETCH_ASSOC);
                                    echo $fornecedor['nome'] ?? 'fornecedor não encontrada'; 
                                } catch (PDOException $e) {
                                    echo "Erro ao buscar fornecedor: " . $e->getMessage();
                                }
                            ?>
                        </p>
                    </td>
                    <td><p class="font-text-terciary"><?= $veiculo['ano'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $veiculo['cor'] ?></p></td>
                    <td><p class="font-text-terciary"><?= $veiculo['quilometragem'] . " KM" ?></p></td>
                    <td><p class="font-text-terciary"><?= $veiculo['valor'] . " R$" ?></p></td>
                    <td>
                        <form method="post" action="cruds/delete.php">
                            <input type="hidden" name="id" value="<?= $veiculo['id_veiculo']; ?>">
                            <button type="submit" class="deletar" onclick="return confirm('Tem certeza que deseja deletar?');"><p>Deletar</p></button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </main>
    </div>
</body>
</html>