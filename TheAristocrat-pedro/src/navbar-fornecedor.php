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

            <li class="dropdown"><p class="title">CATÁLOGO</p>
                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="veiculos/lista-veiculo.php">Veículos</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="marcas/lista-marca.php">Marcas</a></p></ul>
                </div>
            </li>

            <li class="dropdown"><a href=""><p class="title">SOBRE</p></a></li>

            <li class="dropdown"><p class="title">REGISTRAR</p>
                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="veiculos/cadastro-veiculo.php">Veículos</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="marcas/cadastro-marca.php">Marcas</a></p></ul>
                </div>
            </li>

            <li class="dropdown"><p class="title">CONTA</p>
                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="">Informações</a></p></ul>
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