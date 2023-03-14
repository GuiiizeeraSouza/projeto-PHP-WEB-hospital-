<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hospital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                        <?php
                        session_start();
                        if (isset($_SESSION['nome'])) {
                            $nome = $_SESSION['nome'];

                            echo "<span class='texto'>Olá, Dr. $nome!</span>";
                        } else {
                            echo "<script>alert('Você não esta logado! :('); </script>";
                            echo "<script>window.location='loginVendedor.php'; </script>";
                        }
                        ?>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="cadastrarPaciente.php">Cadastrar Paciente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="visualizarPaciente.php">Visualizar Pacientes</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="btn-sair">
                        <form method="post" action="../control/controleMedico.php">
                            <button class="botao bg-light" type="submit" name="opcao" value="Sair">Sair</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                <br><br><br>
                <h1>Editar paciente</h1>
            </div>
        </div>
    </div>

    <?php
        include '../model/crudPaciente.php';
        $codigo = $_GET["codigo"];

        $resultado = mostrarPacienteAlterar($codigo);
    ?>

    <div class="container">
        <form method="post" action="../control/controlePaciente.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do cliente:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= $resultado['nome'] ?>" placeholder="digite o nome">
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $resultado['cpf'] ?>" placeholder="999.999.999-99" title="Digite o CPF no formato 999.999.999-99" aria-describedby="cpfHelp" pattern="\d{3}.\d{3}.\d{3}-\d{2}">
            </div>

            <input type="hidden" name="codigo" value="<?= $resultado['codigo'] ?>">

            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" name="opcao" value="Alterar">Alterar</button>
                        <button type="submit" class="btn btn-danger" name="opcao" value="Excluir">Excluir</button>
                        <a class="btn btn-light" href="visualizarPaciente.php">Cancelar</a>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
    <script src="../js/mascaras.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>