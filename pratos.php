<?php

require_once "conexao.php";

$sql = "SELECT * FROM pratos ORDER BY id DESC";

$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pratos - Restaurante</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <h2>🍽️ Restaurante</h2>
</header>

<div class="container">

    <h1>Pratos</h1>

    <a class="botao" href="cadastro_prato.php">
        + Cadastrar prato
    </a>

    <br><br>

    <table>

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Disponibilidade</th>
            <th>Ações</th>
        </tr>

        <?php while ($prato = $resultado->fetch_assoc()) { ?>

            <tr>

                <td>
                    <?= htmlspecialchars($prato['id']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($prato['nome']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($prato['descricao']) ?>
                </td>

                <td>
                    R$ <?= number_format($prato['preco'], 2, ',', '.') ?>
                </td>

                <td>
                    <?= htmlspecialchars($prato['categoria']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($prato['disponibilidade']) ?>
                </td>

                <td class="acoes">

                    <a href="editar_prato.php?id=<?= $prato['id'] ?>">
                        Editar
                    </a>

                    |

                    <a href="excluir_prato.php?id=<?= $prato['id'] ?>">
                        Excluir
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>
