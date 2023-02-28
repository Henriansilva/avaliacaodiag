<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body onload="alerta()">

<script>
function alerta(){
<?php

@$email = $_POST['email'];
@$senha = $_POST['senha'];

$conn = mysqli_connect("localhost", "root", "", "cadastros");
$queryemail = "select * from clientes where email=\"$email\"";
$resultemail = mysqli_query($conn, $queryemail);


if (mysqli_num_rows($resultemail) > 0) {
    $valor = mysqli_fetch_assoc($resultemail);
    $hash = $valor['senha'];
    if (password_verify($senha, $hash)) {
        echo "alert('Logado com sucesso!'); window.location.href='cliente.php';}</script>";
        session_start();
        $_SESSION['codigocliente'] = $valor['cod'];
        $_SESSION['permissao'] = "sim";
    } else {
        echo "alert('E-mail não cadastrado ou senha incorreta.'); window.location.href='login.php';}</script>";
        session_start();
        $_SESSION['permissao'] = "nao";
}
} else {
    session_start();
    echo "alert('E-mail não cadastrado ou senha incorreta.'); window.location.href='login.php';}</script>";
    $_SESSION['permissao'] = "nao";
    exit();
}


?>