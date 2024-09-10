<?php
    include_once '../../../conexao.php';
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM veiculo WHERE id_veiculo = :id";
        $statement = $pdo->prepare($query);
        $statement -> bindParam(':id', $id);

        try {
            $statement->execute();
            echo "<script>alert('Veículo deletado com sucesso!');</script>";

            if(isset($_SESSION['fornecedor'])){
                header("Location: ../../../info/info-fornecedor.php");
            } else {
                header("Location: ../lista-veiculo.php");
            }
        } catch (PDOException $e) {
            echo "Erro ao deletar veículo: " . $e->getMessage();
        }
    } else {
        echo "<script>alert('ID do veículo não informado.');</script>";
        header("Location: ../../../info/info-fornecedor.php");
    }