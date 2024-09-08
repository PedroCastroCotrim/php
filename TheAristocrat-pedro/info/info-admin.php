<?php
  include_once '../conexao.php';

  $query_administrador = "SELECT * FROM administrador WHERE id_admin = :id_admin";
  $stmt = $pdo->prepare($query_administrador);
  $stmt->execute([
    'id_admin' => $_SESSION['administrador']->id_admin
  ]);

  $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if(empty($_SESSION['administrador'])){
      header("Location: ../src/home.php");
  }

  foreach($admins as $admin);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style-table.css">

  <title>Informações - Admin</title>
</head>

<body>
  <p class="page-title">INFORMAÇÕES</p>

  <p class="sub-title"><?= $admin['id_admin'] ?></p>
  <p class="sub-title"><?= $admin['nome'] ?></p>
  <p class="sub-title"><?= $admin['email'] ?></p>
  <p class="sub-title"><?= $admin['telefone'] ?></p>

  <br><br>
  <a href="../src/home.php"><p class="sub-title">HOME</p></a>
</body>
</html>