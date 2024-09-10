<?php
    include_once '../../conexao.php';

    $query = "SELECT id_marca, nome FROM marca";
    $stmt = $pdo->query($query);

    if(isset($_SESSION['cliente']) || isset($_SESSION['administrador'])){
        header("Location: ../../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/variaveis.css">
        <link rel="stylesheet" href="../../css/formulario_card.css">
        <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
        <title>Cadastro de Veículos</title>
    </head>
<body>
<?php include_once '../../navbar-session.php'?>
<main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Cadastro - Veículo</h1>    
    
        <form action="cruds/auth.php" method="post">
            
        <div class="input-container">
            <input type="text" name="modelo" id="modelo" placeholder="Modelo" required>
            <label for="modelo">Modelo</label>
        </div>

            <label for="marca">Marca</label>
            <select name="marca" id="marca" onchange="document.getElementById('id_marca').value=this.value">
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id_marca']}'>-{$row['nome']}</option>";
                }?>
            </select>
            
            <div class="input-container">
            <input type="number" name="ano" id="ano" min="1900" max="2025" placeholder="Ano" required>
            <label for="ano">Ano</label>
            </div>

            <div class="input-container">
            <input type="text" name="cor" id="cor" placeholder="Cor" required>
            <label for="cor">Cor</label>
            </div>

            <div class="input-container">
            <input type="number" name="quilometragem" id="quilometragem" min="0" placeholder="Quilometragem" required>
            <label for="quilometragem">Quilometragem</label>
            </div>

            <div class="input-container">
            <input type="number" name="valor" id="valor" min="20000" max="2000000" placeholder="Valor" required>
            <label for="valor">Valor</label>            
            </div>

            <input type="submit" value="Cadastrar"></input>
        </form>
    </div>
    </main>
</body>
</html>