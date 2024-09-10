<?php
    include_once '../../../conexao.php';

    if (isset($_POST['id_cliente'])) {
        $id_cliente = $_POST['id_cliente'];

        $query = "DELETE FROM cliente WHERE id_cliente = :id_cliente LIMIT 1";
        $stmt = $pdo -> prepare($query);
        $stmt->bindParam(':id_cliente', $id_cliente);

        try {
            $stmt->execute();

            echo "<script>alert('Usuário deletado com sucesso!');</script>";
            header("Location: ../lista-cliente.php"); 
            exit();

        } catch (PDOException $e) {
            echo "Erro ao deletar usuário: " . $e->getMessage();
        }

    } else {
        echo "<script>alert('ID do usuário não informado.');</script>";
        header("Location: ../lista-cliente.php");
    }