<?php
session_start();
include("../../conexao/conexao.php");

$nome = mysqli_real_escape_string($conn, trim($_POST['nome']));
$login = mysqli_real_escape_string($conn, trim($_POST['login']));
$senha = mysqli_real_escape_string($conn, trim(md5($_POST['senha'])));

$sql = "SELECT count(*) as total FROM administradores where login='$login'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existente'] = true;
    header('Location: pag_cadastro.php');
    exit;
}

$sql = "INSERT INTO administradores(nome, login, senha) VALUES('$nome', '$login', '$senha')";

if($conn->query($sql) === TRUE) {
    $_SESSION['confirm_cadastro'] = true;
}

$conn->close();
header('Location: pag_cadastro.php');
exit;
?>