<?php
require_once '../../../conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $nome = $_POST['nome'];

        // Verificar se a marca já existe
        $stmt_verificar = $pdo->prepare("SELECT * FROM marca WHERE nome = :nome");
        $stmt_verificar->bindParam(':nome', $nome);
        $stmt_verificar->execute();

        if ($stmt_verificar->rowCount() > 0) {
            echo "<script>alert('A marca já existe!');</script>";
            header("Location: ../cadastro-marca.php");
            exit();
        }

        // Inserir a marca
        $stmt = $pdo->prepare("INSERT INTO marca (nome) VALUES (:nome)");
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        echo "<script>alert('Cadastrada com sucesso!')</script>";
        header("Location: ../lista-marca.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}