<?php
include '../model/crudMedico.php';
if (isset($_POST["opcao"])) {
    $opcao = $_POST["opcao"];
} else {
    $opcao = $_GET["opcao"];
}
switch ($opcao) {
    case 'Cadastrar';
        cadastrarMedico($_POST["nome"], sha1($_POST["senha"]));
        if($cadastrou == "nao"){
            echo "<script>alert('Usuário ja cadastrado! :('); </script>";
            echo "<script>window.location='../view/cadastrarMedico.php'; </script>";
        }
        else{
            header("location: ../view/loginMedico.php");
        }
        break;

    case 'Entrar':
        $nome = $_POST["nome"];
        $senha = sha1($_POST["senha"]);
        $banco = buscarMedico($nome);
        if ($nome === $banco['nome']) {
            if ($senha === $banco['senha']) {
                session_start();
                $_SESSION['nome'] = $nome;
                $_SESSION['codigoMedico'] = $banco['codigoMedico'];
                
                header("Location: ../view/visualizarPaciente.php");
            } else {
                echo "<script>alert('Senha Incorreta!'); </script>";
                echo "<script>windows.location='../view/loginMedico.php';</script>";
            }
        } else {
            echo "<script>alert('Nome Incorreto!'); </script>";
            echo "<script>windows.location='../view/loginMedico.php';</script>";
        }
        break;

    case 'Sair':
        session_start();
        session_destroy();
        echo "<script>alert('Destruiu a sessão!'); </script>";
        echo "<script>window.location='../view/loginMedico.php';</script>";
        break;
}
