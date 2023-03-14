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
    <br>
    <div class="container">
        <h3>Visualizar Pacientes</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Opção</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../model/crudPaciente.php';
                $codigo = $_SESSION['codigoMedico'];
                $resultados = mostrarPacientes($codigo);
                foreach ($resultados as $linha) :
                    echo "
                        <tr>
                            <td>$linha[nome]</td>
                            <td>$linha[cpf]</td>
                            <td><a class='btn btn-success' href='editarPaciente.php?codigo=$linha[codigo]'>Editar</a></td>
                        </tr>
                        ";
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>