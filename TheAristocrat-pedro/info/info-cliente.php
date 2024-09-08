<?php
  include_once '../conexao.php';

  $query_compra = "SELECT * FROM compra WHERE id_cliente = :id_cliente ORDER BY id_compra DESC";
  $stmt_compra = $pdo->prepare($query_compra);
  $stmt_compra->execute([
    'id_cliente' => $_SESSION['cliente']->id_cliente
  ]);

  $compras = $stmt_compra->fetchAll(PDO::FETCH_ASSOC);

  $query_cliente = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";
  $stmt_compra = $pdo->prepare($query_cliente);
  $stmt_compra->execute([
    'id_cliente' => $_SESSION['cliente']->id_cliente
  ]);

  $clientes = $stmt_compra->fetchAll(PDO::FETCH_ASSOC);

  if(empty($_SESSION['cliente'])){
      header("Location: ../src/home.php");
  }

  foreach($clientes as $cliente);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-table.css">

  <title>Informações - Cliente</title>
</head>

<body>
  <p class="page-title">INFORMAÇÕES</p>

  <p class="sub-title"><?= $cliente['id_cliente'] ?></p>
  <p class="sub-title"><?= $cliente['nome'] ?></p>
  <p class="sub-title"><?= $cliente['email'] ?></p>
  <p class="sub-title"><?= $cliente['cpf'] ?></p>

  <div class="box-table">
        <p class="page-title">MINHAS COMPRAS</p>

        <main>
            <table>
                <tr>
                  <th><p class="title">ID</p></th>
                  <th><p class="title">MODELO</p></th>
                  <th><p class="title">DATA</p></th>
                  <th><p class="title">MÉTODO</p></th>
                  <th><p class="title">VALOR</p></th>
                  <th><p class="title">EDITAR</p></th>
                </tr>

                <?php foreach ($compras as $compra) { ?>

                <tr>
                    <td><p class="sub-title"><?= $compra['id_compra'] ?></p></td>
                    <td><p class="sub-title">
                            <?php
                                $query_veiculo = "SELECT modelo FROM veiculo WHERE id_veiculo = :id_veiculo";
                                $stmt_veiculo = $pdo->prepare($query_veiculo);
                                $stmt_veiculo->bindParam(':id_veiculo', $compra['id_veiculo']);

                                try {
                                    $stmt_veiculo->execute();
                                    $veiculo = $stmt_veiculo->fetch(PDO::FETCH_ASSOC);
                                    echo $veiculo['modelo'] ?? 'Veiculo não encontrada'; // Exibe "veiculo não encontrada" se não houver resultado
                                } catch (PDOException $e) {
                                    echo "Erro ao buscar veiculo: " . $e->getMessage();
                                }
                            ?>
                        </p>
                    </td>
                    <td><p class="sub-title"><?= $compra['data_compra'] ?></p></td>
                    <td><p class="sub-title"><?= $compra['metodo_pagamento'] ?></p></td>
                    <td><p class="sub-title"><?= $compra['valor_total'] . " R$" ?></p></td>
                    <td>
                        <a href="../src/compras/edit-compra.php?id=<?= $compra['id_compra'] ?>"><p class="sub-title">Editar</p></a>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </main>
    </div>

  <br><br>
  <a href="../src/home.php"><p class="sub-title">HOME</p></a>
</body>
</html>