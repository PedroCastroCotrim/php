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
        <link rel="stylesheet" href="../../css/variaveis.css">
        <link rel="stylesheet" href="../../css/formulario_card.css">
        <link rel="shortcut icon" href="../../css/imgs/svg/Loog.svg" type="image/x-icon" />
        <title>Alterar Compra</title>
    </head>
<body>
<?php include_once '../../navbar-session.php'?>
    <main>
    <div class="overlay"></div>
    <div class="box-form">
    <h1 class="title">Editar - Compra</h1>    
    
    <form action="cruds/update.php" method="post">
        <input type="hidden" name="id" value="<?= $compra->id_compra ?>">

        <div class="input-container">
            <label for="metodo_pagamento"></label>
            <select name="metodo_pagamento" id="metodo_pagamento" value="metodo_pagamento" required>
                <option value="Pix">Pix</option>
                <option value="Crédito">Cartão - Crédito</option>
                <option value="Cartão Débito">Cartão - Débito</option>
            </select>
        </div>
        
        <input type="submit" value="Editar" onclick="return confirm('Tem certeza que deseja alterar?');"></input>
    </form>
    </div>
    </main>    
</body>
</html>