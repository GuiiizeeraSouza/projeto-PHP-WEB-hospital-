<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/login.css">
  <title>Login</title>
</head>

<body>

  <div id="form">

    <form method="POST" action="../control/controleUsuario.php">
      <h2 id="title">Login</h2>
      <hr>
      <br>
      <label for="nome">Nome de Usuário:</label>
      <div class="input">

        <i class="fa-solid fa-user"></i>
        <input type="text" name="nome" id="nome" placeholder="Username">

      </div>
      <label for="senha">Senha:</label>
      <div class="input">
        <i class="fa-solid fa-key"></i>
        <input type="password" name="senha" id="senha" placeholder="Senha">
      </div>

      <div id="btn">
        <button type="submit" name="opcao" value="Entrar">Entrar</button>
      </div>
      <div id="btn">
        <button class="button">
          <a href="./Cadastro.php">
            Criar Conta
          </a>
        </button>
      </div>

    </form>
  </div>
</body>
<script src="https://kit.fontawesome.com/3ef5d2d866.js" crossorigin="anonymous"></script>

</html>