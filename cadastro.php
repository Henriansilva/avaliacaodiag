<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Pagina de Registro</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 88vh;">
          <div class="col-md-6">
            <form class="mx-auto" method="post" action="cadastroverif.php" onsubmit="return validarFormulario()">
              <h2 class="text-center">Cadastro</h2>
              <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
                <small id="nome-aviso" class="form-text text-muted"></small>
              </div>
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
              <div class="form-group">
                <label for="confirma-senha">Confirmar Senha:</label>
                <input type="password" class="form-control" id="confirma-senha" name="confirma-senha" required>
                <small id="confirma-senha-aviso" class="form-text text-muted"></small>
              </div>
              <input type="submit" class="btn btn-primary btn-sm mx-auto d-block" value="Cadastrar">
            </form>
          </div>
          
          <script>
          function validarFormulario() {
          
            var nome = document.getElementById("nome").value;
            var email = document.getElementById("email").value;
            var senha = document.getElementById("senha").value;
            var confirmaSenha = document.getElementById("confirma-senha").value;
            
            
            if (nome.length < 3 || nome.length > 50) {
              document.getElementById("nome-aviso").textContent = "O nome deve ter entre 3 e 50 caracteres.";
              return false;
            } else {
              document.getElementById("nome-aviso").textContent = "";
            }
            
            
            if (!/\S+@\S+\.\S+/.test(email)) {
              document.getElementById("email-aviso").textContent = "O email inserido não é válido.";
              return false;
            } else {
              document.getElementById("email-aviso").textContent = "";
            }
            
            
            if (senha.length < 8 || senha.length > 64 || !/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).*$/.test(senha)) {
              document.getElementById("senha-aviso").textContent = "A senha deve ter entre 8 e 64 caracteres e conter letras maiúsculas, minúsculas, números e caracteres especiais.";
            return false;
            } else {
            document.getElementById("senha-aviso").textContent = "";
            }

           
            if (/12|23|34|45|56|67|78|89|98|87|76|65|54|43|32|21/.test(senha)) {
            document.getElementById("senha-aviso").textContent = "A senha não pode conter sequências numéricas.";
            return false;
            } else {
            document.getElementById("senha-aviso").textContent = "";
            }

            
            if (senha !== confirmaSenha) {
            document.getElementById("confirma-senha-aviso").textContent = "As senhas não coincidem.";
            return false;
            } else {
            document.getElementById("confirma-senha-aviso").textContent = "";
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
