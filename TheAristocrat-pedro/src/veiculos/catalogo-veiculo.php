<?php
    include_once '../../conexao.php';
    
    $query_veiculo = "SELECT * FROM veiculo ORDER BY id_veiculo DESC";
    $stmt_veiculo = $pdo->prepare($query_veiculo);
    $stmt_veiculo->execute();
    $veiculos = $stmt_veiculo->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style-table.css">
    <title>Catálogo</title>
</head>

<body>

    <div class="box-table">
        <p class="page-title">CATÁLOGO</p>

        <main>
            <table>
                <tr>
                    <th><p class="title">MODELO</p></th>
                    <th><p class="title">MARCA</p></th>
                    <th><p class="title">FORNECEDOR</p></th>
                    <th><p class="title">ANO</p></th>
                    <th><p class="title">COR</p></th>
                    <th><p class="title">QUILOMETRAGEM</p></th>
                    <th><p class="title">VALOR</p></th>
                    <th><p class="title">COMPRAR</p></th>
                </tr>

                <?php foreach ($veiculos as $veiculo) { if($veiculo['status_veiculo'] !== "comprado"){ ?>

                <tr>
                    <td><p class="sub-title"><?= $veiculo['modelo'] ?></p></td>
                    <td><p class="sub-title">
                            <?php
                                $query_marca = "SELECT nome FROM marca WHERE id_marca = :id_marca";
                                $stmt_marca = $pdo->prepare($query_marca);
                                $stmt_marca->bindParam(':id_marca', $veiculo['id_marca']);

                                try {
                                    $stmt_marca->execute();
                                    $marca = $stmt_marca->fetch(PDO::FETCH_ASSOC);
                                    echo $marca['nome'] ?? 'Marca não encontrada';
                                } catch (PDOException $e) {
                                    echo "Erro ao buscar marca: " . $e->getMessage();
                                }
                            ?>
                        </p>
                    </td>
                    <td><p class="sub-title">
                            <?php
                                $query_fornecedor = "SELECT nome FROM fornecedor WHERE id_fornecedor = :id_fornecedor";
                                $stmt_fornecedor = $pdo->prepare($query_fornecedor);
                                $stmt_fornecedor->bindParam(':id_fornecedor', $veiculo['id_fornecedor']);

                                try {
                                    $stmt_fornecedor->execute();
                                    $fornecedor = $stmt_fornecedor->fetch(PDO::FETCH_ASSOC);
                                    echo $fornecedor['nome'] ?? 'fornecedor não encontrado';
                                } catch (PDOException $e) {
                                    echo "Erro ao buscar fornecedor: " . $e->getMessage();
                                }
                            ?>
                        </p>
                    </td>
                    <td><p class="sub-title"><?= $veiculo['ano'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['cor'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['quilometragem'] . " KM" ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['valor'] . " R$" ?></p></td>
                    <td>
                        <a href="../compra/efetuar-compra.php?id=<?=$veiculo['id_veiculo']?>"><p class="sub-title">Comprar</p></a>
                    </td>
                </tr>
            <?php } } ?>
            </table>
        </main>
    </div>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>