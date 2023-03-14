<?php
include 'conexaoBD.php';

function cadastrarPaciente($paciente, $cpf, $codigoMedico){
    connect();
    query("INSERT INTO paciente (nome, cpf, codigoMedico)
         VALUES('$paciente', '$cpf', $codigoMedico)");
    close();
}

function mostrarPacientes($codigoMedico){
    connect();
    $consulta = query("SELECT * FROM paciente WHERE
                       codigo=$codigoMedico");
    close();
    $resultados = [];
    if(mysqli_num_rows($consulta)>0){
        while($linha=mysqli_fetch_assoc($consulta)){
            $resultados[]=$linha;
        }
    }
    return $resultados;
}

function mostrarPacienteAlterar($codigo){
    connect();
    $consulta=query("SELECT * FROM paciente WHERE
                    codigo=$codigo");
    close();
    $linha=mysqli_fetch_assoc($consulta);
    return $linha;
}

function editarPaciente($codigo, $nome, $cpf){
    connect();
    query("UPDATE paciente SET nome='$nome', cpf='$cpf' WHERE codigo=$codigo");
    close();
}

function excluirPaciente($codigo){
    connect();
    query("DELETE FROM paciente WHERE codigo=$codigo");
    close();
}