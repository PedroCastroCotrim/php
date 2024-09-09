<?php
    include_once '../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-navbar.css">
</head>
<body>
    <nav>
        <ul>
            <li class="dropdown"><a href="home.php"><p class="title">HOME</p></a></li>

            <li class="dropdown"><a href=""><p class="title">SOBRE</p></a></li>

            <li class="dropdown"><a href="veiculos/cadastro-veiculo.php"><p class="title">REGISTRAR VEÍCULO</p></a></li>

            <li class="dropdown"><p class="title">CONTA</p>
                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="../info/info-fornecedor.php">Informações</a></p></ul>
                    
                    <ul><p class="sub-title"><a class="dropdown-button" href="fornecedores/edit-fornecedor.php?id=<?= $_SESSION['fornecedor']->id_fornecedor ?>">Editar</a></p></ul>

                    <ul>
                        <form action="fornecedores/cruds/auth.php" method="post">
                            <input class="sub-title" type="submit" name="function" value="Log out">
                        </form>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</body>
</html>