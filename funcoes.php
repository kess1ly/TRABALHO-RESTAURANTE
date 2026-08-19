<?php

function validarCliente($nome, $cpf, $senha, $telefone, $email)
{
    $erros = [];

    if ($nome === "") {
        $erros[] = "O nome é obrigatório.";
    }

    if ($cpf === "") {
        $erros[] = "O CPF é obrigatório.";
    }

    if ($senha === "") {
        $erros[] = "A senha é obrigatória.";
    } elseif (strlen($senha) < 6) {
        $erros[] = "A senha deve ter pelo menos 6 caracteres.";
    }

    if ($telefone === "") {
        $erros[] = "O telefone é obrigatório.";
    }

    if ($email === "") {
        $erros[] = "O e-mail é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Informe um e-mail válido.";
    }

   
    return $erros;
}

?>
