<?php
    include_once '../../conexao.php';

    $query = "SELECT * FROM compra WHERE id_compra = :id_compra";

    $query = $pdo->prepare($query);
    $result = $query->execute([
        "id_compra" => $_GET['id']
    ]);

    $compra = $query->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['administrador']) || isset($_SESSION['fornecedor'])){
        header("Location: ../home.php");
    }

    if($compra->id_cliente !== $_SESSION['cliente']->id_cliente){
        header("Location: ../home.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Compra</title>
    </head>
<body>
    <h1>Editar - Compra</h1>    
    
    <form action="cruds/update.php" method="post">
        <label for="valor_total">Valor total:</label><br>
        <input type="hidden" name="id" value="<?= $compra->id_compra ?>">

        <input type="number" name="valor_total" value="<?= $compra->valor_total ?>" required>
        <br><br>

        <label for="data_compra">Data da compra:</label><br>
        <input type="date" name="data_compra" value="<?= $compra->data_compra ?>" required>
        <br><br>

        <label for="metodo_pagamento">Método de pagamento:</label><br>
        <select name="metodo_pagamento" id="metodo_pagamento" value="metodo_pagamento" required>
            <option value="Pix">Pix</option>
            <option value="Crédito">Cartão - Crédito</option>
            <option value="Cartão Débito">Cartão - Débito</option>
        </select>
        <br><br>
        
        <button type="submit" onclick="return confirm('Tem certeza que deseja alterar?');">Editar</button>
    </form>

    <br><br>
    <a href="../home.php"><p class="sub-title">HOME</p></a>
</body>
</html>