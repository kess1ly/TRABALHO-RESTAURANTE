<?php

require_once "conexao.php";

$sql ="SELECT * FROM clientes ORDER BY id DESC";

$resultado =$conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Restarante</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="cadastro.php">Cadastrar novo cliente</a>

    <br><br>

    <table border="1">

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Endereço</th>
        <th>Data de cadastro</th>
        <th>Ações</th>
</tr>
<?php while ($cliente = $resultado->fetch_assoc()){?>
    <tr>
       <td><?= htmlspecialchars($cliente['id']) ?></td>
                <td><?= htmlspecialchars($cliente['nome']) ?></td>
                <td><?= htmlspecialchars($cliente['cpf']) ?></td>
                <td><?= htmlspecialchars($cliente['telefone']) ?></td>
                <td><?= htmlspecialchars($cliente['email']) ?></td>
                <td><?= htmlspecialchars($cliente['endereco']) ?></td>
                <td><?= htmlspecialchars($cliente['data_cadastro']) ?></td>

                <td>
                    <a href="editar.php?id=<?= $cliente['id'] ?>">Editar</a>
                    |
                    <a href="excluir.php?id=<?= $cliente['id'] ?>">Excluir</a>
                </td>
            </tr>

        <?php } ?>

    </table>

</body>
</html>
