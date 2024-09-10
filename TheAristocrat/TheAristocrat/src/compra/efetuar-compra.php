<?php
    include_once '../../conexao.php';

    $query_veiculo = "SELECT * FROM veiculo WHERE id_veiculo = :id_veiculo";
    $stmt_veiculo = $pdo->prepare($query_veiculo);
    $stmt_veiculo->execute([
        "id_veiculo" => $_GET['id']
    ]);

    $veiculo = $stmt_veiculo->fetch(PDO::FETCH_OBJ);

    if(isset($_SESSION['administrador']) || isset($_SESSION['fornecedor'])){
        header("Location: ../home.php");
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
        <title>Compra</title>
    </head>
<body>
<?php include_once '../../navbar-session.php'?>
<main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Efetuar Compra</h1>    
    
    <form action="cruds/auth.php" method="post">
        <input type="hidden" name="id" value="<?= $veiculo->id_veiculo ?>">
        <input type="hidden" name="valor_total" value="<?= $veiculo->valor ?>">

        <div class="input-container">
            <label for="metodo_pagamento">Método de pagamento</label>
            <select name="metodo_pagamento" id="metodo_pagamento" value="metodo_pagamento" required>
                <option value="Pix">Pix</option>
                <option value="Crédito">Cartão - Crédito</option>
                <option value="Cartão Débito">Cartão - Débito</option>
            </select>
        </div>
        
        <input type="submit" value="Comprar"></input>
    </form>
    </div>
    </main>
</body>
</html>