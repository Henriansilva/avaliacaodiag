<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body onload="alerta()">

<script>
function alerta(){  
<?php

@$nome = $_POST['nome'];
@$email = $_POST['email'];
@$senha = $_POST['senha'];
@$confirmaSenha = $_POST['confirma-senha'];

$conne = mysqli_connect("localhost", "root", "", "cadastros");
$querye = "select email from clientes where email=\"$email\"";
$resulte = mysqli_query($conne, $querye);


if (mysqli_num_rows($resulte) > 0) {
  echo "alert('E-mail já cadastrado.'); window.location.href='cadastro.php';}</script>";
  exit();
} else {

if (strlen($nome) < 3 || strlen($nome) > 50) {
  echo "alert('O nome deve ter entre 3 e 50 caracteres.');";
  exit();
} 


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "alert('O email inserido não é válido.'); window.location.href='cadastro.php';}</script>";
  exit();
} 

if (strlen($senha) < 8 || strlen($senha) > 64 || !preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};':\"\\|,.<>\/?]).*$/", $senha)) {
  echo "alert('A senha deve ter entre 8 e 64 caracteres e contém letras maiúsculas, minúsculas, números e caracteres especiais.'; window.location.href='cadastro.php';}</script>";
  exit();
  } 
  

  if (preg_match('/12|23|34|45|56|67|78|89|98|87|76|65|54|43|32|21/', $senha)) {
  echo "alert('A senha não pode conter sequências numéricas.'); window.location.href='cadastro.php';}</script>";
  exit();
  } 
  

  if ($senha !== $confirmaSenha) {
  echo "alert('As senhas não coincidem.'); window.location.href='cadastro.php';}</script>";
  exit();
  } 
  
$senha_encriptada = password_hash($senha, PASSWORD_DEFAULT);


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastros";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");

$stmt = $conn->prepare("INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)");


if (!$stmt) {
die("Prepare falhou: " . $conn->error);
}


$stmt->bind_param("sss", $nome, $email, $senha_encriptada);


if ($stmt->execute()) {
echo "alert('Usuário cadastrado com sucesso!'); window.location.href='login.php';}</script>";
} else {
echo "alert('Erro ao cadastrar o usuário. Tente novamente mais tarde.'); window.location.href='cadastro.php';}</script>";
}

$stmt->close();
$conn->close();
}
// Script para verificar se o hash pertence a senha
/*
$senha = "senha123";
$senha_encriptada = password_hash($senha, PASSWORD_DEFAULT);
echo "Hash da senha: " . $senha_encriptada . "<br>";
if (password_verify($senha, $senha_encriptada)) {
echo "A senha está correta!";
} else {
echo "A senha está incorreta!";
}
*/
?>