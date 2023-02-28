<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Pagina de Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 88vh;">
          <div class="col-md-6">
            <form class="mx-auto" method="post" action="loginverif.php" onsubmit="return validarFormulario()">
              <h2 class="text-center">Login</h2>
              <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" required>
                <small id="email-aviso" class="form-text text-muted"></small>
              </div>
              <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
                <small id="senha-aviso" class="form-text text-muted"></small>
              </div>
              <input type="submit" class="btn btn-primary btn-sm mx-auto d-block" value="Logar">
            </form>
          </div>
          
          <script>
          function validarFormulario() {

            var email = document.getElementById("email").value;

            if (!/\S+@\S+\.\S+/.test(email)) {
              document.getElementById("email-aviso").textContent = "O email inserido não é válido.";
              return false;
            } else {
              document.getElementById("email-aviso").textContent = "";
            }
            return true;
            }
            </script>
          
    </div>
</div>      
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>