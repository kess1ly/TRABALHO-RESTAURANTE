<?php

require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

$nome = trim($_POST["nome"] ?? "");
$cpf = trim($_POST["cpf"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$email = trim($_POST["email"] ?? "");


$erros = validarCliente(
    $nome,
    $cpf,
    $telefone,
    $email
    
);

if (!$id) {
    $erros[] = "ID do cliente inválido.";
}

$sql = "UPDATE clientes
        SET nome = ?, cpf = ?, telefone = ?, email = ?,
        WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssssi",
    $nome,
    $cpf,
    $telefone,
    $email,
    $id
);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "Erro ao atualizar cliente: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conexao->close();

?>
