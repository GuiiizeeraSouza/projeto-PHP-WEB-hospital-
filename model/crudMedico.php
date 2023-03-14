<?php
include 'conexaoBD.php';

function cadastrarMedico($nome, $senha)
{
    connect();
    query("INSERT INTO medico (nome, senha) VALUES ('$nome', '$senha')");
    close();
}
function buscarMedico($nome)
{
    connect();
    $consulta = query("SELECT * FROM medico WHERE nome='$nome'");
    close();
    $resultadoSeparado = mysqli_fetch_assoc($consulta);
    return $resultadoSeparado;
}