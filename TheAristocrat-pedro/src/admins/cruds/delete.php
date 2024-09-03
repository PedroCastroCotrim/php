<?php
    require_once '../../../conexao.php';

    if (isset($_POST['id_admin'])) {
        $id_admin = $_POST['id_admin'];

        $query = "DELETE FROM administrador WHERE id_admin = :id_admin LIMIT 1";
        $stmt = $pdo -> prepare($query);
        $stmt->bindParam(':id_admin', $id_admin);

        try {
            $stmt->execute();

            echo "<script>alert('Usuário deletado com sucesso!');</script>";
            header("Location: ../lista-admin.php"); 
            exit();

        } catch (PDOException $e) {
            echo "Erro ao deletar admin: " . $e->getMessage();
        }

    } else {
        echo "<script>alert('ID do usuário não informado.');</script>";
        header("Location: ../lista-admin.php");
    }