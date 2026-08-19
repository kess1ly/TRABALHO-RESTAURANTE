<?php

require_once "conexao.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: pratos.php");
    exit;
}

$id = (int) $_GET["id"];

$sql = "SELECT * FROM pratos WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    header("Location: pratos.php");
    exit;
}

$prato = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Prato - Restaurante</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h2>🍽️ Restaurante</h2>
</header>

<div class="container">

    <div class="formulario">

        <h1>Editar Prato</h1>

        <form action="atualizar_prato.php" method="POST">

            <input type="hidden" name="id" value="<?= htmlspecialchars($prato['id']) ?>">

            <label>Nome do prato:</label>
            <input type="text" name="nome"
                   value="<?= htmlspecialchars($prato['nome']) ?>"
                   required>

            <label>Descrição:</label>
            <input type="text" name="descricao"
                   value="<?= htmlspecialchars($prato['descricao']) ?>"
                   required>

            <label>Preço:</label>
            <input type="number" name="preco"
                   value="<?= htmlspecialchars($prato['preco']) ?>"
                   step="0.01"
                   min="0"
                   required>

            <label>Categoria:</label>
            <input type="text" name="categoria"
                   value="<?= htmlspecialchars($prato['categoria']) ?>"
                   required>

            <label>Disponibilidade:</label>

            <select name="disponibilidade" required>

                <option value="Disponível"
                    <?= $prato['disponibilidade'] === 'Disponível' ? 'selected' : '' ?>>
                    Disponível
                </option>

                <option value="Indisponível"
                    <?= $prato['disponibilidade'] === 'Indisponível' ? 'selected' : '' ?>>
                    Indisponível
                </option>

            </select>

            <br><br>

            <button type="submit">Salvar alterações</button>

        </form>

        <br>

        <a href="pratos.php">Voltar para pratos</a>

    </div>

</div>

</body>
</html>
