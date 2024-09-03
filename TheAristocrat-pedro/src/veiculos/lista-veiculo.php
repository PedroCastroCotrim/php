<?php
    require_once '../../conexao.php';
    $query = "SELECT * FROM veiculo ORDER BY id_veiculo DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style-table.css">
    <title>Veículos</title>
</head>

<body>
    <style>
        .button{
            background-color: white;
            border: none;
        }
        
    </style>

    <div class="box-table">
        <p class="page-title">VEÍCULOS</p>

        <main>
            <table>
                <tr>
                    <th><p class="title">ID</p></th>
                    <th><p class="title">Modelo</p></th>
                    <th><p class="title">Marca</p></th>
                    <th><p class="title">Ano</p></th>
                    <th><p class="title">Cor</p></th>
                    <th><p class="title">Quilometragem</p></th>
                    <th><p class="title">Valor</p></th>
                    <th><p class="title">Deletar</p></th>
                    <th><p class="title">Editar</p></th>
                </tr>

                <?php foreach ($veiculos as $veiculo) { ?>

                <tr>
                    <td><p class="sub-title"><?= $veiculo['id_veiculo'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['modelo'] ?></p></td>
                    <td><p class="sub-title">
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
                    <td><p class="sub-title"><?= $veiculo['ano'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['cor'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['quilometragem'] . " KM" ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['valor'] . " R$" ?></p></td>
                    <td>
                        <form method="post" action="cruds/delete.php">
                            <input type="hidden" name="id" value="<?= $veiculo['id_veiculo']; ?>">
                            <button type="submit" class="" onclick="return confirm('Tem certeza que deseja deletar?');"><p class="sub-title">Deletar</p></button>
                        </form>
                    </td>
                    <td>
                        <a href="edit-veiculo.php?id=<?= $veiculo['id_veiculo'] ?>"><p class="sub-title">Editar</p></a>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </main>
    </div>

    <button class="button" type="submit"><a href="../home.php"><p class="title">HOME</p></a></button>
</body>
</html>