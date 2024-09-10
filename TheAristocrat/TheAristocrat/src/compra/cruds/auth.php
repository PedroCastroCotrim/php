<?php
    include_once '../../../conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

            try {
                $veiculo = $_POST['id'];
                $cliente = $_SESSION['cliente']->id_cliente;
                $valor = $_POST['valor_total'];
                $pagamento = $_POST['metodo_pagamento'];

                $query = "INSERT INTO compra (id_veiculo, id_cliente, data_compra, valor_total, metodo_pagamento) 
                        VALUES (:id_veiculo, :id_cliente, CURRENT_DATE(), :valor_total, :metodo_pagamento)";

                $stmt = $pdo -> prepare($query);
                $stmt -> bindParam(':id_veiculo', $veiculo);
                $stmt -> bindParam(':id_cliente', $cliente);
                $stmt -> bindParam(':valor_total', $valor);
                $stmt -> bindParam(':metodo_pagamento', $pagamento);
                $stmt -> execute();
                    
                $query_veiculo = "UPDATE veiculo SET status_veiculo = 'comprado' WHERE id_veiculo = $veiculo";
                $stmt_status = $pdo -> prepare($query_veiculo);  
                $stmt_status -> execute();

                echo "<script>alert('Cadastrado com sucesso!')</script>";
                header("Location: ../../../info/info-cliente.php");
                exit();} catch (PDOException $e) {
                    echo "Erro ao cadastrar: " . $e->getMessage();

            }

        }