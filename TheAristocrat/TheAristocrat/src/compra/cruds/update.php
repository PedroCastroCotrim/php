<?php
    include_once '../../../conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try { 
            $id = trim($_POST['id']);
            $pagamento = trim($_POST['metodo_pagamento']);

            $query = "UPDATE compra SET metodo_pagamento = :metodo_pagamento WHERE id_compra = $id LIMIT 1";
            $stmt = $pdo->prepare($query);
            $stmt -> bindParam("metodo_pagamento", $pagamento);
            $stmt -> execute();

            if ($stmt -> rowCount() > 0) {
                echo "<script>alert('Compra atualizada com sucesso!')</script>";
                header("Location: ../../../info/info-cliente.php");
            } else {
                throw new Exception("Erro ao atualizar.");
            }
        } catch (Exception $e) {
            echo "<script>alert('{$e->getMessage()}')</script>";
            header("Location: ../../../info/info-cliente.php");
        }
    }