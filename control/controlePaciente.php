<?php
include '../model/crudPaciente.php';
$opcao = $_POST["opcao"];

switch ($opcao) {
    case 'Cadastrar':
        cadastrarPaciente($_POST["nome"], $_POST["cpf"], $_POST["codigoMedico"]);
        header("Location: ../view/cadastrarPaciente.php");
        break;
    case 'Alterar':
        editarPaciente($_POST["codigo"], $_POST["nome"], $_POST["cpf"]);
        header("Location: ../view/visualizarPaciente.php");
        
        break;
    case 'Excluir':
        excluirPaciente(
            $_POST["codigo"]
        );
        header("Location: ../view/visualizarPaciente.php");
        break;
}