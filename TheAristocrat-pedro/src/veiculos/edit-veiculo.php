<?php
    require_once '../../conexao.php';

    $query = "SELECT * FROM veiculo WHERE id_veiculo = :id_veiculo";

    $query = $pdo->prepare($query);
    $result = $query->execute([
        "id_veiculo" => $_GET['id']
    ]);

    $veiculo = $query->fetch(PDO::FETCH_OBJ);

    $query = "SELECT id_marca, nome FROM marca";
    $stmt = $pdo->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Veículo</title>
    </head>
<body>
    <h1>Editar - Veículo</h1>    
    
    <main>
        <form action="cruds/update.php" method="post">
            <input type="hidden" name="function" value="update">
            <input type="hidden" name="id" value="<?= $veiculo->id_veiculo ?>">

            <label for="modelo">Modelo:</label><br>
            <input type="text" name="modelo" value="<?= $veiculo->modelo ?>" id="modelo" placeholder="Modelo" required>
            <br>

            <label for="marca">Marca:</label><br>
            <select name="id_marca" id="id_marca">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id_marca']}'>- {$row['nome']}</option>";
                } ?>
            </select>
            <br>

            <label for="ano">Ano:</label><br>
            <input type="number" name="ano" value="<?= $veiculo->ano ?>" id="ano" placeholder="Ano" required>
            <br>

            <label for="cor">Cor:</label><br>
            <input type="text" name="cor" value="<?= $veiculo->cor ?>" id="cor" placeholder="cor" required>
            <br>

            <label for="quilometragem">Quilometragem</label><br>
            <input type="number" name="quilometragem" value="<?= $veiculo->quilometragem ?>" id="quilometragem" placeholder="quilometragem" required>
            <br>

            <label for="valor">Valor:</label><br>
            <input type="number" name="valor" value="<?= $veiculo->valor ?>" id="valor" placeholder="valor" required>
            <br><br>
        
            <button type="submit">Alterar</button>
        </form>
    </main>
</body>
</html>