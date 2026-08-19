<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "restaurante";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if($conexao->connect_error){
    die("Erro na conexao com o banco de dados:" . $conexa0->connect_error);

}

$conexao->set_charset("utf8mb4");

?>
