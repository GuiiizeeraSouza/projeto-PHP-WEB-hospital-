<?php
include '../model/CRUDusuario.php';

if (isset($_POST["opcao"])) {
    $opcao = $_POST["opcao"];
} else {
    $opcao = $_GET["opcao"];
}

switch ($opcao) {
    case 'Cadastrar';
        cadastrarUsuario($_POST["nome"], sha1($_POST["senha"]));
        header("Location: ../view/login.php");
        
        break;

    case 'Entrar':
        $nome = $_POST["nome"];
        $senha = sha1($_POST["senha"]);
        $banco = buscarUsuario($nome);

        if ($nome === $banco['nomeusuario']) {
            if ($senha === $banco['senhausuario']) {
                session_start();
                $_SESSION['nome'] = $nome;
                header("Location: ../../produto/view/visualizar.php");
            } 
            else {
                echo "<script>alert('Senha Incorreta!'); </script>";
                echo "<script>window.location='../view/login.php'; </script>";
                
            }
        } 
        else {
            echo "<script>alert('Nome Incorreto!'); </script>";
            echo "<script>window.location='../view/login.php'; </script>";
        }
        break;

    case 'Sair':
        session_start();
        session_destroy();
        echo "<script>alert('Destruiu a sessão!'); </script>";
        echo "<script>window.location='../view/login.php';</script>";
        break;
}
