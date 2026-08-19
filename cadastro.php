<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastrar Cliente</h1>

    <form action="salvar.php" method="POST">

    <label>Nome:</label>
    <input type="text" name="nome" required>
    <br><br>

    <label>CPF:</label>
    <input type="text" name="cpf" required>
    <br><br>

    <label>Telefone:</label>
    <input type="tel" name="telefone"required>
    <br><br>

    <label>E-mail:</label>
    <input type="email" name="email" required>
    <br><br>

    <label>Endereço</label>
    <input type="text" name="endereco" required>
    <br><br>

    <button type="submit">Cadastrar</button>

</form>

<br>

<a href="index.php">Voltar para clientes</a>

</body>
</html>
