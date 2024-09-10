<?php
    include_once '../../../conexao.php';

    if (isset($_POST['id_compra'])) {
        $compra = $_POST['id_compra'];
        $veiculo = $_POST['id_veiculo'];

        $query = "DELETE FROM compra WHERE id_compra = :id_compra LIMIT 1";
        $stmt = $pdo -> prepare($query);
        $stmt->bindParam('id_compra', $compra);

        $query_veiculo = "UPDATE veiculo SET status_veiculo = '' WHERE id_veiculo = $veiculo";
        $stmt_status = $pdo -> prepare($query_veiculo);  
        $stmt_status -> execute();

        try {
            $stmt->execute();

            echo "<script>alert('Compra cancelada com sucesso!');</script>";
            header("Location: ../../../info/info-cliente.php"); 
            exit();

        } catch (PDOException $e) {
            echo "Erro ao cancelar compra: " . $e->getMessage();
        }

    } else {
        echo "<script>alert('ID do usuário não informado.');</script>";
        header("Location: ../../../info/info-cliente.php");
    }