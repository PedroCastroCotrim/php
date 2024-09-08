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
            
            <li class="dropdown"><a href="veiculos/catalogo-veiculo.php"><p class="title">CATÁLOGO</p></a></li>

            <li class="dropdown"><a href=""><p class="title">SOBRE</p></a></li>

            <li class="dropdown"><p class="title">TORNE-SE UM FORNECEDOR</p>

                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="fornecedores/cadastro-fornecedor.php">Cadastro</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="fornecedores/login-fornecedor.php">Log in</a></p></ul>
                </div>
            </li>

            <li class="dropdown"><p class="title">CONTA</p>
                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="../info/info-cliente.php">Informações</a></p></ul>
                    
                    <ul><p class="sub-title"><a class="dropdown-button" href="clientes/edit-cliente.php?id=<?= $_SESSION['cliente']->id_cliente ?>">Editar</a></p></ul>

                    <ul>
                        <form action="clientes/cruds/auth.php" method="post">
                            <input class="sub-title" type="submit" name="function" value="Log out">
                        </form>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</body>
</html>