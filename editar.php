<?php

require_once "conexao.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET["id"];

$sql = "SELECT * FROM clientes WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    echo "Cliente não encontrado.";
    exit;
}

$cliente = $resultado->fetch_assoc();

$stmt->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>

    <h1>Editar Cliente</h1>

    <form action="atualizar.php" method="POST">

        <input type="hidden" name="id" value="<?= htmlspecialchars($cliente['id']) ?>">

        <label>Nome:</label>
        <input 
            type="text" 
            name="nome" 
            value="<?= htmlspecialchars($cliente['nome']) ?>" 
            required
        >
        <br><br>

        <label>CPF:</label>
        <input 
            type="text" 
            name="cpf" 
            value="<?= htmlspecialchars($cliente['cpf']) ?>" 
            required
        >
        <br><br>

        <label>Telefone:</label>
        <input 
            type="text" 
            name="telefone" 
            value="<?= htmlspecialchars($cliente['telefone']) ?>" 
            required
        >
        <br><br>

        <label>E-mail:</label>
        <input 
            type="email" 
            name="email" 
            value="<?= htmlspecialchars($cliente['email']) ?>" 
            required
        >
        <br><br>

        <label>Endereço:</label>
        <input 
            type="text" 
            name="endereco" 
            value="<?= htmlspecialchars($cliente['endereco']) ?>" 
            required
        >
        <br><br>

        <button type="submit">Salvar alterações</button>

    </form>

    <br>

    <a href="index.php">Cancelar</a>

</body>
</html>
