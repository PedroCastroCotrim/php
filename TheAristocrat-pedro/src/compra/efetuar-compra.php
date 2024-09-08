<?php
    include_once '../../conexao.php';

    $query_veiculo = "SELECT * FROM veiculo WHERE id_veiculo = :id_veiculo";
    $stmt_veiculo = $pdo->prepare($query_veiculo);
    $stmt_veiculo->execute([
        "id_veiculo" => $_GET['id']
    ]);

    $veiculo = $stmt_veiculo->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['administrador'])){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compra</title>
    </head>
<body>
    <h1>Efetuar Compra</h1>    
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="id" value="<?= $veiculo->id_veiculo ?>">

        <label for="valor_total">Valor total:</label><br>
        <input type="number" name="valor_total" required>
        <br><br>

        <label for="data_compra">Data da compra:</label><br>
        <input type="date" name="data_compra" required>
        <br><br>

        <label for="metodo_pagamento">Método de pagamento:</label><br>
        <select name="metodo_pagamento" id="metodo_pagamento" value="metodo_pagamento" required>
            <option value="Pix">Pix</option>
            <option value="Crédito">Cartão - Crédito</option>
            <option value="Cartão Débito">Cartão - Débito</option>
        </select>
        <br><br>
        
        <button type="submit">Comprar</button>
    </form>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>