<?php
    include_once '../conexao.php';
    navbar_session();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-table.css">
    <title>The Aristocrat - Home</title>
</head>
<body>
    <p class="page-title">The Aristocrat</p>

    <p class="title">Cliente</p>
    <p class="sub-title"><a href="clientes/cadastro-cliente.php">(Cadastro cliente)</a></p><br>
    <p class="sub-title"><a href="clientes/login-cliente.php">(Log In cliente)</a></p><br>
    <p class="sub-title"><a href="clientes/lista-cliente.php">(Lista cliente)</a></p><br>
    <p class="sub-title"><a href="clientes/edit-cliente.php">(Editar cliente)</a></p><br>
    <br><br>

    <p class="title">Fornecedor</p>
    <p class="sub-title"><a href="fornecedores/cadastro-fornecedor.php">(Cadastro fornecedor)</a></p><br>
    <p class="sub-title"><a href="fornecedores/login-fornecedor.php">(Log In fornecedor)</a></p><br>
    <p class="sub-title"><a href="fornecedores/lista-fornecedor.php">(Lista fornecedor)</a></p><br>
    <p class="sub-title"><a href="fornecedores/edit-fornecedor.php">(Editar fornecedor)</a></p><br>
    <br><br>

    <p class="title">Admin</p>
    <p class="sub-title"><a href="admins/cadastro-admin.php">(Cadastro admin)</a></p><br>
    <p class="sub-title"><a href="admins/login-admin.php">(Log In admin)</a></p><br>
    <p class="sub-title"><a href="admins/lista-admin.php">(Lista admin)</a></p><br>
    <p class="sub-title"><a href="admins/edit-admin.php">(Editar admin)</a></p><br>
    <br><br>

    <p class="title">Veículo</p>
    <p class="sub-title"><a href="veiculos/cadastro-veiculo.php">(Cadastro veículo)</a></p><br>
    <p class="sub-title"><a href="veiculos/lista-veiculo.php">(Lista veículo)</a></p><br>
    <p class="sub-title"><a href="veiculos/edit-veiculo.php">(Editar veículo)</a></p><br>
    <br><br>

    <p class="title">Marca</p>
    <p class="sub-title"><a href="marcas/cadastro-marca.php">(Cadastro marca)</a></p><br>
    <p class="sub-title"><a href="marcas/lista-marca.php">(Lista marca)</a></p><br>
    <p class="sub-title"><a href="marcas/edit-marca.php">(Editar marca)</a></p><br>
    <br><br>

    <p class="title">Catálogo</p>
    <p class="sub-title"><a href="veiculos/catalogo-veiculo.php">(Catálogo)</a></p><br>
    <br><br>
    
    <p class="title">Informações</p>
    <p class="sub-title"><a href="../info/info-admin.php">(Informações admin)</a></p><br>
    <p class="sub-title"><a href="../info/info-fornecedor.php">(Informações fornecedor)</a></p><br>
    <p class="sub-title"><a href="../info/info-cliente.php">(Informações cliente)</a></p><br>
    <br><br>
</body>
</html>