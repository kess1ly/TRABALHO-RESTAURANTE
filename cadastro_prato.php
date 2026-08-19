<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastrar Prato - Restaurante</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h2>🍽️ Restaurante</h2>
</header>

<div class="container">

    <div class="formulario">

        <h1>Cadastrar Prato</h1>

        <form action="salvar_prato.php" method="POST">

            <label>Nome do prato:</label>
            <input type="text" name="nome" required>

            <label>Descrição:</label>
            <input type="text" name="descricao" required>

            <label>Preço:</label>
            <input type="number" name="preco" step="0.01" min="0" required>

            <label>Categoria:</label>
            <input type="text" name="categoria" required>

            <label>Disponibilidade:</label>
            <select name="disponibilidade" required>
                <option value="">Selecione</option>
                <option value="Disponível">Disponível</option>
                <option value="Indisponível">Indisponível</option>
            </select>

            <br><br>

            <button type="submit">Cadastrar prato</button>

        </form>

        <br>

        <a href="pratos.php">Voltar para pratos</a>

    </div>

</div>

</body>
</html>
