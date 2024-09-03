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
                    <ul><p class="sub-title"><a class="dropdown-button" href="veiculos/lista-veiculo.php">Veiculos</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="marcas/lista-marca.php">Marcas</a></p></ul>
                </div>
            </li>

            <li class="dropdown"><a href=""><p class="title">SOBRE</p></a></li>

            <li class="dropdown"><p class="title">CADASTRO</p>
                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="admins/cadastro-admin.php">Cadastro de administrador</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="fornecedores/cadastro-fornecedor.php">Cadastro de fornecedor</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="clientes/cadastro-cliente.php">Cadastro de cliente</a></p></ul>
                </div>
            </li>

            <li class="dropdown"><p class="title">LOG IN</p>
                <div class="dropdown-menu">
                    <ul><p class="sub-title"><a class="dropdown-button" href="admins/login-admin.php">Log in de administrador</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="fornecedores/login-fornecedor.php">Log in de fornecedor</a></p></ul>
                    <ul><p class="sub-title"><a class="dropdown-button" href="clientes/login-cliente.php">Log in de cliente</a></p></ul>
                </div>
            </li>
        </ul>
    </nav>
</body>
</html>