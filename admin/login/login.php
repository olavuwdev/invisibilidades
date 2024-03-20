<?php
session_start();
include("../../conexao/conexao.php");

if(empty($_POST['login']) || empty($_POST['senha'])) {
    header('Location: pag_login.php');
    exit();
}

$login = mysqli_real_escape_string($conn, $_POST['login']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT nome FROM administradores WHERE login='$login' and senha= md5('$senha')";

$resultado = mysqli_query($conn, $query);
$row = mysqli_num_rows($resultado);

if($row == 1){
    $adm = mysqli_fetch_assoc($resultado);
    $_SESSION['nome'] = $adm['nome'];
    mysqli_close($conn);
    header('Location: ../arq_cadastro/cadastroarq.php');
    exit();
} else {
    header('Location: pag_login.php');
    $_SESSION['not_autentic'] = true;
    mysqli_close($conn);
    exit();
}

?>