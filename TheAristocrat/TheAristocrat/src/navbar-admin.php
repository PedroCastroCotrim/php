<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/TheAristocrat/css/variaveis.css">
    <link rel="stylesheet" href="/TheAristocrat/css/navbar.css">
</head>
<body>

<div class="box-navbar">
    <nav>
        <ul>
        <li class="dropdown"><a href="../index.php"><img src="/TheAristocrat/css/imgs/svg/Loog.svg" alt=""></a></li>

            <li class="dropdown"><a href=""><p class="title">SOBRE</p></a></li>

            <li class="dropdown"><a href="marcas/cadastro-marca.php"><p class="title">REGISTRAR MARCA</p></a></li>

            <li class="dropdown"><p class="title">ADMINISTRAÇÃO</p>
                <div class="dropdown-menu">
                    <ul><p class="title"><a class="dropdown-button" href="admins/lista-admin.php">Registro de admins</a></p></ul>
                    <ul><p class="title"><a class="dropdown-button" href="fornecedores/lista-fornecedor.php">Registro de fornecedores</a></p></ul>
                    <ul><p class="title"><a class="dropdown-button" href="clientes/lista-cliente.php">Registro de clientes</a></p></ul>
                    <ul><p class="title"><a class="dropdown-button" href="veiculos/lista-veiculo.php">Registro de veículos</a></p></ul>
                    <ul><p class="title"><a class="dropdown-button" href="marcas/lista-marca.php">Registro de marcas</a></p></ul>
                </div>
            </li>

            <li class="dropdown"><p class="title">CONTA</p>
                <div class="dropdown-menu">
                    <ul><p class="title"><a class="dropdown-button" href="../info/info-admin.php">Informações</a></p></ul>
                    
                    <ul><p class="title"><a class="dropdown-button" href="admins/edit-admin.php?id=<?= $_SESSION['administrador']->id_admin ?>">Editar</a></p></ul>

                    <ul>
                        <form action="admins/cruds/auth.php" method="post">
                            <input class="title" type="submit" name="function" value="Log out">
                        </form>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</div>
    
</body>
</html>