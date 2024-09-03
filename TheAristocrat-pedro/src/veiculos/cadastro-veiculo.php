<?php
    require_once '../../conexao.php';

    $query = "SELECT id_marca, nome FROM marca";
    $stmt = $pdo->query($query);

    if(isset($_SESSION['cliente'])){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Veículos</title>
    </head>
<body>
    <h1>Cadastro - Veículo</h1>    
    
    <main>
        <form action="cruds/auth.php" method="post">
            <label for="modelo">Modelo:</label><br>
            <input type="text" name="modelo" id="modelo" placeholder="Modelo" required>
            <br>

            <label for="marca">Marca:</label><br>
            <select name="marca" id="marca" onchange="document.getElementById('id_marca').value=this.value">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id_marca']}'>-{$row['nome']}</option>";
                }?>
            </select>
            <br>

            <label for="ano">Ano:</label><br>
            <input type="number" name="ano" id="ano" placeholder="Ano" required>
            <br>

            <label for="cor">Cor:</label><br>
            <input type="text" name="cor" id="cor" placeholder="Cor" required>
            <br>

            <label for="quilometragem">Quilometragem:</label><br>
            <input type="number" name="quilometragem" id="quilometragem" placeholder="Quilometragem" required>
            <br>

            <label for="valor">Valor:</label><br>
            <input type="number" name="valor" id="valor" placeholder="Valor" required>
            <br><br>

            <button type="submit">Cadastrar</button>
        </form>
    </main>

    <br><br>
    <a href="../home.php">Home</a>
</body>
</html>