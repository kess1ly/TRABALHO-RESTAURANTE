<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <h2>Restaurante</h2>
</header>

<div class="container">

    <div class="formulario">

        <h1>Cadastrar Cliente</h1>

      

        <form action="salvar.php" method="POST">

            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>CPF:</label>
            <input type="text" name="cpf" required>

            <label>Senha:</label>
            <input type="password" name="senha" required>

            <label>Telefone:</label>
            <input type="text" name="telefone" required>

            <label>E-mail:</label>
            <input type="email" name="email" required>

           
            <button type="submit">Cadastrar</button>

        </form>

        <br>

        <a href="index.php">Voltar para clientes</a>

    </div>

</div>

</body>
</html>
