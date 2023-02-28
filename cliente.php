<?php
session_start();
if ($_SESSION['permissao'] != "sim") {
    header("location: login.php");
}
else{
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    
    <title>Àrea do Cliente</title>
</head>
<body class="mx-auto text-center">

<h2 class="text-center" style="margin-top: 100px;">Bem Vindo !!!</h2>

<h2 class="text-center">Seus Dados:</h2>

<label class="text-center">
<?php


@$cod = $_SESSION['codigocliente'];

$conne = mysqli_connect("localhost", "root", "", "cadastros");
$querye = "select * from clientes where cod=\"$cod\"";
$resulte = mysqli_query($conne, $querye);



$valor = mysqli_fetch_assoc($resulte);

echo "Seu nome: ".$valor['nome'].'<br>'; 
echo "Seu e-mail: ".$valor['email'];

?>
</label>
</body>
</html>
<?php


}

?>