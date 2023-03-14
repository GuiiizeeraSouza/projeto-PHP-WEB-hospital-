<?php
include 'conexaoBD.php';

function cadastrarUsuario($nome, $senha)
{
    connect();
    query("INSERT INTO login (nomeusuario, senhausuario) VALUES ('$nome', '$senha')");
    close();
}

function buscarUsuario($nome)
{
    connect();
    $consulta = query("SELECT * FROM login WHERE nomeusuario='$nome'");
    close();
    $resultadoSeparado = mysqli_fetch_assoc($consulta);

    return $resultadoSeparado;
}
