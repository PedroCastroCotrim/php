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
    <title>Veículos</title>
</head>

<body>
    <h1>Veículos</h1>
    <main>
        <table>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Cor</th>
                <th>Quilometragem</th>
                <th>Valor</th>
                <th>Deletar</th>
                <th>Editar</th>
            </tr>

            <?php foreach ($veiculos as $veiculo) { ?>

            <tr>
                <td><?= $veiculo['id_veiculo'] ?></td>
                <td><?= $veiculo['modelo'] ?></td>
                <td>
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
                </td>
                <td><?= $veiculo['ano'] ?></td>
                <td><?= $veiculo['cor'] ?></td>
                <td><?= $veiculo['quilometragem'] . " KM" ?></td>
                <td><?= $veiculo['valor'] . " R$" ?></td>
                <td>
                    <form method="post" action="cruds/delete.php">
                        <input type="hidden" name="id" value="<?= $veiculo['id_veiculo']; ?>">
                        <button type="submit" class="" onclick="return confirm('Tem certeza que deseja deletar?');">Deletar</button>
                    </form>
                </td>
                <td>
                    <a href="edit-veiculo.php?id=<?= $veiculo['id_veiculo'] ?>">Editar</a>
                </td>
            </tr>
        <?php } ?>
        </table>
    </main>

    <br><br>
    <a href="../home.php">Home</a>
</body>

</html>