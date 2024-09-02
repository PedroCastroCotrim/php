<?php
    require_once '../../../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            try {
                $stmt  = $pdo -> prepare("INSERT INTO veiculo (modelo, id_marca, ano, cor, quilometragem, valor) 
                                            VALUES (:modelo, :id_marca, :ano, :cor, :quilometragem, :valor)");
                                
                $modelo = $_POST['modelo'];
                $marca = $_POST['marca'];
                $ano = $_POST['ano'];
                $cor = $_POST['cor'];
                $quilometragem = $_POST['quilometragem'];
                $valor = $_POST['valor'];
    
                $stmt -> bindParam(':modelo', $modelo);
                $stmt -> bindParam(':id_marca', $marca);
                $stmt -> bindParam(':ano', $ano);
                $stmt -> bindParam(':cor', $cor);
                $stmt -> bindParam(':quilometragem', $quilometragem);
                $stmt -> bindParam(':valor', $valor);
                
                $stmt -> execute();
    
                echo "<script>alert('Cadastrado com sucesso!')</script>";
                header("Location: ../lista-veiculo.php");
                exit();} catch (PDOException $e) {
                    echo "Erro ao cadastrar: " . $e->getMessage();

            }

        }