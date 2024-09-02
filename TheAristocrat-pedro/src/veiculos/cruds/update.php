<?php
    require_once '../../../conexao.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            if ($_POST['function'] == 'update') {
                $id = trim($_POST['id']);
                $modelo = trim($_POST['modelo']);
                $id_marca = trim($_POST['id_marca']);
                $ano = trim($_POST['ano']);
                $cor = trim($_POST['cor']);
                $quilometragem = trim($_POST['quilometragem']);
                $valor = trim($_POST['valor']);
    
                $query = "UPDATE veiculo SET modelo = :modelo, id_marca = :id_marca, ano = :ano, cor = :cor, quilometragem = :quilometragem, valor = :valor 
                        WHERE id_veiculo = :id LIMIT 1";
    
                $stmt = $pdo -> prepare($query);
    
                $stmt -> bindParam("modelo", $modelo);
                $stmt -> bindParam("id_marca", $id_marca);
                $stmt -> bindParam("ano", $ano);
                $stmt -> bindParam("cor", $cor);
                $stmt -> bindParam("quilometragem", $quilometragem);
                $stmt -> bindParam("valor", $valor);
                $stmt -> bindParam("id", $id);
    
                $stmt -> execute();
    
                if ($stmt->rowCount() > 0) {
                    echo "<script>alert('Atualizado com sucesso!')</script>";
                    header("Location: ../lista-veiculo.php");
                } else {
                    throw new Exception("Erro ao atualizar.");
                }
            } 
        } catch (Exception $e) {
            echo "<script>alert('{$e->getMessage()}')</script>";
            header("Location: ../lista-veiculo.php");
        }
    }