<?php

require_once "conexao.php";

$sql = "SELECT * FROM clientes ORDER BY id DESC";

$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Clientes - Restaurante</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h2> Restaurante</h2>
</header>

<div class="container">

    <h1>Clientes</h1>

    <a class="botao" href="cadastro.php">
        + Cadastrar novo cliente
    </a>

    <br><br>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Data de cadastro</th>
            <th>Ações</th>
        </tr>

        <?php while ($cliente = $resultado->fetch_assoc()) { ?>

            <tr>

                <td>
                    <?= htmlspecialchars($cliente['id']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($cliente['nome']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($cliente['cpf']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($cliente['telefone']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($cliente['email']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($cliente['data_cadastro']) ?>
                </td>

                <td class="acoes">

                    <a href="editar.php?id=<?= $cliente['id'] ?>">
                        Editar
                    </a>

                    |

                    <a href="excluir.php?id=<?= $cliente['id'] ?>">
                        Excluir
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>
