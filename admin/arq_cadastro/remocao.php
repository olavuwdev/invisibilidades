<?php
include("../../conexao/conexao.php");

$id = intval($_GET['deletar']);
$sql_query = "SELECT * FROM arquivos WHERE id = '$id'";
$arquivo = mysqli_fetch_assoc(mysqli_query($conn, $sql_query));

if(unlink($arquivo['path'])){
    $deletar = mysqli_query($conn, "DELETE FROM arquivos WHERE id = '$id'");
}

mysqli_close($conn);
header("Location: pag_cadastro.php");