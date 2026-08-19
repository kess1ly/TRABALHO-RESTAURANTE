<?php

function validarCliente($nome, $cpf, $telefone, $email, $endereco)
{
    $erros = [];

    if ($nome === "") {
        $erros[] = "O nome é obrigatório.";
    }

    if ($cpf === "") {
        $erros[] = "O CPF é obrigatório.";
    }

    if ($telefone === "") {
        $erros[] = "O telefone é obrigatório.";
    }

    if ($email === "") {
        $erros[] = "O e-mail é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Informe um e-mail válido.";
    }

    if ($endereco === "") {
        $erros[] = "O endereço é obrigatório.";
    }

    return $erros;
}

?>
