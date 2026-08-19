<?php

require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$cpf = trim($_POST["cpf"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$email = trim($_POST["email"] ?? "");
$endereco = trim($_POST["endereco"] ?? "");

$erros = validarCliente(
    $nome,
    $cpf,
    $telefone,
    $email,
    $endereco
);

$sql = "INSERT INTO clientes (nome, cpf, telefone, email, endereco, data_cadastro)
        VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssss",
    $nome,
    $cpf,
    $telefone,
    $email,
    $endereco
);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao cadastrar cliente: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conexao->close();

?>
