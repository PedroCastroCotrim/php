<?php
    require_once '../../../conexao.php';

    if (isset($_POST['id_marca'])) {
        $id_marca = $_POST['id_marca'];

        $query = "DELETE FROM marca WHERE id_marca = :id_marca LIMIT 1";
        $stmt = $pdo -> prepare($query);
        $stmt->bindParam(':id_marca', $id_marca);

        try {
            $stmt->execute();

            echo "<script>alert('Marca deletada com sucesso!');</script>";
            header("Location: ../lista-marca.php"); 
            exit();

        } catch (PDOException $e) {
            echo "Erro ao deletar marca: " . $e->getMessage();
        }

    } else {
        echo "<script>alert('ID da marca não informado.');</script>";
        header("Location: ../lista-marca.php");
    }