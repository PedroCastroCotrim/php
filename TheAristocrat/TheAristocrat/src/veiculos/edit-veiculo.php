<?php
    include_once '../../conexao.php';

    $query = "SELECT * FROM veiculo WHERE id_veiculo = :id_veiculo";

    $query = $pdo->prepare($query);
    $result = $query->execute([
        "id_veiculo" => $_GET['id']
    ]);

    $veiculo = $query->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['cliente']) || isset($_SESSION['administrador'])){
        header("Location: ../../index.php");
    }

    if($veiculo->id_fornecedor !== $_SESSION['fornecedor']->id_fornecedor){
        header("Location: ../../index.php");
    }
    
    $query = "SELECT id_marca, nome FROM marca";
    $stmt = $pdo->query($query);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/variaveis.css">
        <link rel="stylesheet" href="../../css/formulario_card.css">
        <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
        <title>Alterar Veículo</title>
    </head>
<body>
<?php include_once '../../navbar-session.php'?>

    <main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Editar - Veículo</h1>    
    
        <form action="cruds/update.php" method="post">
            <input type="hidden" name="function" value="update">
            <input type="hidden" name="id" value="<?= $veiculo->id_veiculo ?>">

            <div class="input-container">
            <input type="text" name="modelo" value="<?= $veiculo->modelo ?>" id="modelo" placeholder="Modelo" required>
            <label for="modelo">Modelo</label>
            </div>

            <label for="marca">Marca</label>
            <select name="id_marca" id="id_marca">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$row['id_marca']}'>- {$row['nome']}</option>";
                } ?>
            </select>
            
            <div class="input-container">
            <input type="number" name="ano" min="1900" max="2025" value="<?= $veiculo->ano ?>" id="ano" placeholder="Ano" required>
            <label for="ano">Ano</label>
            </div>

            <div class="input-container">
            <input type="text" name="cor" value="<?= $veiculo->cor ?>" id="cor" placeholder="cor" required>
            <label for="cor">Cor</label>
            </div>

            <div class="input-container">
            <input type="number" name="quilometragem" min="0" value="<?= $veiculo->quilometragem ?>" id="quilometragem" placeholder="quilometragem" required>
            <label for="quilometragem">Quilometragem</label>
            </div>

            <div class="input-container">
            <input type="number" name="valor" min="20000" max="2000000" value="<?= $veiculo->valor ?>" id="valor" placeholder="valor" required>
            <label for="valor">Valor</label>
            </div>
        
            <input type="submit" value="alterar" onclick="return confirm('Tem certeza que deseja alterar?');"></input>
        </form>
    </main>

</body>
</html>