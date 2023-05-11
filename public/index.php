<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
      <!--para mudar a pagina inicial basta ir no httpd.conf do xampp e procurar por DirectoryIndex-->
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post"><!--Envia o form via metodo post pro valida login-->
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>

                <!--'erro' = usuario nao autenticado, ou seja, seus dados nao constam no BD-->
                <?php if(isset($_GET['login']) and $_GET['login']=='erro'){//se o uri tiver parametro e ele for igual 'erro' ?>
                  <div class="text-danger">
                    Usuario ou senha inválidos
                  </div>
                <?php } ?>

                <!--'erro2' = usuario nao autenticado tentando acessar uma página que precisa de login-->
                <?php if(isset($_GET['login']) and $_GET['login']=='erro2'){//se o uri tiver parametro e ele for igual 'erro2' ?>
                  <div class="text-danger">
                    Voce nao pode acessar essa página - Faça LOGIN!
                  </div>
                <?php } ?>

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>
