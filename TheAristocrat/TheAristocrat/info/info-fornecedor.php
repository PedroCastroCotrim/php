<?php
  include_once '../conexao.php';
  
  $query_veiculo = "SELECT * FROM veiculo WHERE id_fornecedor = :id_fornecedor ORDER BY id_veiculo DESC";
  $stmt = $pdo->prepare($query_veiculo);
  $stmt->execute([
    'id_fornecedor' => $_SESSION['fornecedor']->id_fornecedor
  ]);

  $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $query_fornecedor = "SELECT * FROM fornecedor WHERE id_fornecedor = :id_fornecedor";
  $stmt = $pdo->prepare($query_fornecedor);
  $stmt->execute([
    'id_fornecedor' => $_SESSION['fornecedor']->id_fornecedor
  ]);

  $fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if(empty($_SESSION['fornecedor'])){
      header("Location: ../src/home.php");
  }

  foreach($fornecedores as $fornecedor);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-table.css">

  <title>Informações - <?= $fornecedor['nome'] ?></title>
</head>

<body>
  <p class="page-title">INFORMAÇÕES</p>

  <p class="sub-title"><?= $fornecedor['id_fornecedor'] ?></p>
  <p class="sub-title"><?= $fornecedor['nome'] ?></p>
  <p class="sub-title"><?= $fornecedor['email'] ?></p>
  <p class="sub-title"><?= $fornecedor['cpf'] ?></p>
  <p class="sub-title"><?= $fornecedor['telefone'] ?></p>

  <div class="box-table">
        <p class="page-title">MEUS VEÍCULOS</p>

        <main>
            <table>
                <tr>
                    <th><p class="title">ID</p></th>
                    <th><p class="title">MODELO</p></th>
                    <th><p class="title">MARCA</p></th>
                    <th><p class="title">ANO</p></th>
                    <th><p class="title">COR</p></th>
                    <th><p class="title">QUILOMETRAGEM</p></th>
                    <th><p class="title">VALOR</p></th>
                    <th><p class="title">DELETAR</p></th>
                    <th><p class="title">EDITAR</p></th>
                </tr>

                <?php foreach ($veiculos as $veiculo) { ?>

                <tr>
                    <td><p class="sub-title"><?= $veiculo['id_veiculo'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['modelo'] ?></p></td>
                    <td><p class="sub-title">
                            <?php
                                $query_marca = "SELECT nome FROM marca WHERE id_marca = :id_marca";
                                $stmt_marca = $pdo->prepare($query_marca);
                                $stmt_marca->bindParam(':id_marca', $veiculo['id_marca']);

                                try {
                                    $stmt_marca->execute();
                                    $marca = $stmt_marca->fetch(PDO::FETCH_ASSOC);
                                    echo $marca['nome'] ?? 'Marca não encontrada'; // Exibe "Marca não encontrada" se não houver resultado
                                } catch (PDOException $e) {
                                    echo "Erro ao buscar marca: " . $e->getMessage();
                                }
                            ?>
                        </p>
                    </td>
                    <td><p class="sub-title"><?= $veiculo['ano'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['cor'] ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['quilometragem'] . " KM" ?></p></td>
                    <td><p class="sub-title"><?= $veiculo['valor'] . " R$" ?></p></td>
                    <td>
                        <form method="post" action="../src/veiculos/cruds/delete.php">
                            <input type="hidden" name="id" value="<?= $veiculo['id_veiculo']; ?>">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja deletar?');"><p class="sub-title">Deletar</p></button>
                        </form>
                    </td>
                    <td>
                        <a href="../src/veiculos/edit-veiculo.php?id=<?= $veiculo['id_veiculo'] ?>"><p class="sub-title">Editar</p></a>
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