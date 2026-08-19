<?php

require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$cpf = trim($_POST["cpf"] ?? "");
$senha = trim($_POST["senha"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$email = trim($_POST["email"] ?? "");


$erros = validarCliente(
    $nome,
    $cpf,
    $senha,
    $telefone,
    $email
 
    
);

if (!empty($erros)) {
    foreach ($erros as $erro) {
        echo "<p>" . htmlspecialchars($erro) . "</p>";
    }

    echo '<a href="cadastro.php">Voltar</a>';
    exit;
}

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO clientes 
        (nome, cpf, senha, telefone, email, data_cadastro)
        VALUES (?, ?, ?, ?, ?, NOW())";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "sssss",
    $nome,
    $cpf,
    $senha_hash,
    $telefone,
    $email
    
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
