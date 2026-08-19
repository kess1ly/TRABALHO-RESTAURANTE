<?php

require_once "conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: cadastro_prato.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$descricao = trim($_POST["descricao"] ?? "");
$preco = trim($_POST["preco"] ?? "");
$categoria = trim($_POST["categoria"] ?? "");
$disponibilidade = trim($_POST["disponibilidade"] ?? "");

$erros = [];

if ($nome === "") {
    $erros[] = "O nome do prato é obrigatório.";
}

if ($descricao === "") {
    $erros[] = "A descrição é obrigatória.";
}

if ($preco === "" || !is_numeric($preco) || $preco < 0) {
    $erros[] = "Informe um preço válido.";
}

if ($categoria === "") {
    $erros[] = "A categoria é obrigatória.";
}

if ($disponibilidade === "") {
    $erros[] = "A disponibilidade é obrigatória.";
}

if (!empty($erros)) {

    foreach ($erros as $erro) {
        echo "<p>" . htmlspecialchars($erro) . "</p>";
    }

    echo '<a href="cadastro_prato.php">Voltar</a>';
    exit;
}

$sql = "INSERT INTO pratos 
        (nome, descricao, preco, categoria, disponibilidade)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);

$stmt->bind_param(
    "ssdss",
    $nome,
    $descricao,
    $preco,
    $categoria,
    $disponibilidade
);

if ($stmt->execute()) {
    header("Location: pratos.php");
    exit;
} else {
    echo "Erro ao cadastrar prato: " . htmlspecialchars($stmt->error);
}

$stmt->close();
$conexao->close();

?>
