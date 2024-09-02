<?php
    require_once '../../../conexao.php';

    if (isset($_POST['id_fornecedor'])) {
        $id_fornecedor = $_POST['id_fornecedor'];

        $query = "DELETE FROM fornecedor WHERE id_fornecedor = :id_fornecedor LIMIT 1";
        $stmt = $pdo -> prepare($query);
        $stmt->bindParam(':id_fornecedor', $id_fornecedor);

        try {
            $stmt->execute();

            echo "<script>alert('Fornecedor deletado com sucesso!');</script>";
            header("Location: ../lista-fornecedor.php"); 
            exit();

        } catch (PDOException $e) {
            echo "Erro ao deletar Fornecedor: " . $e->getMessage();
        }

    } else {
        echo "<script>alert('ID do Fornecedor não informado.');</script>";
        header("Location: ../lista-fornecedor.php");
    }